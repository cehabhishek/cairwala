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
      <h1 class="text-black">Add Availability Location Of Products</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right">Add Product Location</i> </li>
        <li><i class="fa fa-angle-right"></i> </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <form method="POST" action="code.php?val=11">
            <fieldset class="form-group">
              <label>Enter City</label>
              <input class="form-control" id="basicInput"  name="city" type="text" required>
            </fieldset>
          </div>
		  </div>
		   <div class="row">
		   <div class="col-lg-6">
            <div class="form-group">
                    <label>Enter State</label>
                    <input class="form-control" name="state" type="text" required >
                  </div>
          </div>
         </div>
		 <button type="submit" name="add_pin" class="btn btn-primary" style="font-size:revert;">Add </button>
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
   swal("Location Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Location Added Unsuccessfully",'','warning');
</script>
<?php } ?>
  
  <?php
}
else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>