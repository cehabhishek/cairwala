<?php
ob_start();
include('db.php');
$name=$_REQUEST['name'];

$mobile=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$landmark=$_REQUEST['landmark'];
$city=$_REQUEST['city'];
$state=$_REQUEST['state'];
$zip=$_REQUEST['zip'];
$id=$_REQUEST['id'];


$sql="update register set name='$name',mobile='$mobile',address='$address',landmark='$landmark',city='$city',state='$state',zip='$zip' where id='$id'";
$res=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0){
header('location:myprofile.php?msg=1');
}else{
	header('location:myprofile.php?msg=2');
}


?>