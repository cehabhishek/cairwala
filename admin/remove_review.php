<?php 
ob_start();

$id=$_REQUEST['id'];
include('connection.php');
$q="delete from reviews where id='$id'";
mysqli_query($conn,$q);
if(mysqli_affected_rows($conn)>0){
header('location:customer_reviews.php?msg=1');
}else{
header('location:customer_reviews.php?msg=2');	
}


?>