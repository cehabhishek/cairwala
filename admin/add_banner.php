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
      <h1 class="text-black">Add Banner</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Banner</li>
        <li><i class="fa fa-angle-right"></i>Add Banner</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <form  action="add_banner_code.php" method="POST" enctype="multipart/form-data">
           
          </div>
		  </div>
		   <div class="row">
		   <div class="col-lg-6">
            <div class="form-group">
                    <label>Upload Banner</label>
                   
                    <input class="form-control" name="file" type="file" required multiple>
                  </div>
          </div> 
          </div> 
		 <button type="submit" name="upload" class="btn btn-primary" style="font-size:revert;">Add Banner</button>
		  <button type="reset" class="btn btn-primary" style="font-size: inherit;">Reset </button>
		 </form> 
        </div>
			
	  </div>
	</div>
    </div>
	  
<?php include ('footer.php');?>
<?php
}

else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}

?>


   