<?php
include('connection.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
if($type=='active'){
	mysqli_query($conn,"update products set status=1 where ProductID='$id'");
	header('location:view_product.php?msg=10');
}else{
	mysqli_query($conn,"update products set status=0 where ProductID='$id'");
	header('location:view_product.php?msg=11');
}
//echo "update products set status=1 where ProductID='$id'";


?>