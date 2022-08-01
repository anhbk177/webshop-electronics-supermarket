<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT*FROM product WHERE prd_id=$prd_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$brand_id = $row['brand_id'];
$sql_br = "SELECT*FROM brand WHERE brand_id=$brand_id";
$query_br = mysqli_query($conn, $sql_br);
$row_br = mysqli_fetch_array($query_br);

if ($row['cat_id'] == 2) {
    $pro_tl1 = 1;
    $pro_tl2 = 3;
    $sql_pro1 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = $pro_tl1 ";
    $query_pro1 = mysqli_query($conn, $sql_pro1);
    $row_pro1 = mysqli_fetch_array($query_pro1);

    $sql_pro2 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = $pro_tl2 ";
    $query_pro2 = mysqli_query($conn, $sql_pro2);
    $row_pro2 = mysqli_fetch_array($query_pro2);
} elseif ($row['cat_id'] == 1) {
    $pro_dh1 = 2;
    $pro_dh2 = 4;
    $sql_pro1 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = $pro_dh1 ";
    $query_pro1 = mysqli_query($conn, $sql_pro1);
    $row_pro1 = mysqli_fetch_array($query_pro1);

    $sql_pro2 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = $pro_dh2 ";
    $query_pro2 = mysqli_query($conn, $sql_pro2);
    $row_pro2 = mysqli_fetch_array($query_pro2);
} else {
    $sql_pro1 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = '5' ";
    $query_pro1 = mysqli_query($conn, $sql_pro1);
    $row_pro1 = mysqli_fetch_array($query_pro1);

    $sql_pro2 = "SELECT*FROM property_details WHERE prd_id=$prd_id AND pro_id = '6' ";
    $query_pro2 = mysqli_query($conn, $sql_pro2);
    $row_pro2 = mysqli_fetch_array($query_pro2);
}


?>
<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/products/<?php echo $row['prd_image'] ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $row['prd_name'] ?></h1>
            <ul>
                <li><span>Bảo hành: </span><?php echo $row['prd_warranty'] ?></li>

                <li><span>Công suất: </span><?php echo $row['power'] ?></li>
                <?php
                if ($row['cat_id'] == 2) {
                ?>
                    <li><span>Kiểu tủ: </span><?php echo 'Tủ lớn - Side by side' ?></li>
                    <li><span>Dung tích: </span><?php echo '600' ?> lít</li>
                <?php }
                if ($row['cat_id'] == 1) {
                ?>
                    <li><span>Tính năng: </span><?php echo 'Công nghệ Inverter' ?></li>
                    <li><span>Loại máy: </span><?php echo '2 chiều' ?></li>
                <?php }
                if ($row['cat_id'] == 3) {
                ?>
                    <li><span>Khối lượng giặt: </span><?php echo '12' ?> kg</li>
                    <li><span>Kiểu máy: </span><?php echo 'Cửa ngang'; ?></li>
                <?php } ?>

                <li><span>Xuất xứ: </span><?php echo $row['prd_new'] ?></li>
                <li><span>Hãng: </span><?php echo $row_br['brand_name'] ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($row['prd_price']) ?></li>
                <!-- <li id="status"><?php if ($row['prd_status'] == 1) {
                                            echo "Còn hàng";
                                        } else {
                                            echo "Hết hàng";
                                        } ?></li> -->
                <?php if ($row['prd_status'] == 1) {
                    echo '<li id="status" class="text-success">Còn hàng</li>';
                } else {
                    echo '<li id="status" class="text-danger">Hết hàng</li>';
                }
                ?>
            </ul>
            <?php
            if ($row['prd_status'] == 1) {
                echo '<div id="add-cart"><a href="module/cart/add_cart.php?prd_id=' . $row['prd_id'] . '">Mua ngay</a></div>';
            }
            ?>
            <!-- them gio hang -->
            <div id="add_cart">
                <div class="alert">
                    <div class="process"></div>
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <span>Bạn đã thêm vào giỏ hàng thành công</span>
                </div>

                <form method="post" action="module/product/add_cart.php?prd_id=<?php echo $prd_id ?>">
                    <button style="background: #FE2E2E;" type="submit" class="add">Thêm giỏ hàng</button>
                </form>

            </div>
            <script>
                const button = document.querySelector('button')
                const alert = document.querySelector('.alert')

                button.addEventListener('click', () => {
                    alert.style.right = '20px'
                    let length = 70
                    let process = document.querySelector('.process')
                    const run = setInterval(() => {
                        process.style.height = length + 'px'
                        length -= 5
                        if (length <= -10) {
                            clearInterval(run)
                            alert.style.right = '-500px'
                        }
                    }, 200)
                })
            </script>

            <!-- end gio hang -->

        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $row['prd_name'] ?></h3>
            <p>
                <?php echo $row['content'] ?>;
            </p>
        </div>
    </div>

    <!--	Comment	-->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $row_per_page = 3;
    $per_row = $page * $row_per_page - $row_per_page;
    $total_row = mysqli_num_rows(mysqli_query($conn, "SELECT*FROM comment WHERE prd_id=$prd_id"));
    $total_page = ceil($total_row / $row_per_page);
    $list_page = "";
    $prev = $page - 1;
    if ($prev <= 0) {
        $prev = 1;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $prev . '">&laquo;</a></li>';
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = 'active';
        } else {
            $active = '';
        }
        $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $i . '">' . $i . '</a></li>';
    }
    $next = $page + 1;
    if ($next >= $total_page) {
        $next = $total_page;
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $next . '">&raquo;</a></li>';
    if (isset($_POST['sbm'])) {
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        $comm_details = $_POST['comm_details'];
        date_default_timezone_set("Asia/Bangkok");
        $comm_date = date("Y-n-d H:i:s");
        $sql_comm = "INSERT INTO comment(comm_name,comm_mail,comm_details,comm_date,prd_id)
                VALUES ('$comm_name','$comm_mail','$comm_details','$comm_date','$prd_id')";
        $query_comm = mysqli_query($conn, $sql_comm);
    }
    ?>


    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace('comm_details')
                    </script>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <div id="comments-list" class="row">
        <?php
        $sql = "SELECT*FROM comment WHERE prd_id=$prd_id ORDER BY comm_id DESC LIMIT $per_row,$row_per_page";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="comment-item">
                    <ul>
                        <li><b><?php echo $row['comm_name'] ?></b></li>
                        <li><?php echo $row['comm_date'] ?></li>
                        <li>
                            <p><?php echo $row['comm_details'] ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <?php echo $list_page ?>
    </ul>
</div>