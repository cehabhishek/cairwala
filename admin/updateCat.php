<?php 
include('header.php');
$catName='';
if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
    $id=$_REQUEST['id'];
    $res=mysqli_query($conn,"select * from vendor_sub_category where subcategory_id='$id'");
    if($row=mysqli_fetch_assoc($res)){
        $catName=$row['subcategory_name'];
    }
}

?>

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
              <form method="POST" action="updateCatCode.php" enctype="multipart/form-data">
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
                <input type="hidden" name="cid" class="form-control" value="<?php echo $id;?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sub Category</label>
                <input type="text" class="form-control" name="subcategory" value="<?php echo $catName?>" placeholder="Enter Your Category" required>
              </div>
              <div class="form-group">
                <label for="exampleInputfile1">Image</label>
                <input type="file" class="form-control" name="subphoto" placeholder="Password">
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