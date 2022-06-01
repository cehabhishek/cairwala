<?php 


$d=$_POST['id'];
include('connection.php');
$res=mysqli_query($conn,"select * from coupon where coupon_id='$d'");
if($row=mysqli_fetch_array($res))
{
	echo "
	     <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Coupon Code</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[coupon_name]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Coupon Title</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[coupon_title]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Discount</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[coupon_discount]'>
              </div>
              </div>
			  <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Discount Amount</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[coupon_amount]'>
              </div>
              </div>
			   <div class='col-md-6'>
              <div class='form-group'>
              <label for='name'>Date</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[coupon_date]'>
              </div>
              </div>
     	
	
	";
	
	
	
}
	   
		 
	   
?>