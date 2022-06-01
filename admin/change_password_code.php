<?php
session_start();
include('connection.php');
$na=$_SESSION['admin_login'];
$old=$_POST['old'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$query1="select * from admin where email='$na'";
$res=mysqli_query($conn,$query1);
$dpass=mysqli_fetch_assoc($res);
if($password==$cpassword)
{
	if($old==$dpass['password'])
	{
	$query="update admin set password='$password'";
	mysqli_query($conn,$query);
	header('location:change_password.php?msg=1');
	}
	else{
			header('location:change_password.php?msg=3');
	}
}
else
{
	header('location:change_password.php?msg=2');
}

?>