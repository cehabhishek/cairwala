<?php 
include('ship.php');
include('connection.php');
$shipment_id=$_REQUEST['shipment_id'];

$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	
     $data_resp=pick_items($token,$shipment_id);
	if(array_key_exists("pickup_status",$data_resp) && $data_resp['pickup_status']==1){
		 $pick_up_data=$data_resp['response']['data'];
		 $res=mysqli_query($conn,"update orders set pick_up='$pick_up_data' where shipment_id='$shipment_id'");
		 header("location:processed_order.php?msg=96");
		 //success
	}else{
		header("location:processed_order.php?msg=94");
	//Invaild data error
	}
}else{
	header("location:processed_order.php?msg=88");
	//ship rocket auth error
}










?>