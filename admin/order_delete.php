<?php 
$id=$_REQUEST['id'];

include('connection.php');

 $sql="delete from orders where OrderID='$id'";
mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0){
	header('location:dashboard.php?msg=1');
}else{
	header('location:dashboard.php?msg=2');
}








?>