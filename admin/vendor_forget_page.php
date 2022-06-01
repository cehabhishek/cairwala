<?php
session_start();
error_reporting(0);
$error="";
$msg=$_REQUEST['msg'];
if($msg==1)
{
	$error="Email Not Registered";
}

	
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from uxliner.com/niche/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 04:38:02 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Admin </title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="assets/dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/style.css">
<link rel="stylesheet" href="assets/dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="assets/dist/css/themify-icons/themify-icons.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Forget Password</h3>
    
    <form action="forget_code.php?val=1" method="POST">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" name="email" placeholder="Email Address">
      </div>
      <div class="form-group text-left float-label">
		<span style="color:red"><?php echo $error?></span>
									
	</div>
      <div>
        <div class="col-xs-8">
         
        </div>
		<br>
		<div>
			<button class="btn btn-primary btn-block col">Send OTP</button>
			<br>
		</div>
        <!-- /.col -->
       
		
		<div class="text-left">
			<a href="index.php" class="">Login</a>
			<a href="vendor_registration.php" class="float-right">Sign up Now!</a>
		</div>
        <!-- /.col --> 
      </div>
    </form>
	
	

    
    <div class="m-t-2">Don't have an account? <a href="pages-register.html" class="text-center">Sign Up</a></div>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="assets/dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="assets/dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="assets/dist/js/niche.js"></script>
</body>

<!-- Mirrored from uxliner.com/niche/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 04:38:02 GMT -->
</html>
	
	
	
	

			<script>
function shows(){
	 var a=$('.pass').attr('type');
	 if(a=='text'){
	   $('.pass').attr('type','password');
	   $('#aaa').html('Show');
	 }else{
		 $('.pass').attr('type','text');
		 $('#aaa').html('Hide');
	 }
   }
   
   
</script>
</body>


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/boothelp/form-blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 06:17:28 GMT -->
</html>
