<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com!  -Place Order</title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
    </head>
<style>
.ss{width:100%!important;}

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
                                <h1 class="breadcrumb-hrading">Place Order</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Place Order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- login area start -->
            <div class="login-register-area mb-60px mt-53px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4>Billing Address</h4>
                                    </a>
                                   
                                </div>
						  <?php 
							 $email=$_SESSION['uemail'];
												$sql="select * from register where email='$email' && address!=' '";
											   
											   $res=mysqli_query($conn,$sql);
						  
						  ?> 
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
											  <?php  if(mysqli_num_rows($res)>0){ ?>
												  <input type="checkbox" id="add_chk" onclick='get_address()'><b>Use My Saved Address</b>
											<?php }else{ ?>
												  <a href='user_profile' class='btn btn-danger' >Update Your Profile</a>
											<?php } ?>
											
                                                <form method="post" action="order_code.php">
                                                    <input type='text' class="ss"name="name"  value="<?php if(isset($_SESSION['uname'])){ echo $_SESSION['uname']; }?>" id='username' placeholder="Enter Name" required />
                                                   <input type="tel" class="ss" name="mobile" value="<?php if(isset($_SESSION['umobile'])) { echo $_SESSION['umobile']; }?>" id='usermobile' placeholder="Enter Mobile No" pattern="[0-9]{10}" required />
                                                   <textarea type="text" class="ss" name="address" id='useraddress' placeholder="Enter Address " rows="5" required ></textarea>
                                                    
													<br>
													 
													 <span style="color:#254470;">Cash on Delivery</span><input type="radio" id="male" name="peyment" class="rd" style=" height: 15px; margin-left: -233px;" value="Case on Delivery" checked><br>
														 <span style="color:#254470;">Pay Online</span><input type="radio" id="male" name="peyment" class="rds" value="Pay"  style=" height: 15px; margin-left: -189px;">
														
													
													<div class="button-box">
                                                        <div class="login-toggle-btn">
                                                        </div>
                                                        <button type="submit"><span>Place Order</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			 <?php 
								 
								   if(mysqli_num_rows($res)>0){
									   while($row=mysqli_fetch_array($res)){
										   ?>
										  <input type='hidden' id='address' value="<?php echo $row['address']; ?>"> 
										  <input type='hidden' id='landmark' value="<?php echo $row['landmark']; ?>"> 
										  <input type='hidden' id='city' value="<?php echo $row['city']; ?>"> 
										  <input type='hidden' id='state' value="<?php echo $row['state']; ?>"> 
										  <input type='hidden' id='zip' value="<?php echo $row['zip']; ?>"> 
										  <input type='hidden' id='mobile' value="<?php echo $row['mobile']; ?>"> 
										  <input type='hidden' id='name' value="<?php echo $row['name']; ?>"> 
								 <?php 	   }
								   }
								   
								  
							   ?>
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
<script>
 function get_address(){
	if($('input[type="checkbox"]'). prop("checked") == true){ 
	   var address=$('#address').val();
	   var landmark=$('#landmark').val();
	   var city=$('#city').val();
	   var state=$('#state').val();
	   var zip=$('#zip').val();
	   var name=$('#name').val();
	   var mobile=$('#mobile').val();
	
	var address_usr=address+',landmark - '+landmark+',City - '+city+',State - '+state+',Pincode - '+zip;
	
	$('#useraddress').val(address_usr);
	$('#username').val(name);
	$('#usermobile').val(mobile);
	
	}
	else{
	$('#useraddress').val('');
	$('#username').val('');
	$('#usermobile').val('');
	}
	 
	 
	 
	 
 }
</script>

    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
</html>
