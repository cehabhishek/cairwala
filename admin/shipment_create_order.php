<?php 
include('ship.php');
include('connection.php');

$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
    $id=$_REQUEST['OrderID'];	
    $lenght=$_REQUEST['lenght'];	
    $width=$_REQUEST['width'];	
    $height=$_REQUEST['height'];	
    $weight=$_REQUEST['weight'];	
    $shipment_orderid='';
    $sqql="select* from orders where OrderID='$id'";	
	$res=mysqli_query($conn,$sqql);
	if(mysqli_num_rows($res)>0){
		while($row=mysqli_fetch_array($res)){
			  $shipment_orderid=$row['SystemId'];
		}
			$item_arr=array();
			$totl_item_price=0;
	     $sql="select o.*,p.Name as product_name from orders o join products p on o.ProductID = p.ProductID where SystemId='$shipment_orderid' and cancel_order=0";			
	   	 $result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){ 
				while($rows=mysqli_fetch_array($result)){
					   $cust_name= $rows['Name'];
					   $cust_email= $rows['Email'];
					   $cust_mobile= $rows['Mobile'];
					   $cust_address= $rows['Address'];
					   $cust_order_date= $rows['Date'];
					   $cust_payment_type= $rows['onlinePayment'];
					   $cust_order_delivery_chrg= $rows['delivery_charges'];
					   $totl_item_price+=$rows['TotalCharge'];
					   $item_arr[]=array(
									"name" => $rows['product_name'],
									"sku" => chr(rand(65,85)).$rows['ProductID'],
									"units" => $rows['Quantity'], 	
									"selling_price" => $rows['TotalCharge'],
									"discount" => "",
									"tax" => $rows['gst_percent'] ,
									"hsn" => "" ,
					   ); 	
					 }
                     $cus_address=explode(' * ',$cust_address);   
					
                     $cus_addresses= $cus_address[0];
                     $cus_city= $cus_address[1];
                     $cus_state=$cus_address[2];
                     $cus_pincode=$cus_address[3];
                     $cus_country='India';
					 $pay_type='';
                     if($cust_payment_type=='not paid'){
						 $pay_type='COD';
					 }else{
						$pay_type='Prepaid'; 
					 }                            

					  
					 $data=http_build_query(array("order_id" => "$shipment_orderid",
									"order_date" => "$cust_order_date",
									"pickup_location" => "Primary",
									"channel_id" => "",
									"comment" => "Reseller: Mimansha nature care",
									"billing_customer_name" => "$cust_name",
									"billing_last_name" => "",
									"billing_address" => "$cus_addresses",
									"billing_address_2" => "",
									"billing_city" => "$cus_city",
									"billing_pincode" => "$cus_pincode",
									"billing_state" => "$cus_state",
									"billing_country" => "$cus_country",
									"billing_email" => "$cust_email",
									"billing_phone" => "$cust_mobile",
									"shipping_is_billing" => 1,
									"shipping_customer_name" => "",
									"shipping_last_name" => "",
									"shipping_address" => "",
									"shipping_address_2" => "",
									"shipping_city" => "",
									"shipping_pincode" => "",
									"shipping_country" => "",
									"shipping_state" => "",
									"shipping_email" => "",
									"shipping_phone" => "",
									"order_items" =>$item_arr,
									"payment_method" => "$pay_type",
									"shipping_charges" => $cust_order_delivery_chrg,
									"giftwrap_charges" => 0,
									"transaction_charges" => 0,
									"total_discount" => 0,
									"sub_total" => $totl_item_price,
									"length" => $lenght,
									"breadth" => $width,
									"height" => $height,
									"weight" => $weight,
									));
									
						 $order_data=order_place($token,$data);			
						 if($order_data['status_code']==1){
							 $ship_rocket_order_id=$order_data['order_id'];
							 $shipment_id=$order_data['shipment_id'];
							 
							$sqls="update orders set ship_rocket_order_id='$ship_rocket_order_id',shipment_id='$shipment_id' where SystemId='$shipment_orderid' and cancel_order=0"; 
							$res=mysqli_query($conn,$sqls);
															 
						      header("location:processed_order.php?msg=93");
								//success occur successfully place  order for shiping   
								 // echo"<pre>";print_r($order_data);		
							
							
						 }else{
							$err= $order_data['message'];
							header("location:processed_order.php?msg=91&error=$err");
						//data is not formatted does not exits  
						 }
					 
				}else{
					header("location:processed_order.php?msg=90");
						//orderid (sys)does not exits 
					}
	}else{
		header("location:processed_order.php?msg=89");
	//orderid does not exits 
	}
}else{
	header("location:processed_order.php?msg=88");
	//ship rocket auth error
}




?>