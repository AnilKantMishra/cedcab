
<?php

session_start();
ini_set("SMTP","ssl://smtp.gmail.com");
 ini_set("smtp_port","25");


 $email=$_POST['email'];
  
  
     $otp= rand(100000,999999);
    
   
    $_SESSION['otp']=$otp;//session
     
   require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";// IP address or domain name
$mail->SMTPAuth = true;

$mail->SMTPSecure = "tls";

$mail->Port =25;  //Email Port
$mail->Username = "anilkantmishra356@gmail.com";// Email address of your server
$mail->Password = "tgsiucpbvsteqrbh";// Email password

$mail->setfrom('anilkantmishra356@gmail.com', 'Anil'); //email address

// $mail->Fromname = "anil";
$mail->AddAddress($email);
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

                                 // Set email format to HTML
    $mail->Subject = 'Mail From Cedcab ';
    
    $mail->Body    = $otp;
   
echo "otpsent";

//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
    ?>
   