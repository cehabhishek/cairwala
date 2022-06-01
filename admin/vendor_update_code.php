<?php 
require("connection.php");
session_start();
$ss=$_SESSION['admin_login'];

 $select_category=$_POST['select_category'];

	 $vendor_name=$_POST['vendor_name'];
	 $vendor_mobile=$_POST['vendor_mobile'];
    $vendor_email=$_POST['vendor_email'];
    $business=$_POST['business'];
    $address=$_POST['address'];
    $hours=$_POST['hours'];
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $instagram=$_POST['instagram'];
    $youtube=$_POST['youtube'];
    $linkedin=$_POST['linkedin'];
    $about=$_POST['about'];
	 //$vendor_password=$_POST['vendor_password'];
	//$comfirm_password=$_POST['comfirm_password'];
	$filename=$_FILES['shop']['name'];
	$tmp_name=$_FILES['shop']['tmp_name'];
	$location="upload/";
	$filename1=$_FILES['banner']['name'];
	$tmp_name1=$_FILES['banner']['tmp_name'];
	$location="upload/";
	$filename2=$_FILES['logo']['name'];
	$tmp_name2=$_FILES['logo']['tmp_name'];
	$location="upload/";
	$filename3=$_FILES['gallery']['name'];
	$tmp_name3=$_FILES['gallery']['tmp_name'];
	$location="upload/";
	
	     move_uploaded_file($tmp_name,$location.$filename);
	     move_uploaded_file($tmp_name1,$location.$filename1);
	     move_uploaded_file($tmp_name2,$location.$filename2);
	     move_uploaded_file($tmp_name3,$location.$filename3);

	 $sql="update add_new_vendor set select_category='$select_category',vendor_name='$vendor_name',vendor_mobile='$vendor_mobile',vendor_email='$vendor_email',
	  	business='$business',hour='$hours',facebook='$facebook',twitter='$twitter',instagram='$instagram',youtube='$youtube',linkedin='$linkedin',about='$about',logo='$filename2',address='$address',shop_front_photo='$filename',
		banner_image='$filename1',gallery='$filename3' where vendor_email='$ss'";
	  

  mysqli_query($conn,$sql);
  header('location:profile.php')
   
   
	
	
	
	  
		
?>