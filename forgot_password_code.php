<?php
ob_start();

error_reporting(0);
ini_set('display_error' , 0);

include("db.php");


function mailing($name,$email,$sent){
	  
	  
$subject = 'Reset Your Password';
$to=$email;
//$from='autoreply@dcskillhub.com';  //from
$from='Info@chairwala.com';
// message
$message ='
<html>
<head>
  <title>Reset Your Password!</title>
</head>
<body>
	<p>Dear ,'.$name.'&nbsp; We are happy to serve you.</p>
	<p> You can reset your password by using the below link which is valid for today only. </p>
	<p> Please use the reset link: http://103.146.177.62/~chairwala/public_html/reset_password.php?link='.$sent.'</p>
	
	</br></br></br>
	<p style="color:Green"><u><b>Warm Regards</b></u></p>
		<p style="color:Green">www.chairwala.com</p>
			<p style="color:Green">Mobile:8112431111 </p>
			<p style="color:Green">Email:info@chairwala.com </p>
			<p style="color:Green">Address:3rd floor Chitrahar Building ,Nawal Kishor road Hazratganj Lucknow, Uttar Pradesh </p>
		
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From:The Chairwala.com <'.$from.'>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
	  
return true;	  
	  
  }



$email=$_REQUEST['email'];
$sql="select*from register where email='$email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	$name='';
	while($row=mysqli_fetch_array($res)){$name=$row['name'];}
	$forgot_str=chr(rand(65,91)).chr(rand(65,88)).rand(100000,99999999).chr(rand(65,87)).chr(rand(65,91));
	$sent=base64_encode($forgot_str);
	
	$query="update register set forgot_string='$forgot_str',forgot_date=curdate() where email='$email'";
	$result=mysqli_query($conn,$query);
	if($result){
		mailing($name,$email,$sent);
		header('location:forgot_password.php?msg=6');
		
	}else{
		header('location:forgot_password.php?msg=5');
	}
	
}else{
	header('location:forgot_password.php?msg=4');
}


 ?>