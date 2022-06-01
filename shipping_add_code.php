<?php
$id=$_REQUEST['id'];
include('db.php');
$fname=$_POST['fname'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$landmark=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$query="update register set address='$address',landmark='$landmark',city='$city',state='$state',zip='$zip' where id='$id'";

$res=mysqli_query($conn,$query);
header('location:shoppingaddress.php?msg=sccuess');
?>