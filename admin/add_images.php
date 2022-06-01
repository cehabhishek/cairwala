<?php include('header.php');?>
<?php
$na=$_SESSION['admin_login'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Upload Imgae</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Image</li>
        <li><i class="fa fa-angle-right"></i>Upload Image</li>
      </ol>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Upload Image</h5>
                </div>
                <div class="card-body">

                  <form method="POST" action="code.php?val=23" enctype="multipart/form-data">
                  <div class="row">
                      
                     
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Upload Image</label>
                        <input class="form-control" placeholder="" type="file" name="file[]" multiple required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success">Submit</button>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if(isset($_REQUEST['msg']))
  {
	  $ms=$_REQUEST['msg'];
	  if($ms==1)
	  {
		  echo "<script>
		  swal({
  title: 'Success!',
  text: 'Your Image Successfully Uploaded!',
  icon: 'success',
  button: 'ok!'	,
});
		  
		  </script>";
	  }
  }
?>