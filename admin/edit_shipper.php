<?php
$shipper_id = $_GET['shipper_id'];
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM shipper WHERE shipper_id = $shipper_id"));
if(isset($_POST['sbm'])){
    $shipper_mail=$_POST['shipper_mail'];
    $shipper_name=$_POST['shipper_name'];
    $phone=$_POST['phone'];
    $status=$_POST['status'];
   
  
    $sql="UPDATE shipper 
    SET shipper_name='$shipper_name', shipper_mail='$shipper_mail', phone='$phone',status='$status' WHERE shipper_id=$shipper_id ";
   $query=mysqli_query($conn,$sql);
   header('location: index.php?page_layout=shipper');
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Sửa thông tin thành viên</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row['shipper_name']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
               
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="shipper_name" required class="form-control" value="<?php echo $row['shipper_name']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="shipper_mail" required value="<?php echo $row['shipper_mail']; ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="phone" required value="<?php echo $row['phone']; ?>" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option <?php if($row['status']==1){echo 'selected';} ?> value=1>Sẵn sàng</option>
                                        <option <?php if($row['status']==0){echo 'selected';} ?> value=0>Đang bận</option>
                                    </select>
                                </div>
                    
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
	</div>	<!--/.main-->