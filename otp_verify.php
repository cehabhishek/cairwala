<?php
session_start();
ob_start();

//error_reporting(0);
//ini_set('display_error' , 0);

//include("db.php");


$otp = $_POST['otp'];

if($otp==$_SESSION['otp_verification']){
	echo json_encode(array("result"=>1,'msg'=>'success'));
}else{
	echo json_encode(array("result"=>0,'msg'=>'OTP Does Not Matched'));
}









?>