<?php
ob_start();
$id=$_REQUEST['id'];
include('connection.php');
mysqli_query($conn,"delete from slider where id='$id'");

if(mysqli_affected_rows($conn)>0){
header('location:view_slider.php?msg=1');
}else{
	header('location:view_slider.php?msg=2');
}

?>