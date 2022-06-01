<?php 
	  function auth(){
		$postRequest = json_encode(array(
		'email' => 'employee.dcinfotech@gmail.com',
			'password' => 'sadanand123'
		));

		$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/auth/login');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json'
		));
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		$api = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		$apiRes = json_decode($api);
		return $data=json_decode(json_encode($apiRes),true);  
	  }

	 function order_place($token,$data)
	 {
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);
		$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/orders/create/adhoc');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);
	   
	 }
 
	function courier_sel($token,$shipment_id,$courier_id){
	$authorization = "Authorization: Bearer $token";
	$header=array(
		'Content-Type : application/json',
		$authorization
	);
    $data=http_build_query(array("shipment_id"=> "$shipment_id","courier_id"=>"$courier_id"));
	$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/courier/assign/awb');
	curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
	curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
	$apiResponse = curl_exec($cURLConnection);
	curl_close($cURLConnection);
	return $jsonArrayResponse = json_decode($apiResponse,true);

 }
 
	function pick_items($token,$shipment_id){

	$authorization = "Authorization: Bearer $token";
	$header=array(
		'Content-Type : application/json',
		$authorization
	);
	$data=http_build_query(array("shipment_id"=>(array($shipment_id))));
	$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/courier/generate/pickup');
	curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
	curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
	$apiResponse = curl_exec($cURLConnection);
	curl_close($cURLConnection);
	return $jsonArrayResponse = json_decode($apiResponse,true);

	}

	function invoice($token,$order_id){
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);

		 $data=http_build_query(array("ids"=>(array($order_id))));
		 $cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/orders/print/invoice');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);
		
	}
	
	function label_gen($token,$shipment_id){
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);
		$data=http_build_query(array("shipment_id"=>(array($shipment_id))));
		$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/courier/generate/label');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);
		
	}
	
	function manifest_gen($token,$shipment_id){
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);
		$data=http_build_query(array("shipment_id"=>(array($shipment_id))));
		$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/manifests/generate');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);
	}
	function cancel($token,$ord_id){
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);
		$data=http_build_query(array("ids"=>(array($ord_id))));
		$cURLConnection = curl_init('https://apiv2.shiprocket.in/v1/external/orders/cancel');
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);

	}
    function tracking_link($token,$awb_code){
		$authorization = "Authorization: Bearer $token";
		$header=array(
			'Content-Type : application/json',
			$authorization
		);
		$cURLConnection = curl_init("https://apiv2.shiprocket.in/v1/external/courier/track/awb/$awb_code");
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return $jsonArrayResponse = json_decode($apiResponse,true);
	}


?>