<?php 
include('ship.php');
include('connection.php');
$shipment_id=$_REQUEST['shipment_id'];

$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	
     $data_resp=label_gen($token,$shipment_id);
	if(array_key_exists("label_created",$data_resp) && $data_resp['label_created']==1){
		      $url=$data_resp['label_url'];
		      echo json_encode(array("status"=>1,"url"=>$url));
		 
		 //success
	}else{
		echo json_encode(array("status"=>2,"msg"=>"Invaild Data"));
	//Invaild data error
	}
}else{
	echo json_encode(array("status"=>0,"msg"=>"ship rocket auth error"));
	//ship rocket auth error
}


?>