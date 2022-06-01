<?php include('header.php');
 $id=$_REQUEST['id'];

?>

  <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Update GST %</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Update GST %</li>
        <li><i class="fa fa-angle-right"></i> </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <?php
					$id=$_REQUEST['id'];
					include('connection.php');
					$res=mysqli_query($conn,"select * from gst where id='$id'");
					while($row=mysqli_fetch_array($res))
					{
					?>
						<form method="POST" action="code.php?val=21">
                  <div class="form-group">
                    <label>Update GST % </label>
                    <input class="form-control" name="gst_percentage" value="<?php echo $row['gst_percentage'];?>" type="text" required >
                  </div>
				 <input class="form-control" name="id" value="<?php echo $row['id'];?>" type="hidden" required >
                  <button type="submit" name="" class="btn btn-primary" style="font-size: revert;">Update</button>
                  <a href="show_gst.php"  class="btn btn-warning" style="font-size: revert;">Back</a>
                  
                </form>
				<?php
					}
					?>
        </div>
			
	  </div>
	</div>
	</div>
    </div>
	  
  <!-- /.content-wrapper -->
  <?php include ('footer.php');?>
  

