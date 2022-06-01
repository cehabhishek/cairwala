<?php include('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Add Category</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Categroy</li>
        <li><i class="fa fa-angle-right"></i> Add Category</li>
      </ol>
    </div>
      <div class="content">
        <div class="row">
         <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Add Category</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="code.php?val=2" enctype="multipart/form-data">
              <div class="form-group">
                  <?php
					$category="";
					  $query=mysqli_query($conn,"select * from add_new_vendor where vendor_email='$_SESSION[login]'");
					  if($row=mysqli_fetch_array($query))
                      {
                          $category=$row['select_category'];
                      }
					
					?>
                <label for="exampleInputEmail1">Category</label>
                <input type="text" name="id" class="form-control" readonly value="<?php echo $category;?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sub Category</label>
                <input type="text" class="form-control" name="subcategory" placeholder="Enter Your Category" required>
              </div>
              <div class="form-group">
                <label for="exampleInputfile1">Image</label>
                <input type="file" class="form-control" name="subphoto" placeholder="Password" required>
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