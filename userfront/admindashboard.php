<?php



//database connection
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "cedcab";

// Create connection
$conn = mysqli_connect($server, $username, $pass, $dbname);

$sql = "SELECT * FROM tbl_ride where status=1";




$show = mysqli_query($conn, $sql);
$countpend = 0;
while ($s = mysqli_fetch_array($show)) {
?>



<?php
    $countpend++;
}

$sql = "SELECT * FROM tbl_ride ";

$show = mysqli_query($conn, $sql);
$count = 0;
while ($s = mysqli_fetch_array($show)) {
?>


<?php
    $count++;
}
$sql = "SELECT * FROM tbl_ride where status = 0";

$show = mysqli_query($conn, $sql);
$countcanceled = 0;
while ($s = mysqli_fetch_array($show)) {
?>

<?php
    $countcanceled++;
}
$sql = "SELECT * FROM tbl_user where status = 1 AND is_admin!=1";

$show = mysqli_query($conn, $sql);
$countactive = 0;
while ($s = mysqli_fetch_array($show)) {
?>

<?php
    $countactive++;
}

$sql = "SELECT * FROM tbl_user where status = 0 AND is_admin!=1";


$show = mysqli_query($conn, $sql);
$countsuspend = 0;
while ($s = mysqli_fetch_array($show)) {
?>

<?php
    $countsuspend++;
}

?>


<?php
session_start();

$res['user_id'] = $_SESSION['admin'];

$res['name'] = $_SESSION['adminname'];

$admin = $res['name'];

?>
<html>

<head>


    <link rel="stylesheet" href="admindash.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>


    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include_once 'sigupnav.php'; ?>

    <div class="container-fluid text-white bg-dark ">
        <div class="row h-250 ml-2  ">
            <aside class="col-12 col-md-2 p-0 ">
                <nav class="navbar navbar-expand  flex-md-column flex-row align-items-start">
                    <div class="collapse navbar-collapse">
                        <ul class="flex-md-column flex-row navbar-nav w-150 justify-content-between">
                            <li class="nav-item"><br>
                                <br>
                                <a href=""><i class="fa fa-fw fa-home"></i> Home</a></li><br>
                            <li class="nav-item"><a href="#"><i class="fa fa-user-circle"></i> Update Profile</a></li><br>
                            <li class="nav-item"><a href="#"><i class="fa fa-newspaper-o"></i> Update News</a></li><br>
                            <li class="nav-item"><a href="#"><i class="fa fa-bell"></i> Update Notice</a></li><br>


                            </li><br>
                            <li class="nav-item"><a href="#"><i class="fa fa-file-excel-o"></i> Upload Excel</a></li><br>
                            <li class="nav-item"><a href="#"><i class="fa fa-bar-chart"></i> Analysis Report</a></li><br>

                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col bg-white">
                <p style="color: black; float:right;"> <?php echo "Hello" . " " . $admin ?></p>
                <a href="logout.php"><button>Logout</button></a>

                <br>
                <br>

                <div class="card-deck ml-2">
                    <div class="">
                        <div class="card text-white bg-success mb-3" style="width: 20rem;height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $countpend; ?></h5>
                                <p class="card-text">Cleck Here For Pending Rides</p>
                                <a href="pendingrides.php" class="btn btn-success ">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card text-white bg-danger mb-3" style="width: 20rem; height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $count ?></h5>
                                <p class="card-text">Total Rides </p>

                                <a href="totalrides.php" class="btn btn-danger">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card text-white bg-warning  mb-3" style="width: 20rem; height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $countcanceled; ?></h5>
                                <p class="card-text"></p> Cancelled Rides<br>
                                <a href="totalcanceled.php" class="btn btn-warning">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-deck ml-2">
                    <div class="">
                        <div class="card text-white bg-success mb-3" style="width: 20rem;height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $countactive; ?> </h5>
                                <p class="card-text">Total Client Active</p>
                                <a href="activeuser.php" class="btn btn-success">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="card text-white bg-danger mb-3" style="width: 20rem;height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $countsuspend; ?> </h5>
                                <p class="card-text">Total Client Suspended</p>

                                <a href="suspendedclient.php" class="btn btn-danger">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card text-white bg-warning  mb-3" style="width: 20rem;height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"> Add Location Here</h5>
                                <p class="card-text"></p>

                                <a href="addlocationhere.php" class="btn btn-warning">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-deck ml-2">
                    <div class="">
                        <div class="card text-white bg-success mb-3" style="width: 20rem;height:10rem">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"> See Available Location Here</p>
                                <a href="availablelocation.php" class="btn btn-success">More Info<i class="fa fa-hand-o-right ml-3" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>



                </div>
        </div>







        </main>
    </div>
    </div>

    <?php include 'footer.php' ?>


</body>

</html>