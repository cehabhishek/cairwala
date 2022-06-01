<?php 
#echo"<pre>";print_r($_REQUEST);exit;
ob_start();
//error_reporting(0);
//ini_set('display_errors', 0);
include("db.php");

$ids=$_REQUEST['pay_id'];
$pay_id=$_REQUEST['razorpay_payment_id'];

$id =explode(',',$ids);
//print_r($id);
   $n=count($id);
for($i=0;$i<$n;$i++){
 $query="update orders set onlinePaymentId='$pay_id',onlinePayment='Paid Online' where OrderID='$id[$i]'";
mysqli_query($conn,$query);
}

//qty
for($i=0;$i<$n;$i++){
 $quy="select ProductID,Quantity from orders where OrderID='$id[$i]'";
 $res=mysqli_query($conn,$quy);
 $pid='';
 $qty='';
 while($rw=mysqli_fetch_array($res)){
	$pid=$rw['ProductID'];  
	$qty=$rw['Quantity'];
 }
  $sqt="update products set quantitys=quantitys-'$qty' where ProductID='$pid'";
	mysqli_query($conn,$sqt);	
}



header('location:thankyou.php');


?>