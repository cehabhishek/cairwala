<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>
<style>
 
	.fade:not(.show){
		opacity:.9 !important;
	}
	
	.modal.fade .modal-dialog{
		transform: translate(0,0%);
	}
</style>
     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">View Blogs</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
												<th>S.No.</th>
                                                  <th>Catigory</th>
                                    			  <th>Title</th>
                                                  <th>Blog Image</th>
                                                  <th>Blog Data</th>
                                                  <th>Publish Date</th>
                                                  <th width="20%">Action</th>
                                                </tr>
                                              </thead>
										                                     <tbody>
                                    		  <?php
                                    		  $v=0;
											  $q="select *from blog_data";
                                    			$res=mysqli_query($conn,$q);
                                    			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                    			{
                                    				$v++;
                                    		  ?>
											   
												<tr>
                                               
												<td><?php echo $v;?></td>
                                                  <td><?php echo $row['related_to'];?>
												  
												      <input type='hidden' id='<?php echo $v; ?>id' value="<?php echo $row['id'];?>">
												  </td>
                                                 <td><?php echo $row['topic'];?>
												    
												  </td>
                                                  <td>
												    <img style="height:100px;width:100px;" src="blog/<?php echo $row['photo'];?>">
												  </td>
												    <td>	
													      <input type='hidden' id='<?php echo $v; ?>' value="<?php echo ($row['content']);?>">
														<button class='btn btn-success' onclick='show(<?php echo $v; ?>)'>Show Blog Details</button>
												  </td>
                                                  <td><?php echo date('d/m/Y',strtotime($row['published_on']));?></td>
                                                 <td><a class='btn btn-success' href="code.php?id=<?php echo $row['id'];?>&val=16">Delete</a>
                                                 <a class='btn btn-success' href="edit_blog.php?id=<?php echo $row['id'];?>">Edit</a></td>
												 
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
  <div class="modal fade" id='modal_reply' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <form type='post' action='customer_enquiry.php'>
      <div class="modal-body">
        <div class="form-group">
         <div class='col-12'><label>Name</label>
		 <input type='hidden' id='ids' name='ids' class='form-control' required>
		 <input type='text' id='namess' name='names' class='form-control' required></div>
         <div class='col-12'><label>Email</label>
		 <input type='text' id='emailss' name='emails' class='form-control'required></div>
         <div class='col-12'><label>Subject</label>
		 <input type='text' id='subss' name='subjects' class='form-control'required></div>
         <div class='col-12'><label>Message</label><br>
		 <textarea rows='5' name='contentss' class='form-control' required ></textarea></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Send</button>
      
      </div>
	  </form>
    </div>
  </div>
</div>
  
    </div>
  </div>
</div>


<?php include ('footer.php');?>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Blog Updated Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Updating Blog Failed",'','warning');
</script>
<?php } ?>


<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==3){?>
<script>
   swal("Blog Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("Deleting Blog Failed",'','warning');
</script>
<?php } ?>



<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>
		
<div class="modal fade" id='modal_assign' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Blog Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 
      <div class="modal-body">
        <div class="form-group">
         
         <div> <br> <span id='qt3'></span></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      
      </div>
    </div>
  </div>
</div>




<script>

function reply(m){
	$('#emailss').val($('#'+m+'email_c').val());
	$('#ids').val($('#'+m+'id').val());
$('#namess').val($('#'+m+'name_c').val());
$('#subss').val( 'Reply:');
$('#modal_reply').modal('show');
}


function show(m){

$('#qt3').html($('#'+m).val());
	
$('#modal_assign').modal('show');
}
</script>	
