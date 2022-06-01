<?php 
include('ship.php');
include('connection.php');
$order_id=$_REQUEST['order_id'];

$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	
     $data_resp=invoice($token,$order_id);
	if(array_key_exists("is_invoice_created",$data_resp) && $data_resp['is_invoice_created']==true){
		      $url=$data_resp['invoice_url'];
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