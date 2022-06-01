<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        if($type=='active'){
            $sql="update vendor_sub_category set active='1' where subcategory_id='$id'";
            
        }
        if($type=='deactive'){
            $sql="update vendor_sub_category set active='0' where subcategory_id='$id'";
            
        }
        if($type=='delete'){
            $sql="delete from vendor_sub_category where subcategory_id='$id'";
            
        }
        mysqli_query($conn,$sql);
    }
    
    
    
}
?>
<style>
caption
{
	display:none;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Show Category</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Categroy</li>
        <li><i class="fa fa-angle-right"></i> Show Category</li>
      </ol>
    </div>
				
				
					   <div class="info-box">
                            <h4 class="text-black">Main Category</h4>
									 <div class="table-responsive">
										<table class="display table  table-bordered" id='example1'>
											<thead>
												<tr>
													<th>Id</th>
													<th>Category Name</th>
														<th>Banner Image</th>
													<th>Edit</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
													<?php
													$a=0;
                                                    $sql=mysqli_query($conn,"select * from category");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                        $a++;
                                                        $name=$row['category_name'];
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $a;?></td>
                                                    <td><?php echo $row['category_name'];?></td>
                                                    <td><img src="subcategory_image/<?php echo $row['banner']?>" style="height:50px; width:50px;"></td>
                                                     <td><a href="update_category.php?id=<?php echo $row['category_id'];?>"><i class="fa fa-edit"></i></a></td>
                                                    <td><a href="code.php?val=5&id=<?php echo $row['category_id'];?>"><i class="fa fa-trash"></i></a></td>
                                                	</tr>
                                                    <?php
                                                    }
                                                    ?>

											</tbody>
										</table>
									</div>
									</div>
									
		
								<br/><br/>
			 <div class="info-box">
                            <h4 class="text-black">Sub Category</h4>
									   <div class="table-responsive">
										<table class="display table  table-bordered" id='example3'>
											<thead>
												<tr>
													<th>ID</th>
													<th>Main Category</th>
													<th data-breakpoints="xs sm">Sub-Category Name</th>
													<th data-breakpoints="xs sm md">Image</th>
														<th data-breakpoints="xs sm md">Edit</th>
													<th data-breakpoints="xs sm" >Action</th>
												</tr>
											</thead>
											<tbody>
													<?php
													$b=0;
                                                        $name=$row['category_name'];
                                                    $sql1=mysqli_query($conn,"select * from sub_category");
                                                    while($row1=mysqli_fetch_array($sql1))
                                                    {
                                                      $cid=$row1['category_id'];  
													$sql=mysqli_query($conn,"select * from category where category_id=$cid");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                       $name=$row['category_name'];
                                                    }
                                                        $b++;
                                                        
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $b;?></td>
                                                    <td><?php echo $name;?></td>
                                                    <td><?php echo $row1['subcategory_name'];?></td>
                                                    <td><img src="subcategory_image/<?php echo $row1['subcategory_image'];?>" height="50px" width="50px" /></td>
                                                    <td><a href="update_sub_category.php?id=<?php echo $row1['subcategory_id'];?>"><i class="fa fa-edit"></i></a></td>
                                                    <td><a href="code.php?val=6&id=<?php echo $row1['subcategory_id'];?>"><i class="fa fa-trash"></i></a></td>
                                                	</tr>
                                                    <?php
                                                    
                                                    }
                                                    ?>
											</tbody>
										</table>
									</div>
									
				</div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
  
     <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Category Update Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Category Update Unsuccessfully",'','warning');
</script>
<?php } ?>

     <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==8){?>
<script>
   swal("Category Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==9){?>
<script>
   swal("Category Deleted Unsuccessfully",'','warning');
</script>
<?php } ?>


   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==3){?>
<script>
   swal("Sub-Category Update Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("Sub-Category Update Unsuccessfully",'','warning');
</script>
<?php } ?>

  <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==10){?>
<script>
   swal("Sub-Category Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==11){?>
<script>
   swal("Sub-Category Deleted Unsuccessfully",'','warning');
</script>
<?php } ?>



  
  
  