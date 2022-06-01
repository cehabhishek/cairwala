<?php include('header.php');
 $id=$_REQUEST['id'];

?>

  <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Update Slider</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Update Slider</li>
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
					$res=mysqli_query($conn,"select * from banner where id='$id'");
					while($row=mysqli_fetch_array($res))
					{
					?>
						<form method="POST" action="update_category_code.php?val=4&&id=<?php echo $row['id'];?>" enctype="multipart/form-data">
				 <div class="form-group">  
				    <img src="banner/<?php echo $row['banner'];?>" style= "height:40px;width:40px;"> 
					<label>Uploaded Image</label>
				 </div>
				  
                   <div class="form-group">
				      
                    <label>Update Image</label>
					<input type="text" name="old_img" value="/<?php echo $row['banner'];?>" hidden>
                    <input class="form-control" name="file"  type="file" onchange="document.getElementById('blob').src=window.URL.createObjectURL(this.files[0])">
					
                  </div>
				  <div class="form-group">
				    <img id="blob" alt="."  style="height:40px;width:40px;">
				  </div>
                  <button type="submit" name="update_banner" class="btn btn-primary" style="font-size: revert;">Update</button>
                  <a href="view_banner.php"  class="btn btn-warning" style="font-size: revert;">Back</a>
                  
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
  

