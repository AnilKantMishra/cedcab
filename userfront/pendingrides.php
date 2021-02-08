<?php
session_start();

$res['user_id'] = $_SESSION['admin'];

$res['name'] = $_SESSION['adminname'];

// $a = $res['user_id'];


?>
<html>

<head>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    #table {
      /* margin-top: 25px; */
      margin-bottom: 10px;

    }
  </style>
</head>

<body>

  <?php include_once 'adminheader.php'; ?>

  <table id="table" width="100%" class="table table-bordered display responsive">
    <thead>

      <tr>

        <th>Ride Date</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Total Distance</th>

        <th>Luggage </th>
        <th>Fare</th>
        <th> CABTYPE </th>
        <th> USER ID </th>
        <th> RIDE ID </th>
        <th>STATUS</th>


        <th>Accept</th>
        <th>Reject</th>


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

      $sql = "SELECT * FROM tbl_ride where status=1";

      $show = mysqli_query($conn, $sql);
      $countpend = 0;
      while ($s = mysqli_fetch_array($show)) {
      ?>
        <tr>
          <td><?php echo $s['ride_date']; ?></td>
          <td><?php echo $s['source']; ?></td>
          <td><?php echo $s['destination']; ?></td>
          <td><?php echo $s['total_distance']; ?></td>
          <td><?php echo $s['luggage']; ?></td>
          <td><?php echo $s['total_fare']; ?></td>
          <td><?php echo $s['CAB_TYPE']; ?></td>
          <td><?php echo $s['user_id']; ?></td>
          <td><?php echo $s['ride_id']; ?></td>
          <td><?php echo $s['status']; ?></td>
          <td>
            <a style="text-decoration: none; " onclick="return confirm('Do you want to Accept The Ride')" href="accept.php?ride_id=<?php echo $s['ride_id']; ?>"><button class="btn btn-danger">ACCEPT</button></a></td>
          <td><a style="text-decoration: none;" onclick="return confirm('Do you really want to Cancel The Ride')" href="cancelride.php?ride_id=<?php echo $s['ride_id']; ?>"> <button class="btn btn-success">CANCEL</button>

            </a></td>

        </tr>



      <?php
        $countpend++;
      }
      $_SESSION['countpend'] = $countpend;
      // echo $_SESSION['countpend'];
      ?>

    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <script>
    $('a.delete').on('click', function() {
      var select = confirm('Do you really want to Cancel The Ride ?');
      if (select === true) {
        return true;
      }
      return false;
    });
    $(document).ready(function() {
      $('#table').dataTable({
          "scrollX": true,
          "lengthMenu": [
            [10, 15, 50, 100, -1],
            [10, 15, 50, 100, "All"]
          ]
        }

      );

    });
  </script>




  <?php include 'footer.php' ?>
</body>

</html>