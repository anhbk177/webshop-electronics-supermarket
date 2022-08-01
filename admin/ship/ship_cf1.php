<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
}else {
    echo "Kết nối thất bại";
}
if(isset($_GET['order_id'])){
    $id = $_GET['order_id'];
$sqly = "UPDATE orders 
    SET  status=1 WHERE order_id=$id ";
     $queryy = mysqli_query($conn, $sqly);
    header("location: ../index.php?page_layout=ship_details&id=$id");
}
