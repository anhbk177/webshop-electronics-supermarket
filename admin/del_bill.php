<?php
session_start();
define("security", True);
include_once("../config/connect.php");
$id = $_GET['id'];
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql_detail = "DELETE FROM order_details WHERE order_id='$id'";
    mysqli_query($conn, $sql_detail);
    $sql_bill = "DELETE FROM orders WHERE order_id='$id'";
    mysqli_query($conn, $sql_bill);
    header("location:index.php?page_layout=order");
}

?>