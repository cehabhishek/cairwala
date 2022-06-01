<?php
session_start();
 ob_start();
include("db.php");


$e=$_POST['email'];
$p=$_POST['password'];

$query=mysqli_query($conn,"select * from register where email='$e' and password='$p'");
if($row=mysqli_fetch_array($query))
{
	
	$query1=mysqli_query($conn,"select * from register where email='$e' and password='$p' and user_status='1'");
		if($row1=mysqli_fetch_array($query1))
		{
	       
			$_SESSION['uemail']=$row1['email'];
			$_SESSION['uname']=$row1['name'];
			header('location:user_profile.php');
		}
		else
		{
			header("location:user_login.php?msg=3");
		}
	
	
}
else
{
	header("location:user_login.php?msg=4");
}



?>