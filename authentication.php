<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com!  - Login</title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
    </head>
<style>
.ss{width:96%!important;}

.login-register-wrapper .login-form-container{
	box-shadow: 0 0 6px rgba(79, 72, 72, 0.95);
}
.login-register-wrapper .login-form-container.login-register-form form input {
	border: 1px solid #b9b2b2;
}
</style>
    <body class="home-3">
      

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
            <?php include("header.php");?>
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area"style="background-image:url('assets/abg.webp')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading" style="color:white!important;">Login / Register Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index" style="color:white!important;">Home</a></li>
                                    <li style="color:white!important;">Login / Register</li>
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
                                        <h4>login</h4>
                                    </a>
                                    <a data-toggle="tab" href="#lg2">
                                        <h4>register</h4>
                                    </a>
                                </div>
						<?php if(isset($_REQUEST['rmsg'])){
							if($_REQUEST['rmsg']==0){
								echo"<p style='color:red'>You Are Successfully Registerd With Us</p>";
							}
							if($_REQUEST['rmsg']==1){
								echo"<p style='color:red'>You Are Already Registerd With Us</p>";
							}
							if($_REQUEST['rmsg']==2){
								echo"<p style='color:red'>Password And Confirm Password Does Not Matched.</p>";
							} 
						 } ?>
					<?php if(isset($_REQUEST['msg']))
										{
											if($_REQUEST['msg']==4)
											{
												echo" <p style='color:red'>Please Enter Correct Email Or Password.</p>";
											}
											if($_REQUEST['msg']==3){
													echo"<p style='color:red'>Your Account Is Suspended.Please Contact Customer Care.</p>";
												}
											
										} ?>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
										  <center><img  class="rounded-circle cir" src="admin/images/THE CHAIR WALA LOGO.png" alt="image" width="180" height="120"></center>
                                            <br>
											<div class="login-register-form">
                                                <form method="post" action="log_code.php">
                                                    <input type="email" class="ss" name="email"  placeholder="Enter Email" required />
                                                    <input type="password" class="pass ss" name="password"  placeholder="Enter Password" required /><i class="fa fa-eye" style="margin-left:-20px;"onclick='shows()'></i>
                                                    <div class="button-box">
                             
                           <div class="login-toggle-btn">
                                                            <input type="checkbox"  />
                                                            <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                            <a href="forgot_password.php">Forgot Password?</a>
                                                        </div>
                                                        <button style="background-color:#254470;" type="submit"><span style="color:white;">Login</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="lg2" class="tab-pane">
                                        <div class="login-form-container">
										  <center><img class="rounded-circle cir" src="assets/images/logo/logos1.png" alt="image" width="150" height="80"  ></center>
                                            <br>
											<div class="login-register-form">
                                                <form  method="post" action="register_code.php?val=2">
													<input type='text' class="ss" name="name" placeholder="Enter Name" required />
                                                    <input type="email" class="ss" name="email" placeholder="Enter Email" required />
                                                    <input type="password" class="pass ss" name="password" placeholder="Enter Password" required /><i class="fa fa-eye" style="margin-left:-20px;" onclick='shows()'></i>
                                                    <input type="password" class=" cpass ss" name="cpassword" placeholder="Confirm Password" required /><i class="fa fa-eye" style="margin-left:-20px;" onclick='cshows()'></i>
                                                    <input type="tel" class="ss" name="phone" placeholder="Enter Mobile No" pattern="[0-9]{10}" required />
                                                    <div class="button-box">
                                                        <button style="background-color:#8ae7f0;" type="submit"><span>Register</span></button>
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
function shows(){
	 var a=$('.pass').attr('type');
	 if(a=='text'){
	   $('.pass').attr('type','password');
	 }else{
		 $('.pass').attr('type','text');
	 }
   }
  function cshows(){
	 var a=$('.cpass').attr('type');
	 if(a=='text'){
	   $('.cpass').attr('type','password');
	 }else{
		 $('.cpass').attr('type','text');
	 }
   }
</script>

    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
</html>
