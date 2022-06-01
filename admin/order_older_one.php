<?php ob_start();
require('connection.php');
$id=$_REQUEST['id'];
$action=$_REQUEST['action'];
switch($action)
{
	case "proceed":
	$sql=mysqli_query($conn,"update orders set buystatus='Approved' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:new_order.php?msg=1');
	}else{
		header('location:new_order.php?msg=2');
	}
	break;
	case "delete":
	$reason=$_POST['reason'];
	$sql1=mysqli_query($conn,"insert into orderreject (reason,OrderID) values('$reason',$id)");
	if(mysqli_affected_rows($conn)>0)
	{
	$sql=mysqli_query($conn,"update orders set buystatus='Rejected' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:new_order.php?msg=3');
	}
	else{
		header('location:new_order.php?msg=4');
	}
	}
	break;
	case "shipping":
	$tid=$_POST['tid'];
	$tlink=$_POST['tlink'];
	$sql1=mysqli_query($conn,"insert into trackingorder (TrackingID,Link,OrderID) values('$tid','$tlink',$id)");
	if($sql1>0)
	{
	$sql=mysqli_query($conn,"update orders set Shiped='true' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:processed_order.php?msg=1');
	}
	else{
		header('location:processed_order.php?msg=2');
	}
	}
	break;
	case "delivered":
	$sql=mysqli_query($conn,"update orders set DeliveryStatus='true',Shiped='true' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:shipping_order.php?msg=1');
	}
	else{
		header('location:shipping_order.php?msg=2');
	}
    break;
	case "deleted":
	$sql=mysqli_query($conn,"delete from orders where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:complete_order.php?msg=1');
	}
	else{
		header('location:complete_order.php?msg=2');
	}
	 break;
	case "deleted_order":
	$sql=mysqli_query($conn,"delete from orders where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		header('location:deliveredOrder.php?msg=1');
	}
	else{
		header('location:deliveredOrder.php?msg=2');
	}
}

?>