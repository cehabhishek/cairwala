<?php
if(isset($_POST['submit']))
{
    ob_start();
	include('connection.php');
	$id=$_REQUEST['id'];
     $email=$_POST['email'];
	$password=$_POST['password'];
	 $query="update admin set email='$email',password='$password' where id='$id'";
	$res=mysqli_query($conn,$query);
	//print_r($res);exit;
	if(mysqli_affected_rows($conn)>0){ 
	   header('location:index.php?msg=1');
	}else{ 
			header('location:update_profile.php?msg=1');
	}
	
}

?>