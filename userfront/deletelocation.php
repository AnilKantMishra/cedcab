<?php
session_start();

$id = $_REQUEST['id'];


//database connection
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "cedcab";
// Create connection
$con = mysqli_connect($server, $username, $pass, $dbname);

$update = "UPDATE `tbl_location` SET `is_available` = '0' WHERE `tbl_location`.`id` = '$id'";

$query = mysqli_query($con, $update);

echo "<script> alert('Sucessfully Deleted The Location') </script>";
echo "<script> window.location.href = 'admindashboard.php'; </script>";
