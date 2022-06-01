<?php include('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Add Subcategory</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Categroy</li>
        <li><i class="fa fa-angle-right"></i> Add Subcategory</li>
      </ol>
    </div>
      <div class="content">
        <div class="row">
         <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Add Subcategory</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="code.php?val=2" enctype="multipart/form-data">
              <div class="form-group">
			 
                  
               <label for="exampleInputEmail1">Category</label>
               <select class="form-control" name="category">
			   <?php
					$category="";
					  $query=mysqli_query($conn,"select * from category");
					  while($row=mysqli_fetch_array($query))
                      {
						  ?>
						  
                          <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
						  <?php
                      }
					
					?>
			   </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sub Category</label>
                <input type="text" class="form-control" name="subcategory" placeholder="Enter Your Category" required>
              </div>
			  <img id="bash" alt="." width='100' height='100' src="assets/category1.jpg"/>
			  
              <div class="form-group">
                <label for="exampleInputfile1">Upload Image</label>
                <input type="file" class="form-control" name="subphoto" onchange="document.getElementById('bash').src=window.URL.createObjectURL(this.files[0])" required>
              </div>
              
              
              <button type="submit" name="add_subcategory" class="btn btn-success">Submit</button>
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
   swal("Sub-Category Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Sub-Category Added Unsuccessfully",'','warning');
</script>
<?php } ?>