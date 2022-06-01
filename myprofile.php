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
  #mob {
		display:block!important;
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
					<div class="col-3" style="display:none;" id="mob">
					</div>
						<div class="col-12 border border-primary">
						<center style="color:#254470;"><h2>Personal Profile</h2></center>
							<div class="table-responsive">
								<table class="table">
									  <tbody>
									  <?php 
							  $query1=mysqli_query($conn,"select * from register where email='$eml' limit 1");
								   while($row=mysqli_fetch_array($query1))
								  {  ?>
										<tr>
										  <th scope="row"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Name</th>
										  <td><?php echo $row['name']?></td>

										</tr>
										<tr>
										  <th scope="row"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Email</th>
										  <td><?php echo $row['email']?></td>
										  
										</tr>
										<tr>
										  <th scope="row"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;Mobile</th>
										  <td><?php echo $row['mobile']?></td>
										</tr>
										<tr>
										  <th scope="row"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;&nbsp;Billing Address</th>
										  <td><?php echo $row['address'];?>&nbsp;&nbsp;<?php echo $row['landmark'];?>&nbsp;&nbsp;<?php echo $row['city'];?>&nbsp;&nbsp;<?php echo $row['state'];?>&nbsp;&nbsp;<?php echo $row['zip'];?></td>
										</tr>
									  </tbody>

								</table>
							</div>
							<center><button type="button" class="btn btn-light mb-4" style="background-color:#254470;color:white;" onclick='updates()'>Edit</button></center>
						</div>
						<div class="col-3" style="display:none;" id="mob">
					</div>
					</div>
				</div>
			<!--------User Profile New Code End--------->
			<!-- Modal -->
		<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:#254470;">Update User Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			   <form method='post' action="update_user_profile.php">
				  <div class="modal-body">
				   <input type="text" id="id_modal" value="<?php echo $row['id'];?>" hidden>
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
											 		  <?php } ?>
			
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
				//alert(datas);
				  $.post('user_profile_post_update.php',{id:datas},function(data, status){

              $('#contents').html(data);
   
  });
				  
				  $('#exampleModal6').modal('show');
			  }
			</script>

    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
</html>
