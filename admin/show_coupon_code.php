<?php include('header.php');
if(isset($_REQUEST['type'])){
	$dele=1;
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        
        if($type=='delete'){
            $sql="delete from coupon_code_tb where id='$id'";
            
        }
        mysqli_query($conn,$sql);
		$dele=5;
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">View All Coupon</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
               <thead>
												<tr>
												<th>ID</th>
                                                  <th>Coupon Code</th>
                                    			  <th>Coupon Name</th>
                                                  <th>Discount %</th>
                                                  <th>No. of time /user</th>
                                                  <th>Expiry Date</th>
                                                  <th>Edit</th>
                                                 <!-- <th>Edit</th>-->
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                    		  <?php
                                    		  $v=0;
											  $q="select * from coupon_code_tb";
                                    			$res=mysqli_query($conn,$q);
                                    			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                    			{
                                    				$v++;
                                    		  ?>
                                                <tr>
                                                  <td><?php echo $v;?></td>
                                                  <td><?php echo $row['coupon_code'];?></td>
                                                  <td><?php echo $row['coupon_name'];?></td>
                                                  <td><?php echo $row['dis_per'];?></td>
                                                  <td><?php echo $row['no_of_time'];?></td>
                                                  <td><?php echo $row['exp_date'];?></td>
                                  <td><a href="#" onclick="calling('<?php echo $row['id']; ?>')">
								<button type="button" class="btn btn-success btn-xs btn-labeled"  >Edit<span class="btn-label btn-label-right"><i class="fa  fa-pencil"></i></span></button></a>
						    </td>
														<!-- <td><a href="update_coupon.php?id=<?php // echo $row['id'];?>"><i class="fa fa-edit"></i></a></td>-->
                                                  <td class="center"><a href="?id=<?php echo $row['id'];?>&type=delete"  class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a></td>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View All Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="code.php?val=19" method="post">
      <div class="modal-body">
	  <div  id='set'class="row">
	  </div>
	  
	  
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-secondary" >Submit</button>
        
      </div>
	  </form>
    </div>
  </div>
</div>

  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
  
   <?php if(isset($dele)&& $dele==5){?>
<script>
   swal("Coupon Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($dele)&& $dele==1){?>
<script>
   swal("Coupon Deleted Unsuccessfully",'','warning');
</script>
<?php } ?>

   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==3){?>
<script>
   swal("Coupon Updated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("Coupon Updation Unsuccessfully",'','warning');
</script>
<?php } ?>
  
  <script>
	     function calling(datas){
			 
			 $.post('coupon_edit_view.php',{id:datas},function(data, status){

              $('#set').html(data);
   
  });
			 
		$('#exampleModal').modal('show');	 
		 }
	   </script>