<?php
if (isset($_POST['submit'])) {

    $locationname = $_POST['locationname'];
    $distance = $_POST['distance'];

    //database connection
    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "cedcab";

    // Create connection
    $conn = mysqli_connect($server, $username, $pass, $dbname);

    $sql = "INSERT INTO tbl_location (`name`, `distance`, `is_available`)
VALUES ('$locationname','$distance','1')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>   alert('Location Added Successfully')      </script>";
        echo "<script>  window.location.href='admindashboard.php'      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
            ;
        }

        select {
            -moz-appearance: none;
            -webkit-appearance: none;
        }

        select::-ms-expand {
            display: none;
        }

        input[type=text],
        textarea,
        select {
            width: 50%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number],
        textarea,
        select {
            width: 50%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            text-align: center;
            background-color: #45a049;
        }

        .container {
            border-radius: 2px;
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>

    <link rel="stylesheet" href="admindash.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>


    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'sigupnav.php' ?>
    <br>
    <h3 style="text-align: center;">
        Add Location
    </h3>
    <br>
    <div class="container" style="width:60%;">
        <form action="" method="POST">

            <br>

            <br>
            <br>
            <label for="locationname">Location Name</label>
            <br>
            <input type="text" id="locationname" name="locationname" placeholder="" required>
            <br>
            <label for="distance">Distance</label>
            <br>
            <input type="number" id="distance" name="distance" placeholder="" required>
            <br>
            <br>

            <input type="submit" name="submit" value="submit">
            <br>
            <br>
        </form>
    </div>
</body>


</html>