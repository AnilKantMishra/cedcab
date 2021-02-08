
<?php
session_start();
if(isset($_POST['submit'])){

$em = $_POST['email'];
$mobilenumber= $_POST['number'];
$name= $_POST['name'];
$psw=$_POST['psw'];


$server = "localhost";
$username = "root";
$pass = "";
$dbname = "cedcab";

// Create connection
$conn = mysqli_connect($server, $username, $pass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
  echo '<script>alert("Connected")</script>'; 
}

$sql = "INSERT INTO tbl_user (email_id, name, mobile,status,password,is_admin)
VALUES ('$em', '$name', '$mobilenumber', '1','$psw','0' )";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


 $select = "SELECT * FROM tbl_user email_id='$email' and password='$psw'";


$query = mysqli_query($conn,$select);
$result=mysqli_fetch_array($query);

echo var_dump($result);
$_SESSION['id'] = $result['user_id'];
if($result['email_id']==$email && $result['password']==$psw ){
  header("location:admindashboard.php");
   
}
else{
  header("location:userdashboard.php");
}


}

?>

