<?php 
	include('connection.php');
	$id=$_REQUEST['id'];
	$sql="delete from orders where OrderID=$id";
	$res=mysqli_query($conn,$sql);
	header('location:show_orderlist.php');

?>