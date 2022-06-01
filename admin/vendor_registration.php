<?php
session_start();
error_reporting(0);
require("connection.php");
$msg=$_REQUEST['msg'];
if($msg==1)
{
	echo "<script>alert('your email or password is wrong')</script>";
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
			
				<div class="row" style="padding-top:10%">
					
					<div class="col-sm-12 ">
						<div class="card rounded-0 border-0 mb-3">
							<div class="card-header">
								<div class="row">
									<div class="col-12">
									    	
										<center><h5 class="card-title">Vendor Registration</h5></center>
									</div>
								</div>
							</div>
							<div class="card-body pr-5 pl-5">
							
								<br>
								<form method="POST" action="vendor_registration_code.php" enctype="multipart/form-data">
			<!-- Begin page content -->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
                  <div class="form-group">
					<label>Select Category</label>
					<select name="select_category" class="form-control" onchange="myfun(this.value)">
					<?php
					include('db.php');
						$sql=mysqli_query($conn,"select * from category");
						while($row=mysqli_fetch_array($sql,MYSQLI_BOTH))
						{
						 
					?>
				
					<option value="<?php echo $row['category_name'];?>" ><?php echo $row['category_name'];?></option>
					<?php
						}
					?>
					</select>
                  </div>
               </div>
	<div class="col-sm-6 ">
				  <div class="form-group">
                    <label>Vendor Name</label>
                    <input class="form-control" name="vendor_name" type="text" required >
                  </div>
</div>
	<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Vender Mobile</label>
                    <input class="form-control" name="vendor_mobile" type="number" required />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Vender Email</label>
                    <input class="form-control" id="test" name="vendor_email" type="email" required />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Upload Banner Photo</label>
                    <input class="form-control" name="image" type="file" />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Upload Logo</label>
                    <input class="form-control" name="logo" type="file" />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Business Name</label>
                    <input class="form-control" name="business" type="text" />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Pin Code</label>
                    <input class="form-control" name="pin" type="text"  />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Enter Google Map Code</label>
                    <input class="form-control" name="google" type="text"  />
                  </div>
</div>
<div class="col-sm-6 ">
				   <div class="form-group">
                    <label>Opening Hours</label>
                    <input class="form-control" name="hours" type="text" />
                  </div>
</div>
	<div class="col-sm-6 ">
				    <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="vendor_password" type="password" required />
                  </div>
</div>
	<div class="col-sm-6">
				  <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="form-control" name="comfirm_password" type="text" required />
                  </div>
				 
				
                 
				  
                 
                 
					</div>
					
					
			  
			 
				<!--<div class="col-lg-12">
			    <div class="form-group">
                    <label>Product Description</label>
                    <textarea id="txtEditor"  name="product_descri" class="form-control"><?php //echo $row['12']; ?></textarea> 
                  </div>
			  </div>-->
			  
			  <div class="col-lg-2" id="regbtn" style="display:none;">
			  <center><button type="submit" name="add_product" class="btn btn-primary pull-right" style="height:100%;width:100%;">Registration</button></center>
              
				  </div>
				  <div class="col-lg-2" id="embtn">
			
               <center><a onclick="show()" data-toggle="modal" data-target="#exampleModal" id="button" class="btn btn-primary pull-right" style="height:100%;width:100%;color:white">Registration</a></center>
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
	<!-- wrapper ends -->
	
	
	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-sm-12 ">
				   <div class="form-group">
                    <label>Vender Email</label>
                    <input class="form-control" id="test1" name="vendor_email" type="text" required />
                  </div>
</div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        <a onclick="Reg()" class="btn btn-primary" data-dismiss="modal">Save</a>
      </div>
    </div>
  </div>
</div>
<!--------------------model closed--------------->


	<?php
include('footer.php');
?>






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
   
   function show()
   {    
       var email=$("#test").val();
       $("#test1").val(email);
 
   }
    function Reg()
   {    
       var email=$("#test1").val();
       $("#test").val(email);
	   $("#regbtn").show();
	   $("#embtn").hide();
 
   }
</script>
</body>


<!-- Mirrored from bootstraptemplatedesign.com/demo-application/boothelp/form-blocks.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 06:17:28 GMT -->
</html>
