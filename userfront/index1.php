<?php

session_start();
$res['name'] = $_SESSION['username'];

?>

<!doctype html>
<html lang="en">

<head>
    <title>CedCab</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="fba300a1f1403a543a50634b-text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" type="fba300a1f1403a543a50634b-text/javascript"></script>

    <script src="script.js" type="fba300a1f1403a543a50634b-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="fba300a1f1403a543a50634b-|49" defer=""></script>



    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="cedcab.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
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
    <div class="banner" class="pt-2 pb-2">
        <h1 class=" bannerheading text-center mt-lg-7 pt-lg-4  pt-sm-0 " style="color: white;">Book a
            City Taxi to your
            destination in
            town</h1>

        <h2 class=" bannerpara text-center ">Choose from a range of categories and prices</h2>

        <section class="container-fluid box col-lg-4 col-sm-10 col-xs-12 col-md-7 ml-lg-5 ml-md-5 pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2" style="background-color: white;">
            <div class="text-center">
                <div class="text">
                    <button class="btn btn-xs text font-weight-bold" style="background-color: #cddc39; color: black; border-radius: 12px;">CITY
                        TAXI</button>
                    <hr>
                </div>
                <h4 class="font-weight-bold">Your everyday travel partner</h4>
                <h6>AC cabs for point to point travel</h6>
            </div>

            <form method="POST">
                <div class="form-group row input">
                    <label class="col-sm-3" for="pickup">PICKUP</label>

                    <select name="pickup" class="form-control-plaintext col-sm-9 arro choose" id="pickup" required>
                        <?php
                        include_once 'locationoops.php';
                        $navobj = new location();
                        $res = $navobj->nav();
                        $row = $res->num_rows;
                        for ($i = 0; $i < $row; $i++) {
                            $resultobj = $res->fetch_assoc();

                        ?>
                            <option value="" class="text-secondary" selected disabled hidden>Current Location</option>
                            <option value="<?php echo $resultobj['name'];
                                            ?>"> <?php echo $resultobj['name'];
                                                    ?> </option>
                        <?php
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group row input">
                    <label class="col-sm-3" for="drop">DROP</label>

                    <select name="drop" class="form-control-plaintext col-sm-9 arro choose" id="drop" required>
                        <?php
                        include_once 'locationoops.php';
                        $navobj = new location();
                        $res = $navobj->nav();
                        $row = $res->num_rows;
                        for ($i = 0; $i < $row; $i++) {
                            $resultobj = $res->fetch_assoc();

                        ?>
                            <option value="" class="text-secondary" selected disabled hidden>Current Location</option>
                            <option value="<?php echo $resultobj['name'];
                                            ?>"> <?php echo $resultobj['name'];
                                                    ?> </option>


                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group row input ">
                    <label class="col-sm-3" for="cabtype">CAB TYPE</label>
                    <select name="cabtype" onchange=change() class="form-control-plaintext col-sm-9 arro" name="cabtype" id="cabtype" required>
                        <option value="" selected disabled hidden>Drop down to select CAB type</option>
                        <option value="CedMicro">CedMicro</option>
                        <option value="CedMini">CedMini</option>
                        <option value="CedRoyal">CedRoyal</option>
                        <option value="CedSUV">CedSUV</option>
                    </select>
                </div>

                <div class="form-group row input">
                    <label class="col-sm-3" for="luggage">LUGGAGE</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" ; oninput="this.value = Math.abs(this.value)" class="form-control-plaintext col-sm-9 arrow" name="luggage" maxlength="2" id="luggage" placeholder="Enter weight in KG">

                </div>
            </form>



            <input type="button" class="btn btn-lg btn-block col-sm-12" data-toggle="modal" value="   Calculate Distance
            " onclick=myfare() id="calculate" name="calculate" data-target="#exampleModal " style="background-color: #cddc39; color: black;">



            <!-- Modal  Starts Here-->
            <div class="modal fade mt-4 pt-4" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Your Ride Details Are</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body " style="background-color: #E1F8DC;">
                            <b>
                                <p id="dist" class="text-center" style="color:black; margin-left:25px; "></p>
                            </b>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BACK</button>
                            <a onclick="return confirm('Your Order is booked Waiting For approval')" href="userdashboard.php"><button type="button" class="btn btn-success">BOOK</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

</body>
<script>
    $('a.delete').on('click', function() {
        var select = confirm('Your Order is booked Waiting For approval');
        if (select === true) {
            return true;
        }
        return false;
    });
</script>

</html>