<?php

session_start();

?>

<html>

<head>
  <link rel="stylesheet" href="form.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>


  <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php include 'sigupnav.php' ?>

<body>
  <center>
    <br>
    <p style="font-size: 22px;">Login Here</p>
    <form action="" method="post">

      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required><br><br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required><br>
        <br>
        <button name="submit" type="submit" style="border-radius: 15px;">Login</button>
        <br><br>
        <a href="signup.php" style="text-decoration: none;">New user?? Sign up here</a>
      </div>


    </form>
  </center>
</body>
<?php include 'footer.php' ?>

</html>
<?php


if (isset($_POST["submit"])) {

  $email = $_POST['email'];
  $psw = $_POST['psw'];

  $server = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "cedcab";




  // Create connection
  $con = mysqli_connect($server, $username, $pass, $dbname);

  $select = "SELECT * FROM tbl_user where email_id ='$email' and password='$psw'";

  $query = mysqli_query($con, $select);

  $row = mysqli_num_rows($query);
  $res = mysqli_fetch_assoc($query);




  if ($row > 0) {

    if ($res['is_admin'] == 1) {

      $_SESSION['admin'] = $res['user_id'];
      $_SESSION['adminname'] = $res['name'];

      echo "<script>window.location='admindashboard.php';</script>";
    } else {
      if ($res['status'] == 1) {

        $_SESSION['userid'] = $res['user_id'];
        $_SESSION['username'] = $res['name'];

        // echo $_SESSION['user_id'];
        // echo $_SESSION['name'];

        echo "<script>window.location='userdashboard.php';</script>";
      } else {
        echo "<script>alert('You Are blocked by Admin') </script>";
      }
    }
  } else {
    //  echo("<script>alert('user');</script>");
  }
}
?>