<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com - Forgot Password</title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
    </head>
<style>
.ss{width:96%!important;}

.login-register-wrapper .login-form-container{
	box-shadow: 0 0 6px rgba(79, 72, 72, 0.95);
}
.login-register-wrapper .login-form-container .login-register-form form input {
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
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Forgot Password</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Forgot Password</li>
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
                                        <h4>Forgot Password</h4>
                                    </a>
                                   
                                </div>
						<?php if(isset($_REQUEST['msg'])){if($_REQUEST['msg']==4){echo" <p style='color:red'>Please Enter Correct Email Id.</p>";}
							   if($_REQUEST['msg']==5){echo" <p style='color:red'>Internal Server Error .Please Try Again After Some Time.</p>";}
							    if($_REQUEST['msg']==6){echo" <p style='color:Green'>A Reset Link Sent To Your Email Address.Please Use The Link For Reset Your Password.</p>";}
							   } ?>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
                                                <form method="post" action="forgot_password_code.php">
													<p>Please,Enter Your Email Id Which Is Registered With Us.</p>
                                                    <input type="email" class="ss" name="email" placeholder="Enter Email" required />
                                                    <div class="button-box"> 
														 <div class="login-toggle-btn">
                                                          <button type="submit"><span>Submit</span></button>
                                                                                                 
														   <a class="btn btn-light" href="authentication.php"><span> Login</span> </a>
                                                          </div>
                                                         </div>
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
========================================== -->

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
