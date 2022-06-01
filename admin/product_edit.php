<?php include('header.php');?>
<?php
if(isset($_SESSION['admin_login']))
{
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Edit Product</h1>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Edit Product</h5>
                </div>
                <div class="card-body">

                  <form method="POST" action="code.php?val=8" enctype="multipart/form-data">
                  <div class="row">
				  <?php
				  $id=$_REQUEST['id'];
						$sql2=mysqli_query($conn,"select * from products where ProductID='$id'");
						if($row2=mysqli_fetch_array($sql2,MYSQLI_BOTH))
						{
						 
					?>
                    <div class="col-md-6">
                      <div class="form-group">
					<label>Select Category</label>
					<select name="category" class="form-control" onchange="myfun(this.value)">
					<?php
						$sql=mysqli_query($conn,"select * from category");
						$select="";
						while($row=mysqli_fetch_array($sql,MYSQLI_BOTH))
						{
						 if($row2['Category']==$row['category_id']){
							 
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
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					<label>Select Sub Category</label>
					<select name="subCategory" class="form-control" id="dataget">
					   <option><?php echo $row2['SubName']?></option>
					</select>
                  </div>
                       </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                       <div class="form-group">
					<label>Product Title</label>
					<input class="form-control" name="producttitle" value="<?php echo $row2['Title']?>"  type="text" required />
                  </div>
                       </div>
                    </div>
					
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Name</label>
                        <input class="form-control" name="productname" type="text" value="<?php echo $row2['Name']?>" required >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
						<input value="<?php echo $row2['ProductID']?>" name="pid" type="hidden" >
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Quantity</label>
                        <input class="form-control" value="<?php echo $row2['quantitys']?>" name="quntity" type="number" required />
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div> 
					
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Product Selling Price</label>
                        <input class="form-control" value="<?php echo $row2['Price']?>" name="productprice" type="text" required />
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					
					
					
                 <!-- <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Profit Amount</label>
                     <input class="form-control" value="<?php // echo $row2['profit']?>" name="profit" type="text" required />
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div> -->
					
					<!-- <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Discount</label>
						<?php
						/*$yes="";
						$no="";
						if($row2['discount']=='Yes'){
							 $yes="checked";
						 }
						 else{
							 $no="checked";
						 }  */
					?>
                       <div class="form-control">
                    <input  name="discount" <?php echo $yes?> type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input name="discount" <?php echo $no?> type="radio" value="No"/>  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>-->
							 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Show Product In Best Seller Section</label>
						 <?php
						$yes="";
						$no="";
						if($row2['is_best_seller']=='Yes'){
							 $yes="checked";
						 }
						 else{
							 $no="checked";
						 }
					?>
                       <div class="form-control">
                     <input  name="is_best_seller" <?php echo $yes;?> type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="is_best_seller" <?php echo $no;?> type="radio" value="No"/>  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
				
					<!--<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Coupon Availbale for this product?</label>
						<?php
					   /*	$yes="";
						$no="";
						if($row2['is_coupon']=='Yes'){
							 $yes="checked";
						 }
						 elseif($row2['is_coupon']=='No'){
							 $no="checked";
						 }
						 else{
							 
						 }  */
					?>
                       <div class="form-control">
                   <input name="is_coupon" <?php //echo $yes?> type="radio" value="Yes"/> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input name="is_coupon" <?php //echo $no?> type="radio" value="No"/>  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>-->
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Strikethrough Product  Price(Ex: <strike>380</strike>) Optional</label>
                        <input class="form-control" name="productprice_strike" type="text" value="<?php echo $row2['strike_price'];?>" >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					
					<div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Show Product In Hot Deal Section</label>
						 <?php
						$yes="";
						$no="";
						if($row2['hot_deal']=='Yes'){
							 $yes="checked";
						 }
						 else{
							 $no="checked";
						 }
					?>
						
                       <div class="form-control">
                     <input  name="hot_deal" type="radio" value="Yes"  <?php echo $yes;?> /> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="hot_deal" type="radio" value="No" <?php echo $no;?>  />  No</div>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					 <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Discount %(Ex: 5%) Optional</label>
                        <input class="form-control" name="discount" type="text" value="<?php echo $row2['discount']; ?>" >
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
					
					<div class="col-md-6">
                       <div class="form-group has-feedback">
					    uploaded Image &nbsp;&nbsp; <img src="product_image/<?php echo $row2['Image1'];?>" style="height:40px;width:40px;"> &nbsp;&nbsp;&nbsp;
						 <img id='blob1' alt='new Image' style="height:40px;width:40px">
							<div class="form-group">
								<label>Image1</label>
								<input class="form-control" name="product_image1" type="file" onchange="document.getElementById('blob1').src=window.URL.createObjectURL(this.files[0])" />
							</div>
                       </div>
                    </div>
					<div class="col-md-6">
                       <div class="form-group has-feedback">
					     uploaded Image &nbsp;&nbsp;<img src="product_image/<?php echo $row2['Image2'];?>" style="height:40px;width:40px;">
						&nbsp;&nbsp;&nbsp;
						 <img id='blob2' alt='New Image' style="height:40px;width:40px">
							<div class="form-group">
								<label>Image2</label>
								<input class="form-control" name="product_image2" type="file" onchange="document.getElementById('blob2').src=window.URL.createObjectURL(this.files[0])" />
							</div>
                       </div>
                    </div>
					<div class="col-md-6">
                       <div class="form-group has-feedback">
						uploaded Image &nbsp;&nbsp; <img src="product_image/<?php echo $row2['Image3'];?>" style="height:40px;width:40px;">
							 	&nbsp;&nbsp;&nbsp;
						 <img id='blob3' alt='New Image' style="height:40px;width:40px">
							<div class="form-group">
								<label>Image3</label>
								<input class="form-control" name="product_image3" type="file" onchange="document.getElementById('blob3').src=window.URL.createObjectURL(this.files[0])" />
							</div>
                       </div>
                    </div>
					<div class="col-md-6">
                       <div class="form-group has-feedback">
					        uploaded Image &nbsp;&nbsp; <img src="product_image/<?php echo $row2['Image4'];?>" style="height:40px;width:40px;">
						   	&nbsp;&nbsp;&nbsp;
						 <img id='blob4' alt='New Image' style="height:40px;width:40px">
							<div class="form-group">
								<label>Image4</label>
								<input class="form-control" name="product_image4" type="file" onchange="document.getElementById('blob4').src=window.URL.createObjectURL(this.files[0])" />
							</div>
                       </div>
                    </div>
					<div class="col-md-6">
                       <div class="form-group has-feedback">
					    uploaded Image &nbsp;&nbsp; <img src="product_image/<?php echo $row2['Image5'];?>" style="height:40px;width:40px;">
							&nbsp;&nbsp;&nbsp;
						    <img id='blob5' alt='New Image' style="height:40px;width:40px">
							<div class="form-group">
								<label>Image5</label>
								<input class="form-control" name="product_image5" type="file" onchange="document.getElementById('blob5').src=window.URL.createObjectURL(this.files[0])" />
							</div>
                       </div>
                    </div>
					
					
					
					<!-- <div class="col-lg-12">
						<div class="form-group">
								<label>Product Delivery Timing</label>
								<input class="form-control" value="<?php // echo $row2['DeliveryTime']?>" name="product_delivery" type="text">
						  </div>
					</div> -->
					
			   <div class="col-lg-12">
			    <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea id=""  name="product_s_descri" class="form-control"><?php echo $row2['short_description']?>"</textarea> 
                  </div>
			  </div>
			  	<div class="col-lg-12">
			      <div class="form-group">
                    <label>Product Description</label>
                     <textarea id="Description"  name="product_descri" class="form-control"><?php echo $row2['Description']; ?></textarea> 
                  </div>
			  </div>
			  <div class="col-lg-6"></div>
                    <div class="col-lg-6">
			 <button type="submit" name="edit_product" class="btn btn-primary pull-right">Update Products</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="view_product.php" class="btn btn-danger pull-right" style="margin-right:10px">Back </a>
				  </div>
                     </div>
					 
					  <!-- passing unnecessay data remove it if above filed is uncommented  -->
					 
					  <input name="product_delivery" type="hidden" value='1'>
					  <input name="is_coupon" type="hidden" value='yes'>
					  <!--<input name="discount" type="hidden" value='0'>-->
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
  <?php }
						
}
else
{
   header('location:index.php');
	
}
include('footer.php');
?>

 <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('Description', {
    //  height: 250,
      extraPlugins: 'colorbutton'
    });
  </script>
  
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