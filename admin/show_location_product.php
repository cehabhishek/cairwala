<?php include('header.php');?>
<style>
caption
{
	display:none;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Show Product Location</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Show Product Location</li>
        <li><i class="fa fa-angle-right"></i> </li>
      </ol>
    </div>
				<div class="row">
				<div class="col-sm-12 col-md-12"><center><h2 class="card-title">Show Product Location</h2></center></div>
					<div class="col-sm-12 col-md-12">
						<div class="card rounded-0 border-0 mb-3">
							
							<div class="card-body p-0">
							
								<div class="tab-content">
									<div class="tab-pane fade active show p-2" >
										<table class="display table  table-bordered" id='example4'>
											<thead>
												<tr>
													<th>Id</th>
														<th>City</th>
														<th>State</th>
														<th>Edit</th>
													    <th>Delete</th>
												  </tr>
											</thead>
											<tbody>
												
													<?php
													$a=0;
                                                    $sql=mysqli_query($conn,"select * from product_location");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                        $a++;
                                                       
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $a;?></td>
                                                    <!--<td><?php echo $row['place'];?></td>
                                                    <td><?php echo $row['pincode'];?></td>-->
                                                    <td><?php echo $row['city'];?></td>
                                                    <td><?php echo $row['state'];?></td>
                                                   
                                                     <td><a href="update_location_product.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a></td>
                                                    <td><a href="code.php?val=13&id=<?php echo $row['id'];?>"><i class="fa fa-trash"></i></a></td>
                                                	</tr>
                                                    <?php
                                                    }
                                                    ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
								<br/><br/>
				
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
  
     <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Location Update Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Location Update Unsuccessfully",'','warning');
</script>
<?php } ?>

     <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("Location Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==5){?>
<script>
   swal("Location Deleted Unsuccessfully",'','warning');
</script>
<?php } ?>







  
  
  