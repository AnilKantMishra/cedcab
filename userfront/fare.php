<?php
session_start();


//from post as user inputted


$pickup = $_POST['pickup'];
$drop  = $_POST['drop'];




$cabtype = $_POST['cabtype'];
$luggage  = $_POST['luggage'];

//database include

include 'locationoops.php';

//pickup

$dis = new location();
$pickupdis = $dis->distance($pickup);

//drop
$dist1 = new location();
$dropdis = $dist1->distance($drop);

$dist = $pickupdis - $dropdis;

$cdist = abs($dist);


if ($luggage == "") {
    $luggage = 0;
}

switch ($cabtype) {

    case "CedMicro":
        $fixedfare = 50;
        $dist1 = 13.50;
        $dist2 = 12.00;
        $dist3 = 10.20;
        $dist4 = 8.50;
        $objMicro = new ced($cdist, $fixedfare, $dist1, $dist2, $dist3, $dist4);
        $objMicro->luggage($luggage = 0, $pickup, $drop, $cabtype, $cdist);
        break;

    case "CedMini":
        $fixedfare = 150;
        $dist1 = 14.50;
        $dist2 = 13.00;
        $dist3 = 11.20;
        $dist4 = 9.50;
        $objMini = new ced($cdist, $fixedfare, $dist1, $dist2, $dist3, $dist4);
        $objMini->luggage($luggage, $pickup, $drop, $cabtype, $cdist);
        break;

    case "CedRoyal":
        $fixedfare = 200;
        $dist1 = 15.50;
        $dist2 = 14.00;
        $dist3 = 12.20;
        $dist4 = 10.50;
        $objRoyal = new ced($cdist, $fixedfare, $dist1, $dist2, $dist3, $dist4);
        $objRoyal->luggage($luggage, $pickup, $drop, $cabtype, $cdist);
        break;

    case "CedSUV":
        $fixedfare = 250;
        $dist1 = 16.50;
        $dist2 = 15.00;
        $dist3 = 13.20;
        $dist4 = 11.50;
        $objSUV = new ced($cdist, $fixedfare, $dist1, $dist2, $dist3, $dist4);
        $objSUV->luggage($luggage, $pickup, $drop, $cabtype, $cdist);
        break;
}
class Ced
{

    public $fixedfare;
    function __construct($cdist, $fixedfare, $dist1, $dist2, $dist3, $dist4)
    {

        if ($cdist <= 10) {
            $this->fixedfare = $fixedfare + ($cdist * $dist1);
        } elseif ($cdist <= 60 &&  $cdist > 10) {
            $this->fixedfare = $fixedfare + 10 * $dist1 + $dist2 * ($cdist - 10);
        } elseif ($cdist <= 160 &&  $cdist > 60) {
            $this->fixedfare = $fixedfare + (10 * $dist1) + (50 * $dist2) + ($cdist - 60) * $dist3;
        } elseif ($cdist > 160) {
            $this->fixedfare = $fixedfare + (10 * $dist1) + (50 * $dist2) + (100 * $dist3) + ($cdist - 160) * $dist4;
        }
    }
    function luggage($luggage, $pickup, $drop, $cabtype, $cdist)
    {
        $this->fixedfare;

        if ($luggage > 0 && $luggage <= 10) {
            if ($cabtype == "CedSUV") {
                $this->fixedfare = $this->fixedfare + 100;
            } else {
                $this->fixedfare = $this->fixedfare + 50;
            }
        } elseif ($luggage > 10  && $luggage <= 20) {

            if ($cabtype == "CedSUV") {
                $this->fixedfare = $this->fixedfare + 200;
            } else {
                $this->fixedfare = $this->fixedfare + 100;
            }
        } elseif ($luggage > 20) {
            if ($cabtype == "CedSUV") {
                $this->fixedfare = $this->fixedfare + 400;
            } else {
                $this->fixedfare = $this->fixedfare + 200;
            }
        }
        echo "<table >
        <tr><th>Source </th><td>$pickup</td></tr>
        <tr><th>  Destination </th><td>$drop</td></tr>
        <tr><th>Distance </th><td>$cdist km</td></tr>
        <tr><th>Cabtype </th><td>$cabtype</td></tr>
        <tr><th>  Luggage  </td><td>$luggage</td></tr>
        <tr><th>  Total Fare  </td><td>$this->fixedfare</td></tr>

        </table>";




        $_SESSION['pickup'] = $pickup;
        $_SESSION['drop'] = $drop;
        $_SESSION['cdist'] = $cdist;
        $_SESSION['cabtype'] = $cabtype;
        $_SESSION['luggage'] = $luggage;
        $_SESSION['fare'] = $this->fixedfare;
        $total =  $_SESSION['fare'];
        $_SESSION['f'] = $total;
    }
}
