<?php
if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];

    $power = $_POST['power'];
    $type = $_POST['type'];
    $mass = $_POST['mass'];
   
    $prd_new = $_POST['prd_new'];
    $prd_image = $_FILES['prd_image']['name'];
    $tmp_name = $_FILES['prd_image']['tmp_name'];

    $brand_id = $_POST['brand'];
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

    $sql0 = "INSERT INTO `product`( `cat_id`, `brand_id`, `prd_name`, 
    `prd_price`, `power`, `prd_image`, `prd_new`,
     `content`, `prd_featured`, `prd_status`, `prd_warranty`) 
    VALUES ('3',' $brand_id','$prd_name',
    '$prd_price','$power',' $prd_image',' $prd_new',
    '$prd_details','$prd_featured','$prd_status','$prd_warranty')";

    $query = mysqli_query($conn, $sql0);

    //lay id sp vua them
    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn);

    } 

    $sql1 = "INSERT INTO property_details(pro_id, prd_id, pdt_val)
    		VALUES('2,'$id', '$mass')";
    $query1 = mysqli_query($conn, $sql1);

    $sql2 = "INSERT INTO property_details(pro_id, prd_id, pdt_val)
    		VALUES('4,'$id', '$type')";
    $query2 = mysqli_query($conn, $sql2);

    header("location: index.php?page_layout=product");     
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="index.php?page_layout=product">Quản lý sản phẩm</a></li>
            <li class="active"><a style="color:black" href="index.php?page_layout=add_product">Thêm sản phẩm </a>/ Máy lạnh</li>
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
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required name="prd_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required name="prd_price" type="number" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required name="prd_warranty" type="text" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Xuất xứ</label>
                                <input required name="prd_new" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Công suất</label>
                                <input required name="power" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khối lượng giặt</label>
                                <input required name="mass" type="text" class="form-control">
                            </div>   

                            <div class="form-group">
                                <label>Loại máy</label>
                                <select name="type" class="form-control">
                                    <option value=1 selected>Cửa trên</option>
                                    <option value=0>Cửa ngang</option>
                                </select>
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input required name="prd_image" type="file" id="prd_image">
                        </div>
                        <div class="form-group">
                            <label>Hãng sản xuất</label>
                            <select name="brand" class="form-control">
                                <?php
                                $sql1 = "SELECT*FROM brand ORDER BY brand_id ASC";
                                $query1 = mysqli_query($conn, $sql1);
                                while ($row1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <option value="<?php echo $row1['brand_id'] ?>"><?php echo $row1['brand_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option value=1 selected>Còn hàng</option>
                                <option value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                            <script>
                                CKEDITOR.replace('prd_details');
                            </script>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>
<!--/.main-->