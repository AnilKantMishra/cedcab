<?php
session_start();


 if(isset($_POST['update'])){

  $nameg = $_POST['name'];
  $psw = $_POST['psw'];
  $em = $_POST['email'];
$numberg= $_POST['number'];


$res['user_id'] = $_SESSION['userid'];
$res['name'] = $_SESSION['username'];

$id = $res['user_id'];
$name = $res['name'];




// echo $id;
// echo $name;


$server = "localhost";
$username = "root";
$pass = "";
$dbname = "cedcab";

$con = mysqli_connect($server, $username, $pass, $dbname);

  
$update = "UPDATE tbl_user set user_id=$id, name='$nameg',password='$psw'
 where user_id =$id";

$query = mysqli_query($con,$update);

// $result =mysqli_fetch_array($query);


// Check connection
if (!$query) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
  echo '<script>alert("Data Updated Successfully in database")</script>'; 
  echo "<script>window.location='userdashboard.php';</script>";
  
}


 }
?>