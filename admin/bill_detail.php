<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
$id = $_GET['id'];
$sqll = "SELECT user_id FROM employeei WHERE user_mail = '$mail' AND user_pass = '$pass'";
$queryl = mysqli_query($conn, $sqll);
$rowl = mysqli_fetch_array($queryl);
$manage_id = $rowl['user_id'];
if (isset($_POST['sbm'])) {
    $nvk = $_POST['nvk'];
    $gh = $_POST['gh'];

    $sql0 = "UPDATE orders 
   SET stocker_id='$nvk', manage_id = '$manage_id',shipper_id ='$gh' , status=2 WHERE order_id=$id ";
    $query0 = mysqli_query($conn, $sql0);

    $sqlx = "UPDATE shipper SET status=0 WHERE shipper_id=$gh ";
    $query = mysqli_query($conn, $sqlx);

    header('location: index.php?page_layout=order');
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý đơn hàng</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết đơn hàng</h1>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table style="width: 100%; border-style:double; margin-top:20px; border-collapse:collapse;">
                        <!-- danh mục -->
                        <tr style="background-color:skyblue; ">
                            <th style="border-style:double; border-collapse:collapse; padding-left:10px; width: 120px;">Mã đơn hàng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:170px; ">Tên sản phẩm</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:30px;  width: 180px;">Số lượng</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:60px; width: 180px;">Đơn giá</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:20px; width: 180px;">Thành tiền</th>
                        </tr>
                        <!-- thông tin -->
                        <?php
                        $sqlx = "SELECT*FROM order_details INNER JOIN product ON order_details.prd_id = product.prd_id WHERE id=$id";
                        $queryx = mysqli_query($conn, $sqlx);
                        while ($rowx = mysqli_fetch_array($queryx)) {
                        ?>

                            <tr>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['id']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['prd_name']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo $rowx['prd_count']; ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo number_format($rowx['prd_price']); ?></th>
                                <th style="border-style:double; border-collapse:collapse; padding-left:5px;"><?php echo number_format($rowx['prd_count'] * $rowx['prd_price']); ?></th>
                            </tr>
                        <?php
                        }
                        $sql1 = "SELECT*FROM orders WHERE order_id=$id";
                        $query1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($query1);

                        $sql_nvk = "SELECT*FROM employeei WHERE user_level = 2 ORDER BY user_id ASC";
                                        $query_nvk = mysqli_query($conn, $sql_nvk);
                        $row_nvk = mysqli_fetch_array($query_nvk );
                                        $sql_nvgh = "SELECT*FROM shipper WHERE status = 1 ORDER BY shipper_id ASC";
                                        $query_nvgh = mysqli_query($conn, $sql_nvgh);
                                        $row_nvgh = mysqli_fetch_array($query_nvgh );
                        ?>
                        <tr>
                            <!-- <th style="border-style:double; border-collapse:collapse; padding-left:5px; width: 120px;">Tổng tiền</th> -->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:60px; background: #ace6c3;">Tổng tiền</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:5px; "><?php echo number_format($row1['totals_price']); ?> đ</th>
                        </tr>

                        <div id="product-head" class="row">

                            <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                                <h4>THÔNG TIN KHÁCH HÀNG</h4>
                                <ul>
                                    <li style="margin-bottom: 6px;">Tên khách hàng: <b><?php echo $row1['name1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Địa chỉ: <b><?php echo $row1['address1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Số điện thoại: <b><?php echo $row1['phone']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Email: <b><?php echo $row1['mail']; ?></b><br></li>
                                </ul>
                                <hr>

                                <h4>THÔNG TIN ĐẶT HÀNG</h4>
                                <ul>
                                    <li style="margin-bottom: 6px;"> Tình trạng:<b> <?php if ($row1['status'] == 3) {
                                                                                        echo 'Đơn hàng mới';
                                                                                    } else if ($row1['status'] == 2) {
                                                                                        echo 'Đã xác nhận';
                                                                                    } else if ($row1['status'] == 1) {
                                                                                        echo 'Đang giao';
                                                                                    } else if ($row1['status'] == 0) {
                                                                                        echo 'Giao hàng thành công';
                                                                                    }  ?></b></li>
                                    <li style="margin-bottom: 6px;">Thời gian đặt hàng: <b><?php echo $row1['date1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Nhân viên xác nhận: <b><?php echo $row['user_name']; ?></b></li>
                                    <?php 
                                            if ($row1['status'] < 3) { ?>
                                                <li style="margin-bottom: 6px;"> Nhân viên kho: <b> <?php echo $row_nvk['user_name']?> (<?php echo $row1['stocker_id']?>)</b></li>
                                                <li style="margin-bottom: 6px;">Nhân viên giao hàng: <b><?php echo $row_nvgh['shipper_name']?> (<?php echo $row1['shipper_id']?>)</b></b></li>
                                           <?php }
                                    ?>                                  
                                </ul>
                            </div>
                        </div>
                        <?php if ($row1['status'] == 3) {
                        ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Nhân viên kho:</label>
                                    <select name="nvk" class="form-control">
                                        <?php
                            
                                        while ($row_nvk = mysqli_fetch_array($query_nvk)) {
                                        ?>
                                            <option value="<?php echo $row_nvk['user_id'] ?>"><?php echo $row_nvk['user_name'] ?></option>
                                    <?php
                                        }
                                    
                                    ?>
                                    </select>
                                </div>
                                <?php                             
                                if (mysqli_num_rows($query_nvgh) > 0) {

                                ?>
                                    <div class="form-group">
                                        <label>Nhân viên giao hàng:</label>
                                        <select name="gh" class="form-control">
                                            <?php
                                            while ($row_nvgh = mysqli_fetch_array($query_nvgh)) {
                                            ?>
                                                <option value="<?php echo $row_nvgh['shipper_id'] ?>"><?php echo $row_nvgh['shipper_name'];
                                                                                                       ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-success">Xác nhận</button>
                                <?php } } ?>

                </div>
                </form>

                </table>
            </div>
            <?php
            if ($row1['status'] > 1) { ?>
                <form style="margin-left: 92%; margin-bottom: 15px;"><a href="del_bill.php?id=<?php echo $row1['order_id'] ?>" class="btn btn-danger"> Hủy</a></div>
            <?php }
            ?>
        </div>
    </div>
</div>
</div>

<!--/.row-->