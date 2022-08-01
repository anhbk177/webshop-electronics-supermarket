<?php

if (!defined("security")) {
    die("Bạn không có quyền truy cập");
}
$prd_id = $_GET['prd_id'];
$sql = "SELECT*FROM product WHERE prd_id = '$prd_id' ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);



$sql1 = "SELECT*FROM property_details WHERE prd_id = '$prd_id ' AND pro_id=1";
$query1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($query1);

$sql2 = "SELECT*FROM property_details WHERE prd_id = '$prd_id ' AND pro_id=3";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($query2);
if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];

    $power = $_POST['power'];
    $prd_new = $_POST['prd_new'];
    $brand_id = $_POST['brand_id'];
    $cat_id = $_POST['cat_id'];
    $prd_status = $_POST['prd_status'];
    $prd_details = $_POST['prd_details'];

    $type = $_POST['type']; 
    if (isset($_POST['inverter'])) {
        $inverter = 1;
    } else {
        $inverter = 0;
    }
    if (isset($_POST['prd_featured'])) {
        $prd_featured = 1;
    } else {
        $prd_featured = 0;
    }
    if ($_FILES['prd_image']['name'] == "") {
        $prd_image = $row['prd_image'];
    } else {
        $prd_image = $_FILES['prd_image']['name'];
        $tmp_name = $_FILES['prd_image']['tmp_name'];

        if (isset($_FILES['prd_image'])) {
            $file_size  =  1024 * 1024;
            $file_ext = pathinfo($_FILES['prd_image']['name'], PATHINFO_EXTENSION);
            $allowtypes  = array('jpg', 'png', 'jpeg');
            if (in_array($file_ext,  $allowtypes) == false) {
                $err_type = '<div class="alert alert-danger mt-3">Chỉ được upload các định dạng JPG, PNG, JPEG</div>';
            } elseif ($_FILES['prd_image']['size'] > $file_size) {
                $err_size = '<div class="alert alert-danger mt-3">Không được upload ảnh lớn hơn 1 MB</div>';
            } else {
                move_uploaded_file($tmp_name, 'img/products/' . $prd_image);
            }
        }
    }
    $sql00 = "UPDATE product 
                SET prd_name=('$prd_name'), power = ('$power'), prd_price=('$prd_price'), prd_warranty=('$prd_warranty'),
                 brand_id=('$brand_id'), prd_new=('$prd_new'), prd_image=('$prd_image'), prd_status=('$prd_status'), 
                 cat_id=('$cat_id'), content=('$prd_details'), prd_featured=('$prd_featured') WHERE prd_id=$prd_id";
    $query00 = mysqli_query($conn, $sql00);

    $sql1x = "UPDATE property_details SET pdt_val=('$type') WHERE prd_id = '$prd_id ' AND pro_id=1";
    $query1x = mysqli_query($conn, $sql1x);

    $sql2x = "UPDATE property_details SET pdt_val=('$inverter ') WHERE prd_id = '$prd_id ' AND pro_id=3";
    $query2x = mysqli_query($conn, $sql2x);
    header('location: index.php?page_layout=product');  
    
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $row['prd_name']; ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: <?php echo $row['prd_name']; ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control" value="<?php echo $row['prd_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value="<?php echo $row['prd_price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php echo $row['prd_warranty']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Xuất xứ</label>
                                <input type="text" name="prd_new" required value="<?php echo $row['prd_new']; ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Công suất</label>
                                <input required name="power" value="<?php echo $row['power']; ?>" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Công nghệ Inverter</label>
                                <div class="checkbox">
                                    <label>
                                        <input <?php if ($row1['pdt_val'] == 1) {
                                                    echo "checked";
                                                } ?> name="inverter" type="checkbox" value=1>Inverter
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Loại máy</label>
                                <select name="type" class="form-control">
                                    <option <?php if ($row2['pdt_val'] == 1) {
                                                echo "selected";
                                            } ?> value=1 selected>1 chiều (chỉ làm lạnh)</option>
                                    <option <?php if ($row2['pdt_val'] == 0) {
                                                echo "selected";
                                            } ?> value=0>2 chiều (có sưởi ấm)</option>
                                </select>
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <p style=" font-size: 10px;">** Các định dạng .jpg .png .jpeg được cho phép </p>
                            <input type="file" name="prd_image" id="file"><br>
                            <div>
                                <?php
                                if (isset($err_size)) {
                                    echo $err_size;
                                } elseif (isset($err_type)) {
                                    echo $err_type;
                                } ?>
                                <img id="url" width="350" height="250" src="img/products/<?php echo $row['prd_image']; ?>">
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files["0"]) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                $('#url').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#file").change(function() {
                                        readURL(this);
                                    });
                                </script>
                                <?php
                                // }
                                ?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                $sql_cat = "SELECT*FROM category ORDER BY cat_id ASC";
                                $query_cat = mysqli_query($conn, $sql_cat);
                                while ($row_cat = mysqli_fetch_array($query_cat)) {
                                ?>
                                    <option <?php if ($row_cat['cat_id'] == $row['cat_id']) {
                                                echo "selected";
                                            } ?> value=<?php echo $row_cat['cat_id'] ?>><?php echo $row_cat['cat_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hãng sản xuất</label>
                            <select name="brand_id" class="form-control">
                                <?php
                                $sqlbrd = "SELECT*FROM brand ORDER BY brand_id ASC";
                                $querybrd = mysqli_query($conn, $sqlbrd);
                                while ($rowbrd = mysqli_fetch_array($querybrd)) {
                                ?>
                                    <option <?php if ($rowbrd['brand_id'] == $row['brand_id']) {
                                                echo "selected";
                                            } ?> value=<?php echo $rowbrd['brand_id'] ?>><?php echo $rowbrd['brand_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option <?php if ($row['prd_status' == 1]) {
                                            echo "selected";
                                        } ?> value=1>Còn hàng</option>
                                <option <?php if ($row['prd_status' == 0]) {
                                            echo "selected";
                                        } ?> value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input <?php if ($row['prd_featured'] == 1) {
                                                echo "checked";
                                            } 
                                            ?> name="prd_featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" required class="form-control" rows="<?php echo $row['prd_details']; ?>"></textarea>
                            <script>
                                CKEDITOR.replace('prd_details')
                            </script>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->