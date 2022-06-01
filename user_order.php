<?php include("session_random.php");?>
<?php // session_start();

 $eml=$_SESSION['uemail'];



?>	
<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com! - User Order</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
	   <style>
	   .nice-select{
		   width:100%!important;
	   }
	   </style>
	   <style>
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(assets/loader.gif) no-repeat center center;
  z-index: 10000;
  
}
@media only screen and (max-width: 600px) {
  #about-areaa{
    display:block!important;
  }
  #about{
	  display:none;
  }
}
</style>
    </head>
    <body class="home-3">
    

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
              <?php include("header.php");?>
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Your All Orders Details.</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>User Order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
	 



            <!-- About Area Start -->
            <div class="cart-main-area mtb-60px" id="about">
                <div class="container">
                    <h3 class="cart-page-title">Your cart items</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           
                                <div class="table-content table-responsive cart-table-content">
                                    <table>
                                         <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th></th>
                                                <th>Product Details</th>
                                                <th></th>
                                                <th>Order Status</th>
                                               
                                            </tr>
											</thead>
                                        <tbody>
								<?php
								 $sql="select o.* ,p.Name,p.Image1 from orders o join  products p on o.ProductID=p.ProductID where Email='$eml' order by OrderID DESC";
								  $query1=mysqli_query($conn,$sql);
								   while($row=mysqli_fetch_array($query1))
								  {
									  
								?>
											<tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img  height='140px' width='240px' src="admin/product_image/<?php echo $row['Image1'];?>" alt="" /></a>
                                                </td>
												 <td class="product-name" ></td>
                                                <td class="product-name">
												<p>Product Name - <a href="single_product.php?product=<?php echo base64_encode($row['ProductID']);?>"><?php echo $row['Name'];?></a></p>
												 <p>Order Id  - <?php echo PREFIX.$row['OrderID'];?></p>
												 <p>Quantity - <?php echo $row['Quantity'];?></p>                               
												 <p>Price - <?php echo $row['TotalCharge'];?></p>  
												 </td>
												 <td class="product-name" ></td>
                                                <td class="product-price-cart">
												 <p>Ordered Date - <?php echo date('d/m/Y' ,strtotime($row['Date']));?></p>
												<p>Order Status - <?php  $aa=$row['DeliveryStatus']; 
															$bb=$row['Shiped']; 
															$cc=$row['cancel_order'];
															$dd=$row['buystatus'];
															if($dd=='Rejected'){
															   echo "Rejected".'<br>';
															     $query4=mysqli_query($conn,"select * from orderreject where OrderID='$row[OrderID]'");
																if($row5=mysqli_fetch_array($query4))
																	{
																		echo "Reason:".$row5['reason'];
																	}
															}else{
															
											              if($aa=='true' && $bb=='true' && $cc==0)
														  {
															  echo "Delivered";
														  }
											              else if($aa=='false' && $bb=='' && $cc==0)
														  {
															  echo "Processing";
														  }
														  else if($bb=='true' && $cc==0)
														  {
															  echo "Order Shipped";
															  
															  $sq="select t.TrackingID,t.Link from trackingorder t join  orders o on t.OrderID=o.OrderID where o.OrderID='$row[OrderID]' order by t.id Desc limit 1 ";
															  $res=mysqli_query($conn,$sq);
															  if(mysqli_num_rows($res)>0){
															  while($rows=mysqli_fetch_array($res)){
																  $tklink=$rows['Link'];
																  $tid=$rows['TrackingID'];
																 echo "<p style='color:orange'>Tracking Id:$tid</p>"; 
																 echo "<a  href='$tklink' target='_blank' >Tracking Link</a>"; 
															  }
														  }
															  
														  }
														  else if($cc==1)
														  {
															   echo "Cancelled";

														  }
													}  
											  ?></p>
											  
								<p>
								  <?php  $aa=$row['DeliveryStatus']; 
										 $bb=$row['Shiped']; 
										 $cc=$row['cancel_order'];
										 $dd=$row['buystatus'];
										 $d_date=$row['delivery_date'];
										 if($dd!='Rejected')
										    {
										 if($cc==0){
										  if($aa=='true' && $bb=='true' && $cc==0)
										  { echo $row['ship_rocket_order_id'];
											  echo "<p><span><a class='btn btn-success btn-sm' href='#' onclick='updates($row[ProductID])'>Write Review</a></span></p>";
											 
											 $orderid=base64_encode($row['OrderID']);
											 echo "<p style='margin-top:5px'><span><a class=' btn btn-success btn-sm' href='invoice_generator.php?id=$orderid'>Download Invoice</a></span></p>";
											 $d_date;
											 $date = date('Y/m/d', time());
											echo date('m');
											echo date('y');
											echo date('d');
											  //echo $time=strtotime($d_date);
											  //echo $day=date("D",$time);
											//echo $month=date("F",$time);
											//echo $year=date("Y",$time);
											 
											 
											 echo "<p style='margin-top:5px'><span><a class=' btn btn-success btn-sm' href='return_order.php?id=$orderid'>Return Order</a></span></p>";
											  
											  
										    }else{
												//echo "static cancel";
												if(empty($row['ship_rocket_order_id']) && empty($row['shipment_id'])){
											  echo "<a class='btn btn-danger btn-sm'  href='#' onclick='cancel_my_order($row[OrderID])'>Cancel Order</a>";
												}
												//api cancel
												 if (!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id']) && empty($row['awb_code']) ){
												$ship_ord_id=$row['ship_rocket_order_id'];
                                                 echo" <a href='javascript:void(0);' style='padding: 10px 25px!important;margin-top: 5px;' class='btn btn-circle btn-danger' onclick='cancel_shipment($ship_ord_id)'>Cancel</a>";
												
												}
										  }
										 }else{
											   echo "<a class='text-danger' href='#' '>Order Cancel Date - ".date('d/m/Y h:i:s',strtotime($row['order_cancel_date']))."</a><br>";
											  echo "<a class='text-danger' href='#' '>Order Cancelled</a>";
										 }
										 											}
								 ?>
					

								</p>
								</td>
                                              
                                            </tr>
											
										<?php
                                   #  echo'<pre>',print_r($row);
								  # echo "<hr>";
								 } ?>	
                                            
                                        </tbody>
                                    </table>
                                </div>
                               
                           
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Area End -->
            <!-- About2 Area start -->
			<section class="about-area" style="display:none;" id="about-areaa">
				<center><h2 style="color:#254470;" class="mt-4">Your Cart Item</h2></center>
				<div class="row">
								<?php
								 $sqll="select o.* ,p.Name,p.Image1 from orders o join  products p on o.ProductID=p.ProductID where Email='$eml' order by OrderID DESC";
								  $query11=mysqli_query($conn,$sqll);
								   while($row11=mysqli_fetch_array($query11))
								  {
									  
								?>
											
											<div class="col-xl-3 col-md-4 col-sm-6 border border-primary">
                                                
                                                    <div class="img-block">
                                                        <center>
														
															<img class="first-img" src="admin/product_image/<?php echo $row11['Image1'];?>" style="height:300px;width:300px" alt="" />
														   
														</a>
													   </center>
                                                     
                                                    </div>
                                                    <div class="product-decs">
                                                        
                                                        <center><p><a class='product-link' href="single_product.php?product=<?php echo base64_encode($row11['ProductID']);?>"><?php echo $row11['Name'];?></a></p>
                                                        <p>Order Id  - <?php echo PREFIX.$row11['OrderID'];?></p>
														<p>Quantity - <?php echo $row11['Quantity'];?></p>                               
														<p>Price - <?php echo $row11['TotalCharge'];?></p>  
														<div class="pricing-meta">
                                                            <p>Ordered Date - <?php echo date('d/m/Y' ,strtotime($row11['Date']));?></p>
												<p>Order Status - <?php  $aa=$row11['DeliveryStatus']; 
															$bb=$row11['Shiped']; 
															$cc=$row11['cancel_order'];
															$dd=$row11['buystatus'];
															if($dd=='Rejected'){
															   echo "Rejected".'<br>';
															     $query44=mysqli_query($conn,"select * from orderreject where OrderID='$row[OrderID]'");
																if($row55=mysqli_fetch_array($query44))
																	{
																		echo "Reason:".$row55['reason'];
																	}
															}else{
															
											              if($aa=='true' && $bb=='true' && $cc==0)
														  {
															  echo "Delivered";
														  }
											              else if($aa=='false' && $bb=='' && $cc==0)
														  {
															  echo "Processing";
														  }
														  else if($bb=='true' && $cc==0)
														  {
															  echo "Order Shipped";
															  
															  $sq="select t.TrackingID,t.Link from trackingorder t join  orders o on t.OrderID=o.OrderID where o.OrderID='$row[OrderID]' order by t.id Desc limit 1 ";
															  $ress=mysqli_query($conn,$sq);
															  if(mysqli_num_rows($ress)>0){
															  while($rowss=mysqli_fetch_array($ress)){
																  $tklink=$rowss['Link'];
																  $tid=$rowss['TrackingID'];
																 echo "<p style='color:orange'>Tracking Id:$tid</p>"; 
																 echo "<a  href='$tklink' target='_blank' >Tracking Link</a>"; 
															  }
														  }
															  
														  }
														  else if($cc==1)
														  {
															   echo "Cancelled";

														  }
													}  
											  ?></p>
														<p>
								  <?php  $aa=$row11['DeliveryStatus']; 
										 $bb=$row11['Shiped']; 
										 $cc=$row11['cancel_order'];
										 $dd=$row11['buystatus'];
										 if($dd!='Rejected')
										    {
										 if($cc==0){
										  if($aa=='true' && $bb=='true' && $cc==0)
										  { echo $row11['ship_rocket_order_id'];
											  echo "<p><span><a class='btn btn-success btn-sm' href='#' onclick='updates($row[ProductID])'>Write Review</a></span></p>";
											 
											 $orderid=base64_encode($row11['OrderID']);
											 echo "<p style='margin-top:5px'><span><a class=' btn btn-success btn-sm' href='invoice_generator.php?id=$orderid'>Download Invoice</a></span></p>";
											  
											  
										    }else{
												//echo "static cancel";
												if(empty($row11['ship_rocket_order_id']) && empty($row11['shipment_id'])){
											  echo "<a class='btn btn-danger btn-sm'  href='#' onclick='cancel_my_order($row[OrderID])'>Cancel Order</a>";
												}
												//api cancel
												 if (!empty($row11['ship_rocket_order_id']) && !empty($row11['shipment_id']) && empty($row11['awb_code']) ){
												$ship_ord_id=$row11['ship_rocket_order_id'];
                                                 echo" <a href='javascript:void(0);' style='padding: 10px 25px!important;margin-top: 5px;' class='btn btn-circle btn-danger' onclick='cancel_shipment($ship_ord_id)'>Cancel</a>";
												
												}
										  }
										 }else{
											   echo "<a class='text-danger' href='#' '>Order Cancel Date - ".date('d/m/Y h:i:s',strtotime($row11['order_cancel_date']))."</a><br>";
											  echo "<a class='text-danger' href='#' '>Order Cancelled</a>";
										 }
											}
								 ?>
								</p>	
									</center>						
                                                        </div>
														
														
                                                
                                            </div>
												<?php } ?> 
                                            
                             </div>
			
			</section>
			
            <!-- About2 Area End -->
			
