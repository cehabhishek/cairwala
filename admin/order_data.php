<?php
$OrderID=$_REQUEST['id'];
require('connection.php');
$sql=mysqli_query($conn,"select * from orders where OrderID=$OrderID");
$row=mysqli_fetch_array($sql,MYSQLI_BOTH);
$pid=$row['ProductID'];
$sql1=mysqli_query($conn,"select * from products where ProductID=$pid");
$row1=mysqli_fetch_array($sql1,MYSQLI_BOTH);


		
			echo"<h3><strong>Product Detail</strong></h3>
         			<div class='col-md-12'>
                 <div class='form-group'>
			          <a href='#'><img class='' src='product_image/$row1[Image1]' height='100px' width='100px'></a><br><br>
			      </div>
			       </div>
			        <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Order Name :</label>
					     <span><strong> $row1[Name]</strong></span>
					   </div>
			       </div>
				   
				   <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Price :</label>
					     <span><strong> $row1[Price]</strong></span>
					   </div>
			       </div>
				   
				   
			      <h3><strong>Customer Detail</strong></h3>
			      <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Customer Name : </label>
					     <span><strong>$row[Name]</strong></span>
					    
					   </div>
			       </div>
				   <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Customer Email : </label>
					     <span><strong>$row[Email]</strong></span>
					   </div>
			       </div>
				     <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Customer Number :</label>
					     <span><strong>$row[Mobile]</strong></span>
					   </div>
			       </div>
			       <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Customer Address :</label>
					     <span><strong>$row[Address]</strong></span>
					   </div>
			       </div>
			       <div class='col-md-12'>
					  <div class='form-group'>
					  <label for='name'>Total Charges:</label>
					     <span><strong>$row[TotalCharge]</strong></span>
					   </div>
			       </div>"
						
     ?> 
	 
	 