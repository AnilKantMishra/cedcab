<?php
session_start();


if (isset($_POST['update'])) {

    $nameg = $_POST['locationname'];

    $distance = $_POST['distance'];


    $id  = $_SESSION['locationid'];







    // echo $id;
    // echo $name;


    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cedcab";

    $con = mysqli_connect($server, $username, $pass, $dbname);


    $update = "UPDATE tbl_location set distance='$distance', name='$nameg'
 where id =$id";

    $query = mysqli_query($con, $update);

    // $result =mysqli_fetch_array($query);


    // Check connection
    if (!$query) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo '<script>alert("Location Updated Successfully in ")</script>';
        echo "<script>window.location='admindashboard.php';</script>";
    }
}
