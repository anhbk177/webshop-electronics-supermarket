<?php
session_start();
define("security", True);
include_once("../config/connect.php");
$shipper_id = $_GET['shipper_id'];
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql = "DELETE FROM shipper WHERE shipper_id='$shipper_id'";
    mysqli_query($conn, $sql);

    header("location:index.php?page_layout=shipper");
}else{
    include_once("index.php");
}

?>