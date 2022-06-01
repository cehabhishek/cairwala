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
      <h1 class="text-black">Add Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Add Category</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <form method="POST" action="code.php?val=1" enctype="multipart/form-data">
            <fieldset class="form-group">
              <label>Enter Category Name</label>
              <input class="form-control" id="basicInput"  name="category" type="text" required>
            </fieldset>
          </div>
		  </div>
		   <div class="row">
		   <div class="col-lg-6">
		   
			 
				<div class="form-group">
						<label>Upload Image</label>
						<input class="form-control" name="banner" type="file"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required >
				</div>
			
			
          </div>
		    <div class="col-lg-2">
			   <img id="blah" alt="." width="100" height="100" src="assets/category1.jpg"/>
			</div>
         </div>
		 <button type="submit" name="add_category" class="btn btn-primary" style="font-size:revert;">Add Category</button>
		  <button type="reset" class="btn btn-primary" style="font-size: inherit;">Reset </button>
		 </form> 
        </div>
			
	  </div>
	</div>
    </div>
	  
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
  <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Category Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Category Added Unsuccessfully",'','warning');
</script>
<?php } ?>
  
  <?php
}
else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>