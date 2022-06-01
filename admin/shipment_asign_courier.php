<?php 
//include('ship.php');
include('connection.php');
$shipment_id=$_REQUEST['shipment_id'];
$courier_id=$_REQUEST['courier_id'];
//$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	
     $data_resp=courier_sel($token,$shipment_id,$courier_id);
	if(array_key_exists("awb_assign_status",$data_resp) && $data_resp['awb_assign_status']==1){
		 $awb=$data_resp['response']['data']['awb_code'];
		 $res=mysqli_query($conn,"update orders set awb_code='$awb' where shipment_id='$shipment_id'");
		 header("location:processed_order.php?msg=95");
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