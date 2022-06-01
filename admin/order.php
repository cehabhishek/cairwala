<?php
session_start();
ob_start();
require('connection.php');
 $id=$_REQUEST['id'];
 $action=$_REQUEST['action'];
 $c_num=9958457125;
switch($action)
{
	case "proceed":
	$sql=mysqli_query($conn,"update orders set buystatus='Approved' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
	
		$mobile='';$name='';$p_name='';$orderid='';$tot_p='';$qnt='';$order_date='';
		
		$sa="select o.Name,o.Mobile,o.OrderID,o.TotalCharge,o.Quantity,o.Date,p.Name as pname from orders o join products p on o.ProductID=p.ProductID  where OrderID=$id";
		$resu=mysqli_query($conn,$sa);
		if($rows=mysqli_fetch_array($resu)){
			$mobile=$rows['Mobile'];
			$name=$rows['Name'];
			$p_name=$rows['pname'];
			$orderid=$rows['OrderID'];
			$tot_p=$rows['TotalCharge'];
			//$msg_mob.="$rows[pname] of Rs. $rows[TotalCharge]/-,";		
		}
	        $sm="Hi{$name} your order id {$orderid} is accepted and shipped soon, If you have any quires then call us at {$c_num}- Team www.chairwala.com";
		     $sms=urlencode($sm);
		        $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$mobile."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226456387233";   
		    file_get_contents($url); 
		
		header('location:new_order.php?msg=1');
	}
	else{
		header('location:new_order.php?msg=2');
	}
	break;
	case "delete":
	  $n=$_SESSION['C_name'];
	  $m=$_SESSION['C_mobile'];
	  $c_num=9958457125;
	$reason=$_POST['reason'];
	$sql1=mysqli_query($conn,"insert into orderreject (reason,OrderID) values('$reason',$id)");
		
	if($rows=mysqli_affected_rows($conn)>0)
	{
	$sql=mysqli_query($conn,"update orders set buystatus='Rejected' where OrderID=$id");
	//sms section
        $sm="Hi {$n} your order id{$id} is rejected by us due to{$reason} for more call us at{$c_num}- Team thechairwala.com";
		    
		     $sms=urlencode($sm);
		     $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$m."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226491899097";   
		    file_get_contents($url); 

		
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
	if(mysqli_affected_rows($conn)>0)
	{
	$sql=mysqli_query($conn,"update orders set Shiped='true' where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{  

		$email='';$name='';$p_name='';$mobile='';
		
		$sa="select o.Name,o.Mobile,o.Email,p.Name as pname from orders o join products p on o.ProductID=p.ProductID  where OrderID=$id";
		$resu=mysqli_query($conn,$sa);
		if($rows=mysqli_fetch_array($resu)){
			$email=$rows['Email'];
			$name=$rows['Name'];
			$p_name=$rows['pname'];
			$mobile=$rows['Mobile'];
		}
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
		
		//sending msg
		// $m_num=$mobile;	
		/* $n_message="Hi, ".$name." your product ".$p_name ." is shipped Tracking ID ".$tid." Order tracking link is ".$tlink."- Team Mimansha Nature Care!";	
		$message_m=urlencode($n_message);	

		 $sms="http://egrosms.egro.in/api/mt/SendSMS?user=VIKRAM&password=VIKRAM&senderid=BSFSMS&channel=Trans&DCS=0&flashsms=0&number=".$m_num."&text=".$message_m."&route=4";	
		//exit;	
		$res=curl_init($sms);	
		curl_setopt($res,CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($res);
		*/
		 
		//sms section
        $sm="Hi{$name} your Order ID{$orderid} of amount {#var#} with payment mode {#var#} is shipped with {#var#} by us shipment id is {$tid} and tracking link {$tlink} - Team thechairwala.com";
		    
		     $sms=urlencode($sm);
		      $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$m_num."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226473267404";   
		    file_get_contents($url); 
		
		#sending email for shipping details
		
		$subject = 'The Chairwala.com : Shipment Detail For Your Order';
		$to=$email;
		
		//$from=$c_sending_mail;
		// message
	 $message ='
		<html>
		<head>
		  <title>Shipment Detail For Your Order('.$p_name.')</title>
		</head>
		<body>
			<p>Dear ,'.$name.'&nbsp;thank you for Placing Order with us, we are happy to serve you.Your Order have been shipped.Shipping details are:</p>
			<p> Product Name: '.$p_name.' </p>
			<p> Your Order TrackingID: '.$tid.' </p>
			<p> Your Order Tracking Link: '.$tlink.' </p>
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
		mail($to, $subject, $message, $headers);
		
		header('location:processed_order.php?msg=1');
	}else{
			header('location:processed_order.php?msg=2');
	}
	}else{
		header('location:processed_order.php?msg=2');
	}
	
	
	
	
	break;
	case "delivered":
	$sql=mysqli_query($conn,"update orders set DeliveryStatus='true',delivery_date=CURDATE() where OrderID=$id");
	if(mysqli_affected_rows($conn)>0)
	{
		
		$email='';$name='';$mobile='';$p_name='';$orderid='';$tot_p='';$qnt='';$order_date='';
		
		$sa="select o.Name,o.Mobile,o.Email,o.OrderID,o.TotalCharge,o.Quantity,o.Date,p.Name as pname from orders o join products p on o.ProductID=p.ProductID  where OrderID=$id";
		$resu=mysqli_query($conn,$sa);
		if($rows=mysqli_fetch_array($resu)){
			$email=$rows['Email'];
			$name=$rows['Name'];
			$p_name=$rows['pname'];
			$orderid=$rows['OrderID'];
			$tot_p=$rows['TotalCharge'];
			$qnt=$rows['Quantity'];
			$order_date=$rows['Date'];
			$mobile=$rows['Mobile'];
		}
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
		
		
		
		//sending msg
	/*	 $m_num=$mobile;	
		 $n_message="Hi, ".$name." your product ".$p_name ." of amount Rs.".$tot_p."/-  is delivered successfully please provide us review on www.mimanshanaturecare.co.in- Team Mimansha Nature Care!";	
		$message_m=urlencode($n_message);	

		 $sms="http://egrosms.egro.in/api/mt/SendSMS?user=VIKRAM&password=VIKRAM&senderid=BSFSMS&channel=Trans&DCS=0&flashsms=0&number=".$m_num."&text=".$message_m."&route=4";	
		//exit;	
		$res=curl_init($sms);	
		curl_setopt($res,CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($res);
		*/
			//sms section
        $sm="Hi{$name} your order ID{$orderid} is delivered successfully - Team thechairwala.com";
		    
		     $sms=urlencode($sm);
		      $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=MEDWHT&sendto=".$mobile."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226486050110";   
		    
		    file_get_contents($url); 
		
		#sending email for shipping details
		
		$subject = 'The Chairwala.com : Order Delivered';
		$to=$email;
		
		$from=$c_sending_mail;
		// message
	 $message ='
		<html>
		<head>
		  <title> Your Order('.$p_name.') Has been Delivered</title>
		</head>
		<body>
			<p>Dear ,'.$name.'&nbsp;thank you for Placing Order with us, we are happy to serve you.Your Order(Product Name: '.$p_name.') have been Delivered.</p>
			<p>You Can Download Your Invoice From Your The Chairwala.com <p>.
			<p>Product Name: '.$p_name.'</p>
			<p>Order Id: CHIWLA00'.$orderid.'</p>
			<p>Order Date: '.$order_date.'</p>
			<p>Order Quantity: '.$qnt.'</p>
			<p>Total Amount: '.$tot_p.'</p>
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
		mail($to, $subject, $message, $headers);
		
	
		header('location:shipping_order.php?msg=1');
	}
	else{
		header('location:shipping_order.php?msg=2');
	}
	break;
	case "complete_order_delete":
	 $sql="delete from orders where OrderID=$id";
	 $sq=mysqli_query($conn,$sql);
	 if(mysqli_affected_rows($conn)>0){
		echo 1;
	 }else{
		 echo 0;
	 }
	 break;
	 case "rejected_order_delete":
	  $sqs="delete from orderreject where OrderID=$id";
	  mysqli_query($conn,$sqs);
	  $sql="delete from orders where OrderID=$id";
	 $sq=mysqli_query($conn,$sql);
	 if(mysqli_affected_rows($conn)>0){
		echo 1;
	 }else{
		 echo 0;
	 } 
	break;
	
}

?>