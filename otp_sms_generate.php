<?php 
session_start();
ob_start();

//error_reporting(0);
//ini_set('display_error' , 0);

include("db.php");


function mailing($otp,$email){
	  
	  
$subject = 'Thank You For Registered With Us!';
$to=$email;
//$from='autoreply@dcskillhub.com';  //from
$from='Info@chairwala.com';
// message
$message ='
<html>
<head>
  <title>Otp Verification - The Chairwala.com!!</title>
</head>
<body>
	<p>Dear ,User'.$otp.'&nbsp; is your verification code.</p>
	
	<br><br></br>
	<p style="color:Green"><u><b>Warm Regards</b></u></p>
		<p style="color:Green">www.chiarwala.co.in</p>
			<p style="color:Green">Mobile:8112431111  </p>
			<p style="color:Green">Email:info@chairwala.com </p>
			<p style="color:Green">Address: .S-14/84-G-1-M..Near Patel Dharsala Teliabagh, Varanasi, Uttar Pradesh,221002</p>		
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From:The Chairwala.com!  <'.$from.'>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
	  
return true;	  
	  
  }
  
  
function otp_sms($number,$otp){
	$m_num=$number;	
		$sm="Hi, your code is {$otp} - Team the chairwala.com";
		     $sms=urlencode($sm);
		     $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$number."&message=".$sms."&PEID=1501604760000039060&templateid=1507165225115299120";    
		    file_get_contents($url); 
}  

$number = $_POST['mobile'];
$email = $_POST['email'];
$otp = rand(1000,9999);

$_SESSION['otp_verification']=$otp;


otp_sms($number,$otp);
mailing($email,$otp);


echo true;
//echo $otp;




?>