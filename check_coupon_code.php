<?php
ob_start(); 
session_start();
#echo"<pre>";print_r($_SESSION);exit;
$user_email=$_SESSION['uemail'];
$user_sys_id=$_SESSION['SystemID'];
include('db.php');

$cd=$_REQUEST['coupon_code'];

$sql="select * from coupon_code_tb where coupon_code='$cd'";
$res=mysqli_query($conn,$sql);

 if(mysqli_num_rows($res)>0){
     while($row=mysqli_fetch_array($res)){
		    $discount_per=$row['dis_per'];
		    $coupon_code=$row['coupon_code'];
		    $num_time=$row['no_of_time'];
		  if(strtotime($row['exp_date'])>= strtotime(date('Y-m-d'))){
			   //echo json_encode(array("status"=>true,"message"=>"Coupon")); 
			   $sql1="select * from orders where Email='$user_email' and coupon_code='$cd' order by OrderID DESC limit 1";
			   $res1=mysqli_query($conn,$sql1);
			   if(mysqli_num_rows($res1)>0){
				      while($row=mysqli_fetch_array($res1)){
						if($row['no_of_time'] < $num_time){
							$new_no_time=$row['no_of_time']+1;
							 $sq131="update cart set coupon_code='$coupon_code',dis_per='$discount_per',no_of_time='$new_no_time' where SystemID='$user_sys_id'";
								$res31=mysqli_query($conn,$sq131);
								if($res31){
									//store coupon code and discount in session for futher opration & chk and update where we are addind and updating cart.
									echo json_encode(array("status"=>true,'discount_per'=>$discount_per,"message"=>"Coupon Applied Successfully")); 
								}else{
									echo json_encode(array("status"=>false,"message"=>"system error")); 
								}
							
						}else{
							 echo json_encode(array("status"=>false,"message"=>"Applided coupon exceeded the given limit ")); 
						}
					  }
			   }else{
				    $sq13="update cart set coupon_code='$coupon_code',dis_per='$discount_per',no_of_time='1' where SystemID='$user_sys_id'";
					$res3=mysqli_query($conn,$sq13);
					if($res3){  
					//store coupon code and discount in session for futher opration & chk and update where we are addind and updating cart.
						echo json_encode(array("status"=>true,'discount_per'=>$discount_per,"message"=>"Coupon Applied Successfully")); 
					}else{
						echo json_encode(array("status"=>false,"message"=>"system error")); 
					}
				   
			   }
			   
		  }else{
			  echo json_encode(array("status"=>false,"message"=>"Coupon Expired")); 
		  }
	 }
 }
 else{
  echo json_encode(array("status"=>false,"message"=>"Invalid Coupon Code"));
 }







?>