<?php include('header.php');?>
<?php 
//session_start();
if(isset($_SESSION['admin_login']))
{
?>

     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Our Users</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
										<th>User </th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Address</th>
										  <th>Active/Deactive</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
										                                      <tbody>
                            		  <?php
                            			$res=mysqli_query($conn,"select * from register ");
                            			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                            			{
                            		  ?>
                                        <tr>
                                          <td><?php echo $row['name'];?></td>
                                          <td><?php echo $row['email'];?></td>
                                          <td><?php echo $row['mobile'];?></td>
                                          
                                          <td class="center"><?php echo $row['address'].",".$row['landmark'].",".$row['city'].",".$row['state'].",".$row['zip'] ;?></td>
                                           <td><?php if($row['user_status']==1){ ?>
											   <a href="delete_member.php?id=<?php echo $row['id'];?>&act=0" class="btn btn-circle btn-success ">Click To Deactivate</a>
										  <?php }else{  ?>
											 <a href="delete_member.php?id=<?php echo $row['id'];?>&act=1" class="btn btn-circle btn-danger ">Click To Activate</a>  
										  <?php }?>
										  </td>
										  <td class="center">
										  <a href="show_orderlist.php?id=<?php echo base64_encode($row['email']);?>&n=<?php echo $row['name'];?>" class="btn btn-circle btn-success ">Order List</a>
										  <a href="delete_member.php?id=<?php echo $row['id'];?>" class="btn btn-circle btn-danger "><i class="fa fa-trash"></i></a> </td>
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



 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==5){?>
<script>
   swal(" User De-Activated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("User Activated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==3){?>
<script>
   swal("User Activation/Deactivation Process Failed",'','warning');
</script>
<?php } ?>

 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal(" User Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Deleting User  Unsuccessful",'','warning');
</script>
<?php } ?>


<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}