-<?php 
$brd_id = $_GET['brd_id'];
$sql = "SELECT*FROM brand WHERE brand_id = '$brd_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['sbm'])) {
    $brd_name = $_POST['brd_name'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM brand WHERE brand_name='".$brd_name."'" ))) {
        $err_cat = '<div class="alert alert-danger">Hãng đã tồn tại !</div>';
    }else {
        $sql = "UPDATE brand SET brand_name=('$cat_name') WHERE brd_id=$brd_id ";
        $query = mysqli_query($conn, $sql);
        header("location: index.php?page_layout=brand");
    }
} 
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý Thương hiệu</a></li>
				<li class="active"><?php echo $row['cat_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thương hiệu:<?php echo $row['cat_name'] ?></h1>
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
                                <label>Tên Thương hiệu:<?php echo $row['brd_name'] ?></label>
                                <input type="text" name="brd_name" required value="<?php echo $row['brd_name'] ?>" class="form-control" placeholder="Tên thương hiệu...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	