<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>
 <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Update Admin Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Elements</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <?php 
		             include('connection.php');
	                      $email=$_SESSION['login']; 					
						  $res=mysqli_query($conn,"select * from admin where email='$email'");
						  
						while($row=mysqli_fetch_array($res))
						{
						?>
		  <form method="POST" action="update_profile_code.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
           
          </div>
		  </div>
		   <div class="row">
		   <div class="col-lg-12">
            <div class="form-group">
                    <label>Change Email Id</label>
                    <input class="form-control" name="email" type="email" value="<?php echo $row['email']?>"required >
          </div>
         </div>
		 <div class="col-lg-12">
            <div class="form-group">
                    <label>Change Password</label>
                   <input class="form-control" name="password" type="text" value="<?php echo $row['password']?>" required >
          </div>
         </div>
		 
		&nbsp;&nbsp;&nbsp;&nbsp; <button type="submit" name="submit" class="btn btn-submit" style="width: 83px;background-color: cornflowerblue;font-size: revert;color: white;">Update</button>
		 
		 </form>
 
				<?php
						}
						?>		 
        </div>
			
	  </div>
	</div>
    </div>
	  
<?php include ('footer.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal('Password Changed Unsuccessful!','It is due to system error or you may not change the current password','warning');
</script>
<?php } ?>
<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}



?>