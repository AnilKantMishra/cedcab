<?php
session_start();


// echo $id;
// echo $name;
$res['user_id'] = $_SESSION['userid'];
$res['name'] = $_SESSION['username'];

$id = $res['user_id'];
$name = $res['name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>


  <link rel="stylesheet" href="form.css">
  <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <?php include 'sigupnav.php';
  ?>


  <center>
    <?php



    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cedcab";

    // Create connection
    $con = mysqli_connect($server, $username, $pass, $dbname);

    $select = " SELECT * FROM tbl_user where user_id = {$id} ";

    $query = mysqli_query($con, $select);





    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
    ?>

        <form action="updateprof.php" method="POST">


          <div class="container">


            <label for="email" style="text-align: center;"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" id="email" name="email" value="<? echo $row['email_id'];?>" readonly required><br><br>



            <div class="mobileverify">
              <label for="number" style="text-align: center;"><b>Number</b></label>
              <input type="text" id="number" name="number" placeholder="Enter Mobile Number Here" value="<? echo $row['mobile'];?>" readonly required="required"><br><br>

            </div>

            <div class="verified" id="verified">
              <label for="name" style="text-align: center;"><b> Name</b></label>
              <input type="text" placeholder="Enter Name" name="name" value="<? echo $row['name'];?>" required><br><br>

              <label for="psw" style="text-align: center;"><b>Password</b></label>
              <input type="text" placeholder="Enter Password" name="psw" value="<? echo $row['password'];?>" required><br>

              <button name="update" class="hide" type="submit">update</button>
            </div>


        </form>
    <?php

      }
    }


    ?>
  </center>

  <?php include 'footer.php'; ?>

</body>



</html>