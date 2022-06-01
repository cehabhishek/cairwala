<?php include('header.php');
 $id=$_REQUEST['id'];

?>

  <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Update Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Update Category</li>
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
					$res=mysqli_query($conn,"select * from category where category_id='$id'");
					while($row=mysqli_fetch_array($res))
					{
					?>
						<form method="POST" action="update_category_code.php?val=1&&id=<?php echo $row['category_id'];?>"enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Enter Category Name</label>
                    <input class="form-control" name="category" value="<?php echo $row['category_name'];?>" type="text" required >
                  </div>
				 <div class="form-group">  
				    <img src="subcategory_image/<?php echo $row['banner'];?>" style= "height:40px;width:40px;"> 
					<label>Uploaded Image</label>
				 </div>
				  
                   <div class="form-group">
				      
                    <label>Update Image</label>
                    <input class="form-control" name="file"  type="file" onchange="document.getElementById('blob').src=window.URL.createObjectURL(this.files[0])">
					
                  </div>
				  <div class="form-group">
				    <img id="blob" alt="."  style="height:40px;width:40px;">
				  </div>
                  <button type="submit" name="add_category" class="btn btn-primary" style="font-size: revert;">Update</button>
                  <a href="show_category.php"  class="btn btn-warning" style="font-size: revert;">Back</a>
                  
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
  

