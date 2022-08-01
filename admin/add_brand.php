<?php 
if (isset($_POST['sbm'])) {
    $brd_name = $_POST['brd_name'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM brand WHERE brand_name='".$brd_name."'" ))) {
        $err_cat = '<div class="alert alert-danger">Hãng đã tồn tại !</div>';
    }else {
        $sql1 = "INSERT INTO brand(brand_name) VALUES ('$brd_name') ";
        $query1 = mysqli_query($conn, $sql1);
        header("location: index.php?page_layout=brand");
    }
} 
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý thương hiệu</a></li>
				<li class="active">Thêm Thương hiệu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm Thương hiệu</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                        	<?php if(isset($err_cat)){echo $err_cat;} ?>
                            <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input required type="text" name="brd_name" class="form-control" placeholder="Tên thương hiệu...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	