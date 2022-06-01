<?php
session_start();
error_reporting(0);
$error="";
$msg=$_REQUEST['msg'];
if($msg==1)
{
	$error="Confirm Password is not Matched!";
}

	
?>
<!doctype html>
<html lang="en">


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/boothelp/form-blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 06:17:28 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Custome scrollbar CSS -->
	<link rel="stylesheet" href="assets/vendor/jquery-custom-scrollbar-0.5.5/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.css" type="text/css">

	<!-- framework CSS -->
	<link id="theme" rel="stylesheet" href="assets/css/style-helpdesk.css" type="text/css">


	<title>Vendor Panel</title>
</head>

<body class="fixed-header sticky-footer menuleft-open menuright-open" style="background-image:url('assets/img/nature-hd-background-4.jpg');background-size:cover;">
		<!-- main container starts -->
		<div class="main-container">
			<div class="container-fluid mb-2">
				<div class="row">
					<div class="container">
						

					</div>
				</div>
			</div>

			<!-- Begin page content -->
			<div class="container">
				<div class="row" style="padding-top:5%">
					<div class="col-sm-12 col-md-6 col-lg-4">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-5">
						<div class="card rounded-0 border-0 mb-3">
							<div class="card-header">
								<div class="row">
									<div class="col-12">
									
									<center><img src="assets/img/logo4.png"/ style="height: 148px;"></center>
									
										<center><h5 class="card-title">Reset Password</h5></center>
									</div>
								</div>
							</div>
							<div class="card-body pr-5 pl-5">
							
								<br>
								<form action="forget_code.php?val=3" method="POST">
								<div class="form-group text-left float-label">
									<input type="password" class="form-control pass" name="Password" placeholder='Enter New Password'>
									
								</div>
								<div class="form-group text-left float-label">
									<input type="password" placeholder='Enter Confirm Password' class="form-control pass" name="cpassword">
									
								</div>
								<div>
									<a  id='aaa' href='#' class='pull-right' onclick='shows()' style="margin-left:311px">Show</a>
									
								</div>
								<div class="text-left float-label">
									<span style="color:red"><?php echo $error?></span>
									
								</div>
								
							
								<div>
									<button class="btn btn-primary btn-block col">Reset Password</button>
									<br>
								</div>
								<div class="text-left">
									<a href="index.php" class="">Login</a>
									<a href="vendor_registration.php" class="float-right">Sign up Now!</a>
								</div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>

	</div>
	<!-- wrapper ends -->


	<!-- footer starts -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<i class="text-danger fa fa-heart"></i> 
					<span>DC Infotech 2020</span>
					<img src="assets/img/flag.png" alt="India">
				</div>
				<div class="col-12 col-md-6 text-right">
					<a href="#"  class="">Privacy Policy</a> |
					<a href="#"  class="">Terms of use</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer ends -->






	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/vendor/jquery-3.2.1.min.js"></script>
	<script src="assets/vendor/popper.min.js"></script>
	<script src="assets/vendor/bootstrap-4.1.1/bootstrap.min.js"></script>

	<!--Cookie js for theme chooser and applying it --> 
	<script src="assets/vendor/cookie/jquery.cookie.js"></script> 

	<!-- scrollbars -->
	<script src="assets/vendor/jquery-custom-scrollbar-0.5.5/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.min.js"></script>

	<!-- Circular progress -->
	<script src="assets/vendor/cicular_progress/circle-progress.min.js"></script>

	<!-- Sparklines chartsw -->
	<script src="assets/vendor/sparklines/jquery.sparkline.min.js"></script>

	<!-- Other JavaScript -->
	<script src="assets/js/main.js"></script>

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
