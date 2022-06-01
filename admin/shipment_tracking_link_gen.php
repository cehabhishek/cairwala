<?php 
include('ship.php');
include('connection.php');
$shipment_id=$_REQUEST['shipment_id'];
$awb_code=$_REQUEST['awb_code'];
$trak_link='';
$trk_id='';
$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	$data_resp=tracking_link($token,$awb_code);
	
	if(array_key_exists("tracking_data",$data_resp)){
		     
			 if($data_resp['tracking_data']['track_status']==1){
				 $trk_link=$data_resp['tracking_data']['track_url'];
				 $sql="update orders set tracking='$trk_link' where shipment_id='$shipment_id'";
				 mysqli_query($conn,$sql);
				 if(mysqli_affected_rows($conn)>0){
					$sqls="select * from orders where shipment_id='$shipment_id'"; 
					 $results=mysqli_query($conn,$sqls);
					  if(mysqli_num_rows($results)>0){
						 while($rows=mysqli_fetch_array($results)){
							$trak_link=$rows['tracking'];
							$trk_id=$rows['awb_code'];
							$ord_id=$rows['OrderID'];
 							mysqli_query($conn,"insert into trackingorder (TrackingID,Link,OrderID) values('$trk_id','$trak_link',$ord_id)");
						 }
						 mysqli_query($conn,"update orders set Shiped='true' where shipment_id='$shipment_id'");
						if(mysqli_affected_rows($conn)>0)
						{  

							$email='';$name='';$p_name=array();$mobile='';
							
							$sa="select o.Name,o.Mobile,o.Email,p.Name as pname from orders o join products p on o.ProductID=p.ProductID  where shipment_id='$shipment_id'";
							$resu=mysqli_query($conn,$sa);
							while($rows=mysqli_fetch_array($resu)){
								$email=$rows['Email'];
								$name=$rows['Name'];
								$p_name[]=$rows['pname'];
								$mobile=$rows['Mobile'];
							}
							//echo"<pre>";print_r($p_name);exit;
							$product_names=implode(',',$p_name);
							$c_email='';$c_name='';$c_address='';$c_sending_mail='';$c_mobile='';$c_website='';
							$res=mysqli_query($conn,"select * from company_contact limit 1");
							if($rows=mysqli_fetch_array($res)){
								$c_email=$rows['c_email'];
								$c_name=$rows['c_name'];
								$c_address=$rows['c_address'];
								$c_sending_mail=$rows['c_sending_mail'];
								$c_mobile=$rows['c_mobile'];
								$c_website=$rows['c_website'];
								
							}
							/*
							//sending msg
							 $m_num=$mobile;	
							 $n_message="Hi, ".$name." your product/s ".$product_names ." is shipped Tracking ID ".$trk_id." Order tracking link is ".$trak_link."- Team Mimansha Nature Care!";	
							$message_m=urlencode($n_message);	

							 $sms="http://egrosms.egro.in/api/mt/SendSMS?user=VIKRAM&password=VIKRAM&senderid=BSFSMS&channel=Trans&DCS=0&flashsms=0&number=".$m_num."&text=".$message_m."&route=4";	
							//exit;	
							$res=curl_init($sms);	
							curl_setopt($res,CURLOPT_RETURNTRANSFER,1);
							$data = curl_exec($res);
							
							*/
							
							#sending email for shipping details
							
							$subject = 'The Chairwala.com: Shipment Detail For Your Order';
							$to=$email;
							
							$from=$c_sending_mail;
							// message
						 $message ='
							<html>
							<head>
							  <title>Shipment Detail For Your Order</title>
							</head>
							<body>
								<p>Dear ,'.$name.'&nbsp;thank you for Placing Order with us, we are happy to serve you.Your Order have been shipped.Shipping details are:</p>
								<p> Product Name/s: '.$product_names.' </p>
								<p> Your Order TrackingID: '.$trk_id.' </p>
								<p> Your Order Tracking Link: '.$trak_link.' </p>
								<br><br></br>
								<p style="color:Green"><u><b>Warm Regards</b></u></p>
									<p style="color:Green">'.$c_website.'|'.$c_name.'</p>
										<p style="color:Green">Mobile:'.$c_mobile.'</p>
										<p style="color:Green">Email:'.$c_email.'</p>
										<p style="color:Green">Address:'.$c_address.'</p>
									
							</body>
							</html>
							';

							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							$headers .= 'From:'.$c_name.' <'.$from.'>' . "\r\n";
							@mail($to, $subject, $message, $headers);
							
							echo json_encode(array("status"=>1,"msg"=>"Traking link generated successfully.Please check in shipped order list.")); 
						}else{
								echo json_encode(array("status"=>6,"msg"=>"Database error3"));
						}
							 
					  }else{
						echo json_encode(array("status"=>5,"msg"=>"Database error2"));
					  }
				}else{
					echo json_encode(array("status"=>4,"msg"=>"Database error1"));
				 }
				
				 //echo json_encode(array("status"=>1,"link"=>$data_resp['tracking_data']['track_url'])); 
				 //success
			 }else{
				echo json_encode(array("status"=>3,"msg"=>"From ship rocket: ".$data_resp['tracking_data']['error'])); 
				//Aahh! There is no activities found in our DB. Please have some patience it will be updated soon
			 }
		
	}else{
		echo json_encode(array("status"=>2,"msg"=>"Invaild Data"));
	//Invaild data error
	}
}else{
	echo json_encode(array("status"=>0,"msg"=>"ship rocket auth error"));
	//ship rocket auth error
}


?>