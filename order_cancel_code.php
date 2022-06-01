<?php 
ob_start();
include('db.php');
$orderid=$_REQUEST['oid'];
 $sql="update orders set cancel_order=1,order_cancel_date=NOW() where OrderID='$orderid'";
$res=mysqli_query($conn,$sql);
$qu=mysqli_query($conn,"select Name,Mobile,TotalCharge from orders where OrderID='$orderid'");
if($row=mysqli_fetch_array($qu))
{
    $n=$row['Name'];
    $m=$row['Mobile'];
    $total=$row['TotalCharge'];
    //sms section
        $sm="Hi{$n} your order id{$orderid} of amount{$total} is cancel successfully if you have any query then call us at{#var#}- Team thechairwala.com";
		    
		     $sms=urlencode($sm);
		      $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=MEDWHT&sendto=".$m."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226505848489";    
		    file_get_contents($url);  
    
}
if($res){
	header("location:user_order.php?msg=010");
}else{
	header("location:user_order.php?msg=10");
}





?>