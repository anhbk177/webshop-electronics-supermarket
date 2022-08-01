<?php
if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
$id = $_GET['id'];
if(isset($_POST['sbm'])){
    $nvk=$_POST['nvk'];

   $sql0="UPDATE orders 
   SET stocker_id='$nvk', status=1 WHERE order_id=$id ";
  $query0=mysqli_query($conn,$sql0);
  header('location: index.php?page_layout=ship');
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
                        $sqlxx = "SELECT*FROM orders WHERE order_id=$id";
                        $queryxx = mysqli_query($conn, $sqlxx);
                        $rowxx = mysqli_fetch_array($queryxx);
                        $manage_id = $rowxx['manage_id'];
                        $stock_id = $rowxx['stocker_id'] ;
                        $shipper_id = $rowxx['shipper_id'] ;
                        $sql1 = "SELECT*FROM employeei WHERE user_id=$manage_id";
                        $query1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($query1);

                        $sql2 = "SELECT*FROM employeei WHERE user_id=$stock_id";
                        $query2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_array($query2);

                        $sql_nvgh = "SELECT*FROM shipper WHERE shipper_id = $shipper_id";
                                $query_nvgh = mysqli_query($conn,$sql_nvgh);
                                $row_nvgh = mysqli_fetch_array($query_nvgh)
                        ?>

                        <tr>
                            <!-- <th style="border-style:double; border-collapse:collapse; padding-left:5px; width: 120px;">Tổng tiền</th> -->
                            <th></th>
                            <th></th>
                            <th></th> 
                            <th style="border-style:double; border-collapse:collapse; padding-left:60px; background: #ace6c3;">Tổng tiền</th>
                            <th style="border-style:double; border-collapse:collapse; padding-left:5px; "><?php echo number_format($rowxx['totals_price']); ?> đ</th>
                        </tr>
                        <h4>THÔNG TIN KHÁCH HÀNG</h4>
                        <ul>
                                    <li style="margin-bottom: 6px;">Tên khách hàng: <b><?php echo $rowxx['name1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Địa chỉ: <b><?php echo $rowxx['address1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Số điện thoại: <b><?php echo $rowxx['phone']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Email: <b><?php echo $rowxx['mail']; ?></b><br></li>
                                </ul><hr>
                                <h4>THÔNG TIN ĐẶT HÀNG</h4>
                                <ul>
                            <li style="margin-bottom: 6px;"> Tình trạng:<b> <?php if ($rowxx['status']==3) {
                                echo 'Đang chờ';
                            }else if ($rowxx['status']==2) {
                                echo 'Đã xác nhận';
                            }else if ($rowxx['status']==1) {
                                echo 'Đang giao';
                            } else if ($rowxx['status']==0) {
                                echo 'Giao hàng thành công';
                            }  ?></b></li>
                                    <li style="margin-bottom: 6px;">Thời gian đặt hàng: <b><?php echo $rowxx['date1']; ?></b></li>
                                    <li style="margin-bottom: 6px;">Người xác nhận: <b><?php echo $row1['user_name']; ?></b></li>
                                    <li style="margin-bottom: 6px;"> Nhân viên kho: <b><?php echo $row2['user_name']; ?> (<?php echo $stock_id ?>)</b></li>
                                    <li style="margin-bottom: 6px;">Nhân viên giao hàng: <b><?php echo $row_nvgh['shipper_name']; ?> (<?php echo $shipper_id ?>)</b></b></li>
                                </ul>    <br>
                                     <!-- xác nhận giao hang-->
                <form style="margin-left: 15px;" method="post" action="ship/ship_cf1.php?order_id=<?php echo $rowxx['order_id']; ?> ">
                <?php 
                        if ($rowxx['status']>1) {
                           echo '<input type="submit" name="export" class="btn btn btn-danger" value="Xác nhận đang giao" />';
                        }
                ?> 
                </form>     
                <form style="margin-left: 15px;" method="post" action="ship/ship_cf2.php?order_id=<?php echo $rowxx['order_id']; ?> ">
                <?php 
                        if ($rowxx['status']==1) {
                           echo '<input type="submit" name="export" class="btn btn btn-primary" value="Xác nhận thành công" />';
                        }
                ?> 
                </form>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/.row-->