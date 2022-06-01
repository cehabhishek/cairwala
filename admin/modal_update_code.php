<?php 
session_start();
include('connection.php');
 $name=$_SESSION['Vendor_name'];
 $val=$_REQUEST['val'];
 
 switch($val)
 {
	 case 1:
	 
	 $location=$_POST['location'];
	 $query="update add_new_vendor set address='$location' where vendor_name='$name' ";
	 mysqli_query($conn,$query);
	 header('location:profile.php');
	 
	 break;
	 case 2:
	 $email=$_POST['email'];
	 $query="update add_new_vendor set contact_email='$email' where vendor_name='$name' ";
	 mysqli_query($conn,$query);
	 header('location:profile.php');
	 break;
	 case 3:
	 $number=$_POST['number'];
	 $query="update add_new_vendor set contact_mobile='$number' where vendor_name='$name' ";
	 mysqli_query($conn,$query);
	 header('location:profile.php');
	  break;
	 case 4:
	 $google=$_POST['google'];
	 $query="update add_new_vendor set google='$google' where vendor_name='$name' ";
	 mysqli_query($conn,$query);
	 header('location:profile.php');
 }

?>