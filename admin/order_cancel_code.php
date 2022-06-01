<?php 
ob_start();
include('connection.php');
$orderid=$_REQUEST['id'];
 $sql="update orders set cancel_order=1,order_cancel_date=NOW() where OrderID='$orderid'";
$res=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0){
	echo 1;
}else{
	echo 0;
}

?>