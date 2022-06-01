<?php 
include('admin/ship.php');
include('admin/connection.php');
$order_id=$_REQUEST['order_id'];


$auth_data=auth();
$token=$auth_data['token'];
if(array_key_exists("token",$auth_data)){
	
     $data_resp=cancel($token,$order_id);
	//order cancel before pick
	if(array_key_exists("status_code",$data_resp) && $data_resp['status_code']==200){
		      $sql="update orders set cancel_order=1,order_cancel_date=NOW() where ship_rocket_order_id='$order_id'";
				$res=mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn)>0){
					echo 1;
				}else{
					echo 0;
				}
			 
		 //success
	}else{  //pick cancel
		   if(array_key_exists("status",$data_resp) && $data_resp['status']==200){
		      $sql="update orders set cancel_order=1,order_cancel_date=NOW() where ship_rocket_order_id='$order_id'";
				$res=mysqli_query($conn,$sql);
				if(mysqli_affected_rows($conn)>0){
					echo 1;
				}else{
					echo 0;
				}
			 
		 //success
	      }
		  else{
		echo 0;
		  }
	//Invaild data error
	}
}else{
	echo 0;
	//ship rocket auth error
}


?>