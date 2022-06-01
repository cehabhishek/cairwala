<?php 
session_start();
include('header.php');?>
<?php
if(isset($_SESSION['admin_login']))
{
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Add Product</h1>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Add Product</h5>
                </div>
                <div class="card-body">

                  <form method="POST" action="code.php?val=3" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
					<label>Select Category</label>
					<select name="category" class="form-control" onchange="myfun(this.value)">
					 <option>Select One</option>
					<?php
						$sql=mysqli_query($conn,"select * from category");
						while($row=mysqli_fetch_array($sql,MYSQLI_BOTH))
						{
						 
					?>
				
					<option value="<?php echo $row['category_id'];?>" ><?php echo $row['category_name'];?></option>
					<?php
						}
					?>
					</select>
                  </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					<label>Select Sub Category</label>
				   <select name="subCategory" class="form-control" id="dataget">
					    <option>Select One</option>
					</select>
                  </div>
                       </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					<label>Product Title</label>
					<input class="form-control" name="producttitle" type="text" required />
                  </div>
                       </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                          <div class="form-group">
						     <img id='blob1' alt=' ' style="height:40px;width:40px" src="assets/category1.jpg">
							<label>Image1</label>
							<input class="form-control" name="product_image1" type="file" onchange="document.getElementById('blob1').src=window.URL.createObjectURL(this.files[0])"required />
					      </div>
                       </div>
                    </div>
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Name</label>
                        <input class="form-control" name="productname" type="text" required >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					    <img id='blob2' alt=' ' style="height:40px;width:40px" src="assets/category1.jpg">
					<label>Image2</label>
					<input class="form-control" name="product_image2" type="file" onchange="document.getElementById('blob2').src=window.URL.createObjectURL(this.files[0])" required />
                  </div>
                       </div>
                    </div>
					
					
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Selling Price</label>
                        <input class="form-control" name="productprice" type="text" required >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
						   <img id='blob3' alt=' ' style="height:40px;width:40px" src="assets/category1.jpg">
							<label>Image3</label>
						     <input class="form-control" name="product_image3" type="file" onchange="document.getElementById('blob3').src=window.URL.createObjectURL(this.files[0])" required />
						</div>
                       </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Strikethrough Product  Price(Ex: <strike>380</strike>) Optional</label>
                        <input class="form-control" name="productprice_strike" type="text"  >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group has-feedback">
						   <div class="form-group">
						         <img id='blob4' alt=' ' style="height:40px;width:40px"  src="assets/category1.jpg">
								<label>Image4</label>
								<input class="form-control" name="product_image4" type="file" onchange="document.getElementById('blob4').src=window.URL.createObjectURL(this.files[0])" required />
						   </div>
                       </div>
                    </div>
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Discount %(Ex: 5%) Optional</label>
                        <input class="form-control" name="discount" type="text"  >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					     <img id='blob5' alt=' ' style="height:40px;width:40px"  src="assets/category1.jpg">
					<label>Image5 </label>
					<input class="form-control" name="product_image5" type="file" onchange="document.getElementById('blob5').src=window.URL.createObjectURL(this.files[0])" required />
                  </div>
                       </div>
                    </div>
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Quantity </label>
                        <input class="form-control" name="quntity" type="number" required >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Show Product In Best Seller Section</label>
                       <div class="form-control">
                     <input  name="is_best_seller" type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input name="is_best_seller" type="radio" value="No" checked />  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div> 
					
					
                  <!--<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Profit Amount</label>
                        <input class="form-control" name="profit" type="text" required />
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>-->
					
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Show Product In Hot Deal Section</label>
                       <div class="form-control">
                     <input  name="hot_deal" type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="hot_deal" type="radio" value="No" checked />  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					 
					 <!--<div class="col-md-9">
                      <div class="form-group has-feedback">
                        <label class="control-label">Discount</label>
                       <div class="form-control">
                    <input  name="discount" type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="discount" type="radio" value="No" checked />  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
							
				
					<!--<div class="col-md-9">
                      <div class="form-group has-feedback">
                        <label class="control-label">Coupon Availbale for this product?</label>
                       <div class="form-control">
                    <input  name="is_coupon" type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input name="is_coupon" type="radio" value="No" checked />  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>-->
					
					
					 <div class="col-lg-12">
			    <!--<div class="form-group">
                    <label>Product Delivery Timing</label>
                    <input class="form-control" name="product_delivery" type="text">
                  </div>-->
			  </div>
			   <div class="col-lg-12">
			    <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea   name="product_s_descri" class="form-control"><?php //echo $row['12']; ?></textarea> 
                  </div>
			  </div>
			  	<div class="col-lg-12">
			  <div class="form-group">
                    <label>Product Description</label>
                    <textarea id="about1"  name="product_descri" class=""><?php //echo $row['12']; ?></textarea> 
                  </div>
			  </div>
			  <div class="col-lg-6"></div>
                    <div class="col-lg-6">
			  <button type="submit" name="add_product" class="btn btn-primary pull-right"style="margin-left:20px;height: 38px;background-color: cornflowerblue; font-size: revert;color: white;">Add Products</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="reset" class="btn btn-danger pull-right" style="width: 68px;text-align: justify;
    height: 38px;
    font-size: revert;">Reset </button>
				  </div>
                     </div>
					 <!-- passing unnecessay data remove it if above filed is uncommented  -->
					 
					  <input name="product_delivery" type="hidden" value='1'>
					  <input name="is_coupon" type="hidden" value='yes'>
					 <!-- <input name="discount" type="hidden" value='0'>-->
					  <input name="profit" type="hidden" value='0'>
					 <!-- <input name="quntity" type="hidden" value='1'>-->
					 
					 
					 
					 
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  
  <!-- /.content-wrapper -->
  <?php include('footer.php');  ?>
  
   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Product Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Product Added Unsuccessfully",'','warning');
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
  
  <script>
    function myfun(datavalue)
    {
        $.ajax({
            url:'ajax.php',
            type:'POST',
            data:{datapost : datavalue},
            success:function(result)
            {
                $('#dataget').html(result);
            }
        });
    }
</script>