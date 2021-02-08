
<?php

$distArray = array(
    "Charbagh"  =>   0,
    "Indira Nagar"  => 10,
    "BBD" => 30,
    "Barabanki"   => 60,
    "Faizabad"    => 100,
    "Basti"      =>    150,
    "Gorakhpur"  =>   210
);

 $pickup = $_POST['pickup'];
$drop  =$_POST['drop'];

$cabtype = $_POST['cabtype'];
$fare=0;

$luggage  =$_POST['luggage'];

if($pickup =="" || $drop =="" || $cabtype =="")
{
    echo "All fields are required";
}

else{

    if($pickup == $drop)
    {
        echo "please choose different pickup and drop locations";
    }

    else{   

    $distance = $distArray[$pickup] - $distArray[$drop];
    echo " Distance is " ."  "  .abs($distance) ."Fare is";
                 $cDist =  abs($distance);
         

            if($cabtype == "CedMicro")
            {

                    if($cDist <=10)
                    {
                        $fare = 50+ $cDist*13.50;
                    }

                    if( $cDist<=60 &&  $cDist>=11)
                    {
                        $fare = 50+135+( $cDist-10)*12.00;
                    }
                    if( $cDist>=61 &&  $cDist<=160)
                    {
                        $fare = (50+135+600)+( $cDist-60)*10.20;
                    }
                    if( $cDist>=161)
                    {
                        $fare = (50+135+600+1020)+($cDist-160)* 8.50;
                    }
                    echo $fare ;

             }

                if($cabtype == "CedMini" )
                {

                            if($cDist <=10)
                            {
                                $fare = 150+ $cDist*14.50;
                            }

                            if( $cDist<=60 &&  $cDist>=11)
                            {
                                $fare = 150+145+( $cDist-10)*13.00;
                            }
                            if( $cDist>=61 &&  $cDist<=160)
                            {
                                $fare = (150+145+650)+( $cDist-60)*11.20;
                            }
                            if( $cDist>=161)
                            {
                                $fare = (150+145+650+1120)+($cDist-160) * 9.50;
                            }
                            echo $fare ;

                }              
            if($cabtype == "CedRoyal")
            {

                    if($cDist <=10 )
                    {
                        $fare = 200+ $cDist*15.50;
                    }

                    if( $cDist<=60 &&  $cDist>=11)
                    {
                        $fare = 200+155+( $cDist-10)*14.00;
                    }
                    if( $cDist>=61 &&  $cDist<=160)
                    {
                        $fare = (200+155+700)+($cDist-60)*12.20;
                    }
                    if( $cDist>=161)
                    {
                        $fare = (200+155+700+1220)+($cDist-160) * 10.50;
                    }
                    echo $fare ." " ;
            }

            if($cabtype == "CedSUV")
            {

                if($cDist <=10)
                {

                    $fare = 250+ $cDist*16.50;
                }

                if( $cDist<=60 &&  $cDist>=11)
                {
                    $fare = 250+165+( $cDist-10)*15.00;
                }
                if( $cDist>=61 &&  $cDist<=160)
                {
                    $fare = (250+165+750)+( $cDist-60)*13.20;
                }
                if( $cDist>=161 )
                {
                    $fare = (250+165+750+1320)+($cDist-160) * 11.50;
                }
                echo $fare ;

            }
            // luggage weight calculation //

            if($luggage>0 && $luggage<=10){
                if($cabtype == "CedMini" || $cabtype == "CedRoyal"){
                    $fare = $fare+50;
                  echo "luggage is" .$fare;
                }
                elseif($cabtype == "CedSUV"){
                    $fare =($fare+100);
                    echo "luggage is" .$fare;
                }

            }
            elseif($luggage>10 && $luggage<=20){
                if($cabtype == "CedMini" || $cabtype == "CedRoyal"){
                    $fare = $fare+100;
                    echo "luggage is" .$fare;
                  
                }
                elseif($cabtype == "CedSUV" ){
                    $fare = ($fare+200);
                    echo "luggage is" .$fare;
                }

            }
            elseif($luggage>20){
                if($cabtype == "CedMini" || $cabtype == "CedRoyal"){
                    $fare = $fare+200;
                    echo "luggage is" .$fare;
                   
                }
                elseif($cabtype == "CedSUV" ){
                    $fare = ($fare+400);
                    echo "luggage is" .$fare;
                }

            }  }

            echo "<table>
            <tr><th>Source</th><td>$pickup</td></tr>
            <tr><th>Destination</th><td>$drop</td></tr>
            <tr><th>Distance</th><td>$dis km</td></tr>
            <tr><th>Luggage</th><td>$luggage kg</td></tr>
            <tr><th>Price</td><td>&#8377;$fare</td></tr>
            
            </table>";
            
    }  
   



   
?>