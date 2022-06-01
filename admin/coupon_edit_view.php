<?php 


$d=$_POST['id'];
include('connection.php');
$res=mysqli_query($conn,"select * from coupon_code_tb where id='$d'");
if($row=mysqli_fetch_array($res))
{
	echo "
	     <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Coupon Code</label>
              <input type='text' name='coupon_code' class='form-control' value='$row[coupon_code]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Coupon Name</label>
              <input type='text' name='coupon_name' class='form-control' value='$row[coupon_name]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Discount</label>
              <input type='text' name='dis_per' class='form-control' value='$row[dis_per]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>No of time a user use</label>
              <input type='text' name='no_of_time' class='form-control' value='$row[no_of_time]'>
              </div>
              </div>
			 
			   <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Date</label>
              <input type='date' name='exp_date' class='form-control' value='$row[exp_date]'>
              </div>
              </div>
     	
	
	";
	
	
	
}
	   
		 
	   
?>