<div class="modal fade" id="exampleModal1" style="top:50px!important;z-index:1000000!important;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Review For The Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   <form method='post' action="add_review.php">
		  <div class="modal-body">
		   <div class="add-review row">
				<div class="col-sm-12 col-xs-12">
					<div class="new-review-form">
						<h2>Add review</h2>
						
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<label>name*</label>
									<input class="form-control" name='c_name' value="<?php echo $_SESSION['uname']; ?>" required >
									<input type='hidden' id='pid' name='pid' value='' >
									
								</div>
								<div class="col-xs-12 col-sm-6">
									<label>email*</label>
									<input class="form-control" name='c_email' value="<?php echo $_SESSION['uemail']; ?>" required>
								</div>
							</div><!-- /.field-row -->
                          <div class="row">
							<div class="col-xs-12 col-sm-6">
								<label>your rating</label>
								  <select name="score" class="form-control" style="width:100%;">
									 <option value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5" selected>5</option>
									</select>
								
							</div><!-- /.field-row -->

							<div class="col-xs-12 col-sm-6">
								<label>your review</label>
								<textarea rows="8" class="form-control" name='comment' required></textarea>
							</div><!-- /.field-row -->
                           </div>
							
						<!-- /.contact-form -->
					</div><!-- /.new-review-form -->
				</div><!-- /.col -->
            </div>
		   </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Add</button>
		  </div>
	  </form>
    </div>
  </div>
</div>




<div class="modal fade" id="exampleModal2"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Cancel Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   <form method='post' action="order_cancel_code.php">
		  <div class="modal-body">
		   <div class="add-review row">
				<div class="col-sm-12 col-xs-12">
					<div class="new-review-form">
						<h2 style="color:#254470;">Are You Sure To Cancel The Order?</h2>
						
							<div class="row field-row">
								<div class="col-xs-12 col-sm-6">
									<input type='hidden' id='oid' name='oid' value='' >
									
								</div>
								
							</div><!-- /.field-row -->

					</div><!-- /.new-review-form -->
				</div><!-- /.col -->
            </div>
		   </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

			
		

            <!-- Footer Area start -->
            <?php include("footer.php");?>
			<div id="loader"></div>	
            <!--  Footer Area End -->
        </div>

        <!-- Modal -->
          <?php include("modal.php");?>
        <!-- Modal end -->

        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->

        <!--====== Vendors js ======-->
      <?php include("footer_link.php");?>
	  
<script>
		function updates(pid){
		var datas =  $('#pid').val(pid);
		
		  
		  $('#exampleModal1').modal('show');
		}
		
		function cancel_my_order(oid){
			var datas =  $('#oid').val(oid);
			 $('#exampleModal2').modal('show');
		}
</script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    	 <script>
	function success(){
		
		swal("Order Cancelled Successfully !", "You clicked the button!", "success")
	}
	function fail(){
		
		swal("Internal Server Error ,Please Try After Some Time !", "You clicked the button!", "success")
	}
</script>
<script>

function cancel_shipment(datas){
		swal({
  title: "Are you sure to cancel the all order together,because all order is booked for shiping.",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
	  $('#loader').show();
	  $.post('shipment_order_user_cancel.php',{order_id:datas},function(data, status){
		        if(data==1){   $('#loader').hide();
				   swal("Order cancelled successfully", {
			         icon: "success",
				});
				 setTimeout(function() {
					  window.location.reload();
				  }, 3000);
				}
				else{  $('#loader').hide();
					  swal("Cancelling order unsuccessful!Please try after some time", {
			         icon: "warning",
				 });
				}
				
	});
	 
   
  } else {
    $('#loader').hide();
  }
});
}



</script>


<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']='010'){?>
<script>success();</script>
<?php } if(isset($_REQUEST['msg']) && $_REQUEST['msg']='10'){ ?>
<script>success();</script>
<?php } ?>
	  
	  
	  
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
</html>
