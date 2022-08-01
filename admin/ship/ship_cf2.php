<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
}else {
    echo "Kết nối thất bại";
}
if(isset($_GET['order_id'])){
    $id = $_GET['order_id'];
    $sqlxx = "SELECT*FROM orders WHERE order_id=$id";
    $queryxx = mysqli_query($conn, $sqlxx);
    $rowxx = mysqli_fetch_array($queryxx);
    $shipper_id = $rowxx['shipper_id'] ;
$sqly = "UPDATE orders 
    SET  status=0 WHERE order_id=$id ";
     $queryy = mysqli_query($conn, $sqly);
     $sql="UPDATE shipper 
    SET status='1' WHERE shipper_id=$shipper_id ";
   $query=mysqli_query($conn,$sql);
    header("location: ../index.php?page_layout=ship");
}
