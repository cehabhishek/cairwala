<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>
     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Main Banner</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
													<th>Id</th>
												
													<th>Banner Image</th>
													
													<th>Update</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												
													<?php
													include('connection.php');
													$a=0;
                                                    $sql=mysqli_query($conn,"select * from banner");
                                                    while($row=mysqli_fetch_array($sql))
                                                    {
                                                        $a++;
                                                       
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $a;?></td>
                                                  
                                                    <td><img src="banner/<?php echo $row['banner']?>" style="height:70px; width:70px;"></td>
                                                   <td>
													<a href="update_banner.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a>
													</td>
													 <td><a href="banner_delete.php?id=<?php echo $row['id'];?>" ><i class="fa fa-trash"></i></a>
													</td>
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

<?php include ('footer.php');?>
 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Banner Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Banner Deleted Unsuccessfully",'','warning');
</script>
<?php } ?>

 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==8){?>
<script>
   swal("Banner Updated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==9){?>
<script>
   swal("Banner Updation Failed",'','warning');
</script>
<?php } ?>



<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}