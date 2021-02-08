<?php
session_start();

// $res['user_id']= $_SESSION['admin'];

$res['name'] = $_SESSION['username'];

$res['user_id'] = $_SESSION['userid'];
$res =  $res['user_id'];
// $name = $res['name'] ;

?>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
  <link rel="stylesheet" href="admindash.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    #table {



      margin-bottom: 10px;

    }
  </style>
</head>

<body>
  <?php include_once 'userheader.php'; ?>
  <br>
  <h1 style="text-align: center;"> Completed Rides </h1>
  <br>
  <table id="table" width="100%" class="table table-bordered display responsive">
    <thead>

      <tr>

        <th>Ride Date</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Total Distance</th>
        <th>STATUS</th>
        <th>Luggage </th>
        <th>Fare</th>
        <th> CABTYPE </th>


      </tr>
    </thead>
    <tbody>

      <?php

      //database connection
      $server = "localhost";
      $username = "root";
      $pass = "";
      $dbname = "cedcab";

      // Create connection
      $conn = mysqli_connect($server, $username, $pass, $dbname);

      $sql = "SELECT * FROM tbl_ride where status = 2 and user_id = $res";

      $show = mysqli_query($conn, $sql);

      while ($s = mysqli_fetch_array($show)) {
      ?>
        <tr>
          <td><?php echo $s['ride_date']; ?></td>
          <td><?php echo $s['source']; ?></td>
          <td><?php echo $s['destination']; ?></td>
          <td><?php echo $s['total_distance']; ?></td>
          <td><?php echo $s['status']; ?></td>
          <td><?php echo $s['luggage']; ?></td>
          <td><?php echo $s['total_fare']; ?></td>
          <td><?php echo $s['CAB_TYPE']; ?></td>

        </tr>

      <?php
      }
      ?>

    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#table').dataTable({
          "scrollX": true,
          "lengthMenu": [
            [5, 15, 50, 100, -1],
            [5, 15, 50, 100, "All"]
          ]
        }

      );

    });
  </script>




  <?php include 'footer.php' ?>
</body>

</html>