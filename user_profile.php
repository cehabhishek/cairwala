<?php include("session_random.php");?>
<?php  //session_start();

 $eml=$_SESSION['uemail'];

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
	color:#254470;
}
@media only screen and (max-width: 600px) {
  #image {
		margin-top:20px;
		padding-left:0px!important;
  }
  #card-image{
      width:24rem!important;
  }
}
#card-image{
	border-radius: 1.25rem;
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
                                    <li><a href="index">Home</a></li>
                                    <li>User Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- login area start -->
           <!-- <div class="login-register-area mb-60px mt-53px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4>User Profile</h4>
                                    </a>
                                   
                                </div>
						  <?php 
							  $query1=mysqli_query($conn,"select * from register where email='$eml' limit 1");
								   while($row=mysqli_fetch_array($query1))
								  {  ?>
						
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
											
											
                                                
												    <span  id="shipping">Name</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['name']?>"  disabled />
                                                    <span  id="shipping">Email</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['email']?>"  disabled />
                                                   <span  id="shipping">Mobile</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['mobile']?>"  disabled />
                                                   <span  id="shipping">Address</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['address']?>"  disabled />
                                                   <span  id="shipping">Landmark</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['landmark']?>"  disabled />
                                                   <span  id="shipping">City</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['city']?>"  disabled />
                                                   <span  id="shipping">State</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['state']?>"  disabled />
                                                   <span  id="shipping">Pin Code</span>
                                                    <input type='text' class="ss"  value="<?php echo $row['zip']?>"  disabled />
                                                   <input type='hidden' id='id_modal' value="<?php echo $row['id'];?>">
                                                   
                                                  
													<div class="button-box">
                                                        <div class="login-toggle-btn">
														<br>
														<button class="btn btn-success " type="button" style="background-color:#254470;" onclick='updates()'><span>Update Profile</span></button>
                                                        </div>
                                                        
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
								  <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			--->
			
			<!--------User Profile New Code Start--------->
				<div class="container">
					<div class="row mt-5 mb-5">
						<div class="col-sm-4" id="image">
							<div class="card" style="width: 25rem;background-color:#f7f7f7;" id="card-image">
							  <img src="assets/profile-img.png" class="card-img-top" alt="..."  height="249px" style="width:80%;padding-left:50px;padding-top: 10px;">
							  <div class="card-body">
								<center><button type="button" class="btn btn-light" style="background-color:#254470;"><a href="myprofile" style="color:white;">My Profile</a></button></center>
							  </div>
							</div>
							</div>
							<div class="col-sm-4"  id="image">
							<div class="card" style="width: 25rem;background-color:#f7f7f7;"  id="card-image">
							  <img src="assets/order-img.png" class="card-img-top" alt="..." height="249px"  style="width:80%;padding-left:50px;padding-top: 10px;">
							  <div class="card-body">
								<center><button type="button" class="btn btn-light" style="background-color:#254470;"><a href="user_order" style="color:white;">My Orders</a></button></center>
							  </div>
							</div>
							</div>
							<div class="col-sm-4"  id="image">
							<div class="card" style="width: 25rem;background-color:#f7f7f7;"  id="card-image">
							  <img src="assets/shipping-img.webp" class="card-img-top" alt="..." height="249px"  style="width:80%;padding-left:50px;padding-top: 10px;">
							  <div class="card-body">
								<center><button type="button" class="btn btn-light" style="background-color:#254470;"><a href="shoppingaddress" style="color:white;">Shipping Address</a></button></center>
							  </div>
							</div>
					    </div>
					</div>
				</div>
			<!--------User Profile New Code End--------->
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
