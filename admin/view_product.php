<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        
        if($type=='delete'){
            $sql="delete from add_job where job_id='$id'";
            
        }
        mysqli_query($conn,$sql);
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">All Products</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Sub Category</th>
				  
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Image1</th>
                  <th width="45%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                                    			$res=mysqli_query($conn,"select * from products ");
                                    			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                    			{
                                    		  ?>
                        <tr>
                          
                          <td><?php echo $row['Category']?></td>
                          <td><?php echo $row['SubName']?></td>
                          <td><?php echo $row['Name']?></td>
                          
                          <td><?php echo $row['Price']?></td>
                      
                               <td><img src="product_image/<?php echo $row['Image1'];?>" height="50px" width="50px"></td>
							  <td class="center">
                               <a href="product_edit.php?id=<?php echo $row['ProductID']?>" class="btn btn-circle btn-primary" style="width:25px"><i class="fa fa-edit"></i></a>
                               <a href="delete_product.php?id=<?php echo $row['ProductID'];?>" class="btn btn-circle btn-danger "><i class="fa fa-trash"></i></a>	
                                           <?php 
													if($row['status']==1){
														?><a href="status.php?id=<?php echo $row['ProductID']?>&type=deactive" class="btn btn-circle btn-success">Click To Deactive</a><?php
													}else{
														?><a href="status.php?id=<?php echo $row['ProductID']?>&type=active" class="btn btn-circle btn-warning ">Click To Active</a><?php
													}
												  ?> <a href="../single_product.php?product=<?php echo base64_encode($row['ProductID']);?>" class="btn btn-circle btn-warning " target="_blank">Preview</a>							   
                              
                          </td>
                        </tr>
						
                    <?php
                       $count++; }
                    ?>
                
               
           </table>
                  </div>
      </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Product Updated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Product Updated Unsuccessfully",'','warning');
</script>
<?php } ?>


   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==5){?>
<script>
   swal("Product Delete Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==6){?>
<script>
   swal("Product Delete Unsuccessfully",'','warning');
</script>
<?php } ?>


   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==10){?>
<script>
   swal("Product Activated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==11){?>
<script>
   swal("Product Deactived Successfully",'','success');
</script>
<?php } ?>
  