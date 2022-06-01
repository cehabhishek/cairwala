<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
	 $id=$_REQUEST['id'];
?>
<?php include('header.php');?>
		<!-- main container starts -->
		 <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Update Sub Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Update Sub Category</li>
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
				  $sql1=mysqli_query($conn,"select * from sub_category where subcategory_id='$id'");
						while($row1=mysqli_fetch_array($sql1,MYSQLI_BOTH))
						{
					?>
					  <form method="POST" action="update_category_code.php?val=2&&id=<?php echo $row1['subcategory_id'];?>" enctype="multipart/form-data">
                  <div class="form-group">
					<label>Select Category</label>
					<select name="category" class="form-control">
					<?php
						$sql=mysqli_query($conn,"select * from category");
						while($row=mysqli_fetch_array($sql,MYSQLI_BOTH))
						{
					 if($row1['category_id']==$row['category_id']){
							 
					?>
						<option value="<?php echo $row['category_id'];?>" selected="selected"><?php echo $row['category_name'];?></option>
						 <?php }else{ ?>
					<option value="<?php echo $row['category_id'];?>" ><?php echo $row['category_name'];?></option>
					<?php
						}
						 }
						
					?>
					</select>
                  </div>
				 
				  
				  
				  <div class="form-group">
                    <label>Sub Category</label>
                    <input class="form-control" name="subcategory"  value="<?php echo $row1['subcategory_name']?>" type="text" required >
                  </div>
				  <div class="form-group">
				      <img src="subcategory_image/<?php echo $row1['subcategory_image'];?>" style="height:40px;width:40px;">
					   <label>Uploaded Image</label>
				  </div>
				    <div class="form-group">
					 
                    <label>Upload Image</label>
                    <input class="form-control" name="file"   type="file" onchange="document.getElementById('blob').src=window.URL.createObjectURL(this.files[0])"  >
                  </div>
				  <div class="form-group">
				     <img id="blob" alt="." style="height:40px;width:40px;">
				  </div>
                  <button type="submit" name="add_subcategory" class="btn btn-primary" style="font-size:revert;">Update</button>
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
		<!-- main container ends -->
<?php include ('footer.php');?>
<?php
}
else
{
	header('location:index.php');
}
?>
