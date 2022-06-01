<?php
ob_start();
$id=$_REQUEST['id'];
include('connection.php');
mysqli_query($conn,"delete from banner where id='$id'");

if(mysqli_affected_rows($conn)>0){
header('location:view_banner.php?msg=1');
}else{
	header('location:view_banner.php?msg=2');
}

?>