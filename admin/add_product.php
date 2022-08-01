<?php
if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    $prd_accessories = $_POST['prd_accessories'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_new = $_POST['prd_new'];
    $prd_image = $_FILES['prd_image']['name'];
    $tmp_name = $_FILES['prd_image']['tmp_name'];
    $file_ext = strtolower(end(explode('.', $prd_image)));

    $expensions = array("jpg", "png");

    // if(in_array($file_ext,$expensions)== false){
    //      $errors="Không chấp nhận định dạng ảnh này, mời bạn chọn JPG hoặc PNG.";
    // }
    $cat_id = $_POST['cat_id'];
    $prd_status = $_POST['prd_status'];
    if (isset($_POST['prd_featured'])) {
        $prd_featured = 1;
    } else {
        $prd_featured = 0;
    }
    $prd_details = $_POST['prd_details'];
    // if(empty($errors)==true){
    move_uploaded_file($tmp_name, 'img/products/' . $prd_image);
    //  }
    //  else{
    //     echo $errors;
    //  }

    $sql = "INSERT INTO product(prd_name, prd_price, 
    prd_image, cat_id, prd_status, prd_featured, prd_details)
			VALUES('$prd_name', '$prd_price', 
             '$prd_image', '$cat_id', '$prd_status', 
            '$prd_featured', '$prd_details')";
    $query = mysqli_query($conn, $sql);

    header("location: index.php?page_layout=product");
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- may lanh -->
                <div class="type-1">
                    <div>
                        <a style="background-color: #F27935;" href="index.php?page_layout=add1" class="btn btn-1">
                            <span class="txt">Danh mục Máy lạnh</span>
                        </a>
                    </div>
                </div>
                <!-- may giat -->
                <div class="type-1">
                    <div>
                        <a style="background-color: #3389D4;" href="index.php?page_layout=add2" class="btn btn-1">
                            <span class="txt">Danh mục Máy giặt</span>
                        </a>
                    </div>
                </div>
                <!-- tu lanh -->
                <div class="type-1">
                    <div>
                        <a style="background-color: #5AD145;" href="index.php?page_layout=add3" class="btn btn-1">
                            <span class="txt">Danh mục Tủ lạnh</span>
                        </a>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div>
    <!--/.main-->