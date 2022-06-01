<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com- Reset Password </title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
    </head>
<style>
.ss{width:96%!important;}
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
                                <h1 class="breadcrumb-hrading">Reset Password</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Reset Password</li>
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
                                        <h4 style="color:#254470;">Reset Password</h4>
                                    </a>
                                    
                                </div>
						
					
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
											<?php if(isset($_REQUEST['link'])){
												$fg=base64_decode($_REQUEST['link']);
												echo $fg;
												
											   $sqls="select * from register where forgot_string='$fg' and forgot_date=curdate()";
											 $resu=mysqli_query($conn,$sqls);
											 if(mysqli_num_rows($resu)>0){
												 
											 
										   
										   ?>
											 <h2 class="bordered" style="color:#254470;">Reset Password</h2>
												<p style="color:#254470;">Please,Enter New Password.</p>
											 
												 <p id='pmsg' style='color:red'></p>
                                                <form id='formid' method="post" action="reset_password_code.php">
                                                    <label style="color:#254470;">New Password</label>
													<input type="Password" style='width:96%' class=" pass" name="password" id='np'required><i class="fa fa-eye" onclick='shows()'></i>
													<label style="color:#254470;">Confirm Password</label>
													<input type="Password" style='width:96%' class="cpass" name="cpassword" id='cnp'required><i class="fa fa-eye" onclick='cshows()'></i>
													<input type="hidden"  name="fg" value='<?php echo $fg ?>' required>         
												   <div class="">
                                                        
                                                        <button type="submit"  onclick='chk()'><span>Reset</span></button>
                                                    </div>
                                                </form>
												<?php } else{?>
			
												<center><p style="color:#254470;">Your Link Is Expired.</p></center>
												<?php }?>
			
										<?php } else { ?>
										       <div class="col-md-6">
													<section class="">
														<h2 class="" style="color:#254470;">Reset Password</h2>
														<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1010'){ ?>
														<p style="color:#254470;">Your Password Change Successfully.</p>
														<?php } ?>
														<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']==10){ ?>
														<p style="color:#254470;">Internal Server Error . Please Try After Some Time.</p>
														
														<?php } ?>
													</section><!-- /.sign-in -->
												</div>
										<?php } ?>
										 
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
