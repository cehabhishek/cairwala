<?php
session_start();
include('connection.php');
if(isset($_REQUEST['val']) && $_REQUEST['val']>0){
	$val=$_REQUEST['val'];
	switch($val){
		case 1:
		$email=$_POST['email'];
		$res=mysqli_query($conn,"select * from add_new_vendor where vendor_email='$email'");
		if(mysqli_num_rows($res)>0){
			$rand="SPD".rand(1111,9999);
			$_SESSION['RAND']=$rand;
			$_SESSION['EMAIL']=$email;
			$subject = 'Password Reset Requested!';
			$to=$email;
			$message="Your forget Password is Requested by You. Your OTP is ".$rand;
			$from='info@shopeedeal.com';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:Shopeedeal <'.$from.'>' . "\r\n";
			mail($to, $subject, $message, $headers);
			header("location:checkOTP.php");
		}else{
			header("location:vendor_forget_page.php?msg=1");
		}
		break;
		case 2:
		$otp=$_POST['otp'];
		$rand=$_SESSION['RAND'];
		if($otp==$rand){
			header("location:resetPassword.php");
		}else{
			header("location:checkOTP.php?msg=1");
		}
		break;
		case 3:
		$Password=$_POST['Password'];
		$cpassword=$_POST['cpassword'];
		if($Password==$cpassword){
			//header("location:resetPassword.php");
			$email=$_SESSION['EMAIL'];
			$res=mysqli_query($conn,"update add_new_vendor set vendor_password='$Password' where vendor_email='$email'");
			if($res){
				header("location:index.php?msg=2");
			}else{
				header("location:index.php?msg=3");
			}
		}else{
			header("location:resetPassword.php?msg=1");
		}
	}
}

?>