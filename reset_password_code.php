<?php 
ob_start();

error_reporting(0);
ini_set('display_error' , 0);

include("db.php");
$fg=$_REQUEST['fg'];
$pass=$_REQUEST['password'];
$cpass=$_REQUEST['cpassword'];
$query="update register set password='$pass',cpassword='$cpass',forgot_string='',forgot_date='' where forgot_string='$fg' and forgot_date=curdate()";
$res=mysqli_query($conn,$query);
if($res){
header('location:reset_password.php?msg=1010');
}else{
	header('location:reset_password.php?msg=10');
}
?>