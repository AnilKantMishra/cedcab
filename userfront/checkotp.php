
<?php

session_start();

$recotp=$_POST['recotp'];
  
$otp = $_SESSION['otp'];



if($recotp==$otp){
echo "1";
}
else{
    echo "0";
}
   

?>