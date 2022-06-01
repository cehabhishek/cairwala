<?php
session_start();
ob_start();
include("db.php");
$n=$_POST['name'];
$m=$_POST['mobile'];
$add=$_POST['address'];
$order=$_POST['peyment'];
$cur=$_SESSION["SystemID"];
//delivery_chare
$delivery_chg=$_POST['delivery_chg'];
$c_num=9958457125;

// amount 
$amt=0;
$gst_per=0;
$qu=mysqli_query($conn,"select * from gst order by id desc limit 1");
if(mysqli_num_rows($qu)>0){
while($rowss=mysqli_fetch_array($qu))
{
	$gst_per=$rowss['gst_percentage'];
	
}
}




$_SESSION['name']=$n;
$_SESSION['mobile']=$m;

$id_for_p=array();

if($order=='Case on Delivery')
{
$coupon_code='';
$dis_per='';
$no_of_time='';

$delivery_charge_remark="";
if($delivery_chg>0){
	$delivery_charge_remark=$delivery_chg;
}else{
	$delivery_charge_remark=0;
}
	
 $query=mysqli_query($conn,"select * from cart where SystemID='$cur'");
while($row=mysqli_fetch_array($query))
{
	 $pid=$row['ProductID'];
	 $amt+=$row['Price'];
	 $Quantity=$row['Quantity'];
	 $price=$row['Price'];
	 $email=$_SESSION['uemail'];
	 $coupon_code=$row['coupon_code'];
	 $dis_per=$row['dis_per'];
	 $no_of_time=$row['no_of_time'];
	 $base_price=$row['base_price'];
	 
	 if($gst_per!=0){
		// $price=$price+($price*($gst_per/100));
		$price=$price;
	 }
	 
		//echo $res="insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Date,DeliveryStatus,buystatus)
		  //values('$pid','$email','$n','$m','$add','100',now(),'false','Pending')";
	if(!empty($coupon_code)&&!empty($dis_per)&&!empty($no_of_time)){
		  $discounted_price=$price-(($dis_per/100)*$price);
		$query1=mysqli_query($conn,"insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,coupon_code,no_of_time,dis_per,delivery_charges,base_price,gst_percent)
				  values('$pid','$email','$n','$m','$add','$discounted_price','$Quantity',now(),'false','Pending','$cur','$coupon_code','$no_of_time','$dis_per','$delivery_charge_remark','$base_price','$gst_per')");
	    
	}	  
	else{	
          $rr="insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,delivery_charges,base_price,gst_percent,onlinePayment)
				  values('$pid','$email','$n','$m','$add','$price','$Quantity',now(),'false','Pending','$cur','$delivery_charge_remark','$base_price','$gst_per','$order')";	
		$query1=mysqli_query($conn,$rr);
	}
		$id_for_p[]= mysqli_insert_id($conn); 
		$i=$_SESSION['id']=implode(',',$id_for_p);
		
		//sms section
        //$sm="Hi{#var#}we received your order ID{#var#}. We inform once your order is accepted or call us at {#var#} for more information- Team www.chairwala.com";
		    $sm="Hi {$n} we received your order ID{$i}. We inform once your order is accepted or call us at {$c_num} for more information- Team www.chairwala.com";
		     $sms=urlencode($sm);
		     $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$m."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226448203790";    
		    //$url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=8127237766&message=hello&PEID=1501604760000039060&templateid=1507165226448203790";
		    file_get_contents($url); 
		
	//qty
    $sqt="update products set quantitys=quantitys-'$Quantity' where ProductID='$pid'";
	mysqli_query($conn,$sqt);	
}
 $_SESSION['id']=implode(',',$id_for_p);

  $clr="delete from cart where  SystemID='$cur'";
  mysqli_query($conn,$clr);

  header("location:thankyou.php");
}
else if($order=='Pay')
{  
$coupon_code='';
$dis_per='';
$no_of_time='';

$delivery_charge_remark="";
if($delivery_chg>0){
	$delivery_charge_remark=$delivery_chg;
}else{
	$delivery_charge_remark=0;
}

    $query=mysqli_query($conn,"select * from cart where SystemID='$cur'");
while($row=mysqli_fetch_array($query))
{
	 $pid=$row['ProductID'];
	 $Quantity=$row['Quantity'];
		$email=$_SESSION['uemail'];
	$amt+=$row['Price'];
	$price=$row['Price'];
	 $coupon_code=$row['coupon_code'];
	 $dis_per=$row['dis_per'];
	 $no_of_time=$row['no_of_time'];
	 $base_price=$row['base_price'];
	 
	  if($gst_per!=0){
		// $price=$price+($price*($gst_per/100));
		$price=$price;
	 }
	 
	 
	if(!empty($coupon_code)&&!empty($dis_per)&&!empty($no_of_time)){
		  $discounted_price=$price-(($dis_per/100)*$price);
		$query1=mysqli_query($conn,"insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,coupon_code,no_of_time,dis_per,delivery_charges,base_price,gst_percent)
				  values('$pid','$email','$n','$m','$add','$discounted_price','$Quantity',now(),'false','Pending','$cur','$coupon_code','$no_of_time','$dis_per','$delivery_charge_remark','$base_price','$gst_per')");
	
	}else{
	
$query1=mysqli_query($conn,"insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,delivery_charges,base_price,gst_percent)
		  values('$pid','$email','$n','$m','$add','$price','$Quantity',now(),'false','Pending','$cur','$delivery_charge_remark','$base_price','$gst_per')");
	}     
	 $id_for_p[]= mysqli_insert_id($conn); 
	 $i=$_SESSION['id']=implode(',',$id_for_p);
		
		//sms section
        	//sms section
        $sm="Hi {$n} we received your order ID{$i}. We inform once your order is accepted or call us at {$c_num} for more information- Team www.chairwala.com";
		    
		     $sms=urlencode($sm);
		     $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$m."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226448203790";    
		    file_get_contents($url); 
    
   
	
}
 $_SESSION['id']=implode(',',$id_for_p);
 	if(!empty($coupon_code)&&!empty($dis_per)&&!empty($no_of_time)){
		$tot_amt =$amt-(($dis_per/100)*$amt);
		 $_SESSION['amount']=$tot_amt+$delivery_chg; 
	}
 else{
    $_SESSION['amount']=$amt+$delivery_chg; 
 }
 
 $clr="delete from cart where  SystemID='$cur'";
  mysqli_query($conn,$clr);
header("location:pay_online.php");
}
else if($order=='Wallet')
{
$coupon_code='';
$dis_per='';
$no_of_time='';

$delivery_charge_remark="";
if($delivery_chg>0){
	$delivery_charge_remark=$delivery_chg;
}else{
	$delivery_charge_remark=0;
}
	
 $query=mysqli_query($conn,"select * from cart where SystemID='$cur'");
while($row=mysqli_fetch_array($query))
{
	 $pid=$row['ProductID'];
	 $amt+=$row['Price'];
	 $Quantity=$row['Quantity'];
	 $price=$row['Price'];
	 $email=$_SESSION['uemail'];
	 $coupon_code=$row['coupon_code'];
	 $dis_per=$row['dis_per'];
	 $no_of_time=$row['no_of_time'];
	  $base_price=$row['base_price'];
	 
	 if($gst_per!=0){
		// $price=$price+($price*($gst_per/100));
		$price=$price;
	 }
	 
		//echo $res="insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Date,DeliveryStatus,buystatus)
		  //values('$pid','$email','$n','$m','$add','100',now(),'false','Pending')";
	if(!empty($coupon_code)&&!empty($dis_per)&&!empty($no_of_time)){
		  $discounted_price=$price-(($dis_per/100)*$price);
		$query1=mysqli_query($conn,"insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,onlinePayment,coupon_code,no_of_time,dis_per,delivery_charges,base_price,gst_percent)
				  values('$pid','$email','$n','$m','$add','$discounted_price','$Quantity',now(),'false','Pending','$cur','$coupon_code','Wallet',$no_of_time','$dis_per','$delivery_charge_remark','$base_price','$gst_per')");
		//////////////////////////////////
		$co=mysqli_connect("localhost","root","","medwealth") or die('Database Connection Error');
		
		$query11="select * from manage_kyc where User_email='$email' and status='1'";
			$res11=mysqli_query($co,$query11);
			if($row11=mysqli_fetch_array($res11))
			{
			    $t_amount=$row11['total_amount'];
			    $less_amount=$t_amount-$base_price;

			    $u_query111=mysqli_query($co,"update manage_kyc set total_amount='$less_amount' where User_email='$email' and status='1'");
			   
			    
			}
		/////////////////////////////////
	
	}	  
	else{	  
		$query1=mysqli_query($conn,"insert into orders(ProductID,Email,Name,Mobile,Address,TotalCharge,Quantity,Date,DeliveryStatus,buystatus,SystemId,onlinePayment,delivery_charges,base_price,gst_percent)
				  values('$pid','$email','$n','$m','$add','$price','$Quantity',now(),'false','Pending','$cur','Wallet','$delivery_charge_remark','$base_price','$gst_per')");
		//////////////////////////////////
		$co=mysqli_connect("localhost","root","","medwealth") or die('Database Connection Error');
		
		 $query11="select * from manage_kyc where User_email='$email' and status='1'";
			$res11=mysqli_query($co,$query11);
			if($row11=mysqli_fetch_array($res11))
			{
			     $t_amount=$row11['total_amount'];
			    //echo $base_price;
			    $less_amount=$t_amount-$base_price;
			      $r="update manage_kyc set total_amount='$less_amount' where User_email='$email' and status='1'";
			    $u_query111=mysqli_query($co,"update manage_kyc set total_amount='$less_amount' where User_email='$email' and status='1'");
			   
			    
			}
		/////////////////////////////////
	}
		$id_for_p[]= mysqli_insert_id($conn); 
		
	//qty
    $sqt="update products set quantitys=quantitys-'$Quantity' where ProductID='$pid'";
	mysqli_query($conn,$sqt);	
}
 $_SESSION['id']=implode(',',$id_for_p);

  $clr="delete from cart where  SystemID='$cur'";
  mysqli_query($conn,$clr);

header("location:thankyou.php");

}
?>