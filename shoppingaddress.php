<?php include("session_random.php");?>
<?php  //session_start();

 $eml=$_SESSION['uemail'];

?>

<?php
	error_reporting(0);
	$msg=$_REQUEST['msg'];

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com -Place Order</title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
    </head>
<style>
.ss{width:100%!important;
   padding: 10px;
	border-radius: 15px;
	color: black;
	background-color: #d1d0d6;
}
.modal{
	top:39px !important;
	z-index:10000000000!important;
}
#shipping{
	color:#254477;
}

</style>
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
                                <h1 class="breadcrumb-hrading">User Profile</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>User Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- login area start -->
            <div class="container account-container custom-account-container">
			
			<div class="container">
				<div class="row">
				<div class="col-2"></div>
				
					<div class="col-8 mt-4 mb-4" style="border:2px solid #254470;">						
						<div class="tab-pane fade active show" id="shipping" role="tabpanel">
							<div class="address account-content mt-0 pt-2">
								<h4 class="title mb-4 mt-4"><center>Shipping Address</center></h4>
								<?php 
									include('db.php');
									$query="select * from register where email='$eml'";
									$res=mysqli_query($conn,$query);
									if($row=mysqli_fetch_array($res))
									{
								
								?>
								<form class="mb-2" action="shipping_add_code.php?id=<?php echo $row['id'];?>" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>First name <span class="required">*</span></label>
												<input type="text" class="form-control" required="" placeholder="First Name" name="fname" value="<?php echo $row['name'];?>">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Moblie Number </label>
										<input type="number" class="form-control" placeholder="Moblie Number" name="mobile" value="<?php echo $row['mobile'];?>">
									</div>
									<div class="form-group">
										<label>Street address <span class="required">*</span></label>
										<input type="text" class="form-control" placeholder="House number and street name" required="" name="address" value="<?php echo $row['address'];?>">
										<input type="text" class="form-control mt-4" placeholder="Apartment, suite, unit, etc. (optional)" required=""  name="landmark" value="<?php echo $row['landmark'];?>">
									</div>

									<div class="form-group">
										<label>Town / City <span class="required">*</span></label>
										<input type="text" class="form-control" required="" placeholder="Town / City"  name="city" value="<?php echo $row['city'];?>">
									</div>

									<div class="form-group">
										<label>State / Country <span class="required">*</span></label>
										<input type="text" class="form-control" required="" placeholder="State / Country"  name="state" value="<?php echo $row['state'];?>">
									</div>

									<div class="form-group">
										<label>Postcode / ZIP <span class="required">*</span></label>
										<input type="text" class="form-control" required="" placeholder="Postcode / ZIP"  name="zip" value="<?php echo $row['zip'];?>">
									</div>

									<div class="form-group">
										
											<center><button type="submit" class="btn btn-dark mb-4 mt-4" style="background-color:#254470;">
												Save Address
											</button></center>
										
									</div>
								</form>
								
									<?php } ?>
							</div>
						</div><!-- End .tab-pane -->
					</div><!-- End .tab-content -->
					<div class="col-2"></div>
				</div><!-- End .row -->
			</div>
			</div>
			
			<!-- Modal -->
		<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update User Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			   <form method='post' action="update_user_profile.php">
				  <div class="modal-body">
				   
					<div id='contents' class='col-md-12'></div>
					
				  </div>
				  <div class="modal-footer" >
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Update changes</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
			
            <!-- login area end -->
            <!-- Footer Area start -->
             <?php include("footer.php");?>
            <!--  Footer Area End -->
        </div>

        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->

        <!--====== Vendors js ======-->
      <?php include("footer_link.php");?>
	  
 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Updated Profile Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Profile Update Unsuccessful",'Failed due to server error or you may not updated any data.','warning');
</script>
<?php } ?>
<script>
			  function updates(){
				var datas =  $('#id_modal').val();
				  $.post('user_profile_post_update.php',{id:datas},function(data, status){

              $('#contents').html(data);
   
  });
				  
				  $('#exampleModal6').modal('show');
			  }
			</script>

    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
</html>
