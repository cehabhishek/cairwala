<?php include('header.php');?>
<?php
$na=$_SESSION['admin_login'];
if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
    $id=$_REQUEST['id'];
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Update Product</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Product</li>
        <li><i class="fa fa-angle-right"></i> Update product</li>
      </ol>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Update Product</h5>
                </div>
                <div class="card-body">
                    <?php
						$sql2=mysqli_query($conn,"select * from products where ProductID='$id'");
						if($row2=mysqli_fetch_array($sql2,MYSQLI_BOTH))
						{
						 
					?>
                  <form method="POST" action="code.php?val=8" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group has-feedback">
                          <label class="control-label"> Category Name</label>
                              <?php 
                              $res=mysqli_query($conn,"select * from add_new_vendor where vendor_email='$na' ");
                              if($row=mysqli_fetch_array($res))
                              {
                              ?>
                             <input class="form-control" value="<?php echo $row['select_category'];?>" name="category" type="text" required readonly >
                              <?php
                              }
                                  ?>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group has-feedback">
                          <label class="control-label">Select Sub Category</label>
                            <select name="subCategory" class="form-control" id="dataget" required>
                                <option value="">Select One</option>
                                <?php
                                
                                $v_id=$_SESSION['login'];
                                $query="select* from vendor_sub_category where v_id='$v_id' and active=1";
                                $res=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_array($res))
                                {
                                    $select="";
                                    if($row2['SubName']==$row['subcategory_name']){
                                        $select="selected";
                                    }
                                ?>
                                <option <?php echo $select;?> value="<?php echo $row['subcategory_name'];?>"><?php echo $row['subcategory_name'];?></option>
                                <?php
                                }
                                ?>

                            </select>
                          </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Name</label>
                        <input class="form-control" value="<?php echo $row2['Name']?>" type="text" name="productname" required>
                        <input class="form-control" value="<?php echo $row2['ProductID']?>" type="hidden" name="pid">
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Title</label>
                        <input class="form-control" value="<?php echo $row2['Title']?>" placeholder="Product Title" type="text" name="producttitle" required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Selling Price</label>
                        <input class="form-control" value="<?php echo $row2['Price']?>" placeholder="Product Selling Price" type="text" name="productprice" required>
                        <span class="fa fa-rupee form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Quantity</label>
                        <input class="form-control" value="<?php echo $row2['quantitys']?>" placeholder="Product Quantity" type="text" name="quntity" required>
                        <span class="fa fa-calculator form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Delivery Timing</label>
                        <input class="form-control" value="<?php echo $row2['DeliveryTime']?>" placeholder="Product Delivery Timing" type="text" name="product_delivery" required>
                        <span class="fa fa-clock-o form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Short Description</label>
                        <input class="form-control" value="<?php echo $row2['short_description']?>" placeholder="Product Short Description" type="text" name="product_s_descri" required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="form-group has-feedback">
                          <label class="control-label">Image 1</label>
                        <input class="form-control" type="file" name="product_image1" required>
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group has-feedback">
                           <label class="control-label">Image 2</label>
                        <input class="form-control" type="file" name="product_image2" required>
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group has-feedback">
                           <label class="control-label">Image 3</label>
                       <input class="form-control" type="file" name="product_image3" required>
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group has-feedback">
                           <label class="control-label">Image 4</label>
                        <input class="form-control" type="file" name="product_image4" required>
                      </div>
                    </div>-->
                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Description</label>
                        <textarea name="product_descri" class="form-control" id="editor" rows="3"><?php echo $row2['Description']?></textarea>
                      </div>
                    </div>
                   
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                     </div>
                  </form>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>