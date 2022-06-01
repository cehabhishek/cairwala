<?php
error_reporting(0);
session_start();
ob_start();
if(isset($_SESSION['admin_login']) &&  $_SESSION['admin_login']!=NULL)
{
	header('location:dashboard.php');
}

$error="";
$msg=$_REQUEST['msg'];
if($msg==1)
{
	$error="Invalid Login Details!";
}
if($msg==2)
{
	$error="Reset Password is successfully!";
}
if($msg==3)
{
	$error="Reset Password is not successfully!";
}
if($msg==6)
{
	$error="Please Verify Your Email Id To Login!";
}	
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from uxliner.com/niche/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 04:38:02 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>The Chairwala.com</title>
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
    <h4 class="login-box-msg">
        <img src="images/chairwala1.jpg" style="width:200px;height:115px;" alt=""><br/>
        <b>Sign In Admin</b></h4>
    
    <form action="vendor_login_code.php" method="POST">
          <div class="form-group has-feedback">
            <input type="email" class="form-control sty1" name="email" placeholder="User Id">
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control sty1" name="password" placeholder="Password">
      </div>
      <div>
        
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In </button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
      Facebook</a> <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
      Google+</a> </div>-->
    <!-- /.social-auth-links -->
    
    
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






	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Password Changed Successfully",'','Success');
</script>
<?php } ?>

<!-- Mirrored from bootstraptemplatedesign.com/demo-application/boothelp/form-blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 06:17:28 GMT -->
</html>
