<?php include('header.php');?>
<?php
error_reporting(0);
?>
<?php
$msg=$_REQUEST['msg'];
if($msg==1)	
{
	$m1="Your Password is Update Successfully";
}
if($msg==2)	
{
	$m2="Your Confirm Password is Not Match";
}
if($msg==3)	
{
	$m3="Your Old Password is Not Match";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Change Password</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Change Password</li>
        <li><i class="fa fa-angle-right"></i>Change Password</li>
		
      </ol>
	 
    </div>
	 <span style="color:red; font-size:20px;"><?php echo $m1;?></span>
      <div class="content">
        <div class="row">
         <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Change Password</h5>
            </div>
			
            <div class="card-body">
              <form method="POST" action="change_password_code.php" enctype="multipart/form-data">
			   <div class="form-group">
                 
                <label for="exampleInputEmail1">Old Password</label>
                <input type="text" name="old" class="form-control" placeholder="Enter Old Password" required>
				<span style="color:red; font-size:20px;"><?php echo $m3;?></span>
              </div>
              <div class="form-group">
                 
                <label for="exampleInputEmail1">New Password</label>
                <input type="text" name="password" class="form-control" placeholder="Enter New Password" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Passqord</label>
                <input type="text" class="form-control" name="cpassword" placeholder="Enter Confirm Password" required>
			 <span style="color:red; font-size:20px;"><?php echo $m2;?></span>
              </div>
             
              <button type="submit" name="add_subcategory" class="btn btn-success">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>