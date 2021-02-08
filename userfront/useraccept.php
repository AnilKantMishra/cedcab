 <?php
    session_start();
    $rideid = $_GET['ride_id'];
    //database connection
    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cedcab";

    // Create connection
    $con = mysqli_connect($server, $username, $pass, $dbname);


    $update = "UPDATE `tbl_ride` SET `status` = '2' WHERE `tbl_ride`.`ride_id` = '$rideid'";

    $query = mysqli_query($con, $update);


    echo "<script> window.location.href = 'userpendingrides.php'; </script>";
