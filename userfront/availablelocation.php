<html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<head>

    <style>
        body {
            background-color: #f1f1f1;
        }

        #table {
            font-size: 25px;
            background-color: wheat;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include_once 'adminheader.php'; ?>

    <table id="table" width="100%" class="table table-bordered display responsive">
        <thead style="text-align: center;">

            <tr style="text-align: center;">
                <th>Location Name</th>
                <th>Distance</th>
                <th>BLOCK</th>
                <th>Delete</th>



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

            $sql = "SELECT * FROM tbl_location where is_available='1'";

            $show = mysqli_query($conn, $sql);
            $countactive = 0;
            while ($s = mysqli_fetch_array($show)) {
            ?>
                <tr>
                    <td><?php echo $s['name']; ?></td>
                    <td><?php echo $s['distance']; ?></td>

                    <td>
                        <a style="text-decoration: none; " onclick="return confirm('Do you want to Edit The Location')" href="updatelocation.php?id=<?php echo $s['id']; ?>"><button class="btn btn-danger">EDIT</button></a></td>
                    <td><a style="text-decoration: none;" onclick="return confirm('Do you really want to Delete The Location')" href="deletelocation.php?id=<?php echo $s['id']; ?>"> <button class="btn btn-success">DELETE</button>

                        </a></td>


                </tr>

            <?php
                $countactive++;
                $_SESSION['$countactive '] = $countactive;
            }

            // echo $_SESSION['$countactive '];
            ?>

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $('a.delete').on('click', function() {
            var select = confirm('Do you really want to Delete The Location ?');
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

</body>

</html>