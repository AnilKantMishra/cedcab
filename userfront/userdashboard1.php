<?php
session_start();
$pickup = $_SESSION['pickup'];
$drop = $_SESSION['drop'];
$cdist = $_SESSION['cdist'];
$cabtype = $_SESSION['cabtype'];
$luggage = $_SESSION['luggage'];
$total2 = $_SESSION['f'];
// echo $total2; // total fare 


$res['user_id'] = $_SESSION['userid'];
$res['name'] = $_SESSION['username'];
$a = $res['user_id'];
//database connection
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "cedcab";


// Create connection


$conn = mysqli_connect($server, $username, $pass, $dbname);
$sql = "SELECT SUM(total_fare)
FROM tbl_ride
WHERE user_id=$a and status = 2";
$show = mysqli_query($conn, $sql);
$s = mysqli_fetch_array($show);


?>
<?php
$total1 = $s['SUM(total_fare)'];

$sql = "SELECT * FROM tbl_ride where status = 1 and user_id = $a";
$show1 = mysqli_query($conn, $sql);
$countuserpendin = 0;
while ($s = mysqli_fetch_array($show1)) {
?>


<?php
    $countuserpendin++;
}
// echo  $countuserpendin;


$sql = "SELECT * FROM tbl_ride where status = 2 and user_id = $a";
$show = mysqli_query($conn, $sql);
$usercompletedrides = 0;
while ($s = mysqli_fetch_array($show)) {
?>
<?php
    $usercompletedrides++;
}

// echo $usercompletedrides;
$sql = "SELECT * FROM tbl_ride where  user_id =$a;";
$show = mysqli_query($conn, $sql);
$count1 = 0;
while ($s = mysqli_fetch_array($show)) {
?>
<?php
    $count1++;
}
?>
<html>

<head>
</head>
<link rel="stylesheet" href="admindash.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-expand-lg navbar-light p-3" style="background-color: #26272b">
    <div class="container-fluid">
        <img src="car.gif" alt="cedcab" width="80" height="60" class="img-responsive mr-4 ml-4" style="border-radius:45px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: yellow; "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h1 style="color:white ;font-size:20px;">
                Hello
                <?php echo $res['name']; ?></h1>
            <div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group m2-4 ml-4" role="group" aria-label="First group">
                    <a href="login.php" class="btn btn-success">
                        Logout<button type="button" id="bookbtn" class="btn btn-success"></button></a>
                </div>
                <div class="btn-group mr-5 ml-2 " role="group" aria-label="Second group">
                    <button type="button" class="btn btn-md" style="background-color: #cddc39;">About US</button>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- <h1> user dashboard </h1>   -->
<div class="container-fluid text-white bg-dark ">
    <div class="row h-100   ">
        <aside class="col-12 col-md-2 p-0 ">
            <nav class="navbar navbar-expand  flex-md-column flex-row align-items-start">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item">
                            <a href="userdashboard1.php"><i class="fa fa-fw fa-home">
                                </i> Home</a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="index1.php" style="text-decoration: none;"><i class="fa fa-motorcycle mr-2">
                                </i>Book Another Ride</a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="#" style="text-decoration: none;"><i class="fa fa-bar-chart mr-2">
                                </i> Accounts</a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="update.php" style="text-decoration: none;"><i class="fa fa-bar-chart mr-2">
                                </i> Update</a>
                        </li>
                        <br>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-white">
            <br>
            <div class="card-deck">
                <div class="">
                    <div class="card text-white bg-success mb-3" style="width: 20rem; height:10rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                Total Expenses
                            </h5>
                            <h4><?php echo $total1;  ?></h4>
                            <a href="totalexpenses.php" style="color:white;">See Table</a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card text-white bg-success mb-3" style="width: 20rem;  height:10rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                Pending Rides
                            </h5>
                            <h4><?php echo $countuserpendin; ?></h4>
                            <a href="userpendingrides.php" style="color:white;">See Table</a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card text-white bg-success mb-3" style="width: 20rem;  height:10rem;">
                        <div class="card-body">
                            <h1>
                            </h1>
                            <h5 class="card-title">
                                Completed Rides
                            </h5>
                            <h4><?php echo $usercompletedrides;  ?></h4>
                            <a href="usercompletedrides.php" style="color:white;">See Table</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="">
                    <div class="card text-white bg-primary mb-3" style="width: 20rem;  height:10rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                Total Rides
                            </h5>
                            <h1>
                                <?php echo $count1; ?></h1>
                            <a class="nav-link" href="totalridesuser.php">
                                <h2 style="color: white; font-size: 20px; ">
                                    See Table
                                </h2><span </div> </div> </div> </div> </main> </div> </div>