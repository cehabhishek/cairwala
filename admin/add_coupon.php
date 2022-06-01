<?php include('header.php');?>
<?php
if(isset($_SESSION['admin_login']))
{
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Add Category</h1>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Add Product</h5>
                </div>
                <div class="card-body">

                <form method="POST" action="code.php?val=9" enctype="multipart/form-data">
			<!-- Begin page content -->
			<div class="container">
				<div class="row">
					<div class="col-6 ">
                 
				  <div class="form-group">
                    <label>Enter Coupon Code  </label>
                    <input class="form-control" name="coupon" type="text" required >
                  </div>
				  	</div>
					<div class="col-6 ">
				   <div class="form-group">
                    <label>Enter Coupon Title </label>
                    <input class="form-control" name="title" type="text" required />
                  </div>
				  </div>
				  <div class="col-6 ">
				    <div class="form-group">
                    <label>Enter How Much Discount in % </label>
                    <input class="form-control" name="discount" type="text" required />
                  </div>
				    </div>
					<div class="col-6 ">
				  <div class="form-group">
                    <label>Enter Discount Up to in Amount</label>
                    <input class="form-control" name="amount" type="text" required >
                  </div>
				   </div>
				   <div class="col-6 ">
				  <div class="form-group">
                    <label>Coupon Ending Date </label>
                    <input class="form-control" name="date" type="date" required >
                  </div>
				   </div>
                 
				
				<div class="col-12 ">
			  <button type="submit" name="add_coupon" class="btn btn-primary pull-right" style="height: 38px;
   
    background-color: cornflowerblue;
    font-size: revert;
    color: white;">Add Coupon</button>
                  <button type="reset" class="btn btn-danger pull-right" style="width: 68px;
    height: 38px;
    font-size: revert;">Reset </button>
				  </div>
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
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Coupon Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Coupon Added Unsuccessfully",'','warning');
</script>
<?php } ?>
  
  <?php
}
else
{
    echo "<script>
      window.location.href='index.php';alert('Session Destroy Logout')
    </script>";
}
  ?>