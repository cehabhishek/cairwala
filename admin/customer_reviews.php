<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>

     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Customer Reviews</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
										<thead>
												<tr>
												<th>ID</th>
                                                  <th>Product Name</th>
                                    			  <th>Customer Name</th>
                                                  <th>Customer Email Id</th>
                                                  <th>Product Rating</th>
                                                  <th>Comment</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
										                                       <tbody>
                                    		  <?php
                                    		  $v=0;
											  $q="select r.*,p.Name from reviews r join products p on r.product_id=p.ProductID";
                                    			$res=mysqli_query($conn,$q);
                                    			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                    			{
                                    				$v++;
                                    		  ?>
                                                <tr>
                                                  <td><?php echo $v;?></td>
                                                  <td><?php echo $row['Name'];?></td>
                                                  <td><?php echo $row['c_name'];?></td>
                                                  <td><?php echo $row['c_email'];?></td>
                                                  <td><?php echo $row['c_rating'];?></td>
                                                  <td><input type='hidden' id='<?php echo $v; ?>det' value="<?php echo $row['c_comment'];?>">
														<button class='btn btn-success' onclick='show(<?php echo $v; ?>)'>Show</button></td>
                                                  <td class="center"><a href="remove_review.php?id=<?php echo $row['id'];?>" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left:20px">
	  <div><span id='qt3'></span></div>
	  
	  
       

      </div>
      <div class="modal-footer">
		    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  
  

<?php include ('footer.php');?>
<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>
<script>



function show(m){

$('#qt3').html($('#'+m+'det').val());
	
$('#exampleModal').modal('show');
}
</script>	
