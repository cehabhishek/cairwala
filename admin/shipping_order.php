<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>

     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Shipping Order</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
										<thead>
												<tr>
											<th>ID</th>
                                              <th>Order Id</th>
                                              <th>Bunddle Id</th>
                                              <th>Product Name</th>
                                              <th>Customer Name</th>
                                			  <th>Order Date</th>
                                			  <th>Address</th>
                                              <th>Total Charge</th>
                                              <th>Quantity</th>
											  <th>Delivery Charge Remark</th>
                                              <th>Delivery Status</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
										                         <tbody>
                                		  <?php
                                		  $v=0;
                                			$res=mysqli_query($conn,"select o.*,p.Name as pname from orders o join products p on o.ProductID=p.ProductID where buystatus='Approved' and DeliveryStatus='false' and Shiped = 'true' and cancel_order=0 order by OrderID DESC");
                                			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                			{
                                				$v++;
                                		  ?>
                                            <tr>
                                              <td><?php echo $v;?></td>
                                               <td>CHIWLA<?php echo $row['OrderID'];?></td>
                                              <td><?php echo $row['SystemId'];?></td>
                                              <td><?php echo $row['pname'];?></td>
                                              <td><?php echo $row['Name'];?></td>
                                              <td><?php echo $row['Date'];?></td>
                                              <td><?php echo $row['Address'];?></td>
                                              <td class="center"><?php echo $row['TotalCharge'];?></td>
											   <td class="center"><?php echo $row['Quantity'];?></td>
											   <td class="center"><?php  if($row['delivery_charges']==0){echo "No Delivery Charges";}else{
													  echo "Delivery Charge is applicable : Rs ".$row['delivery_charges'];
												  }?></td>
                                              <td class="center"><?php  if($row['DeliveryStatus']=='false'){echo 'Pending'; }else{echo'Delivered';}?></td>
                                              <td class="center"> <a href="order.php?id=<?php echo $row['OrderID'];?>&action=delivered" class="btn btn-success ">Delivered</a>
											  <!--<a href="javascript:void(0);" style="padding: 10px 28px!important;margin-top: 5px;"class="btn btn-circle btn-danger" onclick="canceled(<?php echo $row['OrderID'];?>)">Cancel</a>-->
											  <?php $tracking_lnk=$row['tracking'];?>
											  <a href="javascript:void(0);" style="padding: 10px 28px!important;margin-top: 5px;"class="btn btn-circle btn-danger" onclick="track('<?php echo $tracking_lnk;?>')">tracking link</a>
											  
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
  
  
    </div>
  </div>
</div>

<div class="modal fade" id="tracks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tracking Link </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body" style="padding-left:20px">
	        <a  href="" target="_blank" id="traking_linkss" >Click to see the delivery status of product</a>
			
           <p><span id='hhs'> </span></p>			
      </div>
      <div class="modal-footer">
		   <button  type="button" class="btn btn-danger" data-dismiss="modal" value="" >Close</button>  
	  </div>
	  
    </div>
  </div>
</div>


<?php include ('footer.php');?>

 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Item Delevery Data Updation Successful",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Item Delevery Data Updation Unsuccessful",'','warning');
</script>
<?php } ?>


<?php
}

else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>

<script>
function track(trk){
	$("#traking_linkss").attr("href",trk);
	$("#hhs").html(trk);
	
	$('#tracks').modal('show');
}


</script>
		
<script>
		$(function(){
		  $('#example3_wrapper').removeClass('form-inline');
		  });
</script>

<script>
function canceled(datas){
	
	swal({
  title: "Are you sure to cancel the order?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
	  
	  $.post('order_cancel_code.php',{id:datas},function(data, status){
		        if(data==1){
				   swal("Order cancelled successfully", {
			         icon: "success",
				});
				 setTimeout(function() {
					 window.location.reload();
				  }, 3000);
				}
				else{
					  swal("Cancelling order unsuccessful!Please try after some time", {
			         icon: "warning",
				 });
				}
				
	});
	 
   
  } else {
    
  }
});
	
	
}	 		 
</script>
		
		