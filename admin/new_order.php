<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>

     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">New Orders</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
												<th>S.No</th>
                                                  <th>Order Id</th>
												  <th>Bunddle Id</th>
												  <th>Name</th>
                                    			  <th>Order Date</th>
                                    			  <th>Address</th>
                                                  <th>Total Charge*</th>
                                                  <th>Quantity</th>
                                                  <th>Payment Type</th>
                                                  <th>Delivery Charge Remark</th>
                                                 <!-- <th>Delivery Status</th>-->
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
										                            <tbody>
                                    		  <?php
                                    		  $v=0;
											  $sql="select * from orders where buystatus='Pending' and cancel_order=0 order by OrderID DESC";
                                    			$res=mysqli_query($conn,$sql);
                                    			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                    			{
                                    			    $_SESSION['C_name']=$row['Name'];
                                    			    $_SESSION['C_mobile']=$row['Mobile'];
                                    				$v++;
                                    		  ?>
                                                <tr>
                                                  <td><?php echo $v;?></td>
                                                  <td>CHIWLA<?php echo $row['OrderID'];?></td>
                                                  <td><?php echo $row['SystemId'];?></td>
                                                  <td><?php echo $row['Name'];?></td>
                                                  <td><?php echo $row['Date'];?></td>
                                                  <td><?php echo $row['Address'];?></td>
                                                  <td class="center"><?php echo $row['TotalCharge'];?></td>
                                                  <td class="center"><?php echo $row['Quantity'];?></td>
                                                  <td class="center"><?php if($row['onlinePayment']=="Paid Online"){echo "Prepaid";}else{echo "COD";}?></td>
                                                  <td class="center"><?php  if($row['delivery_charges']==0){echo "No Delivery Charges";}else{
													  echo "Delivery Charge is applicable : Rs ".$row['delivery_charges'];
												  }?></td>
                                                  <!--<td class="center"><?php //echo $row['DeliveryStatus'];?></td>-->
                                                  <td class="center"><a href="javascript:view(0);"onclick="calling(<?php echo $row['OrderID'];?>)" class="btn btn-circle btn-success "><i class="fa fa-eye"></i></a>
												   <a href="javascript:void(0);" class="btn btn-circle btn-danger" style="padding: 10px 22px!important;margin-top: 5px;" onclick="canceled(<?php echo $row['OrderID'];?>)"><i class="fa fa-times"></i></a>
												  </td>
                                                </tr>
                                    			<?php
                                    			}
                                    			?>
											</tbody>
											*Total Charge=Price of sigle item x item Quantity + GST%
										</table>
                  </div>
      </div>
      </div>
  </div>
  
  
    </div>
  </div>
</div>


<?php include ('footer.php');?>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Order Accepted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Order Accepted Unsuccessful",'','warning');
</script>
<?php } ?>


<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==3){?>
<script>
   swal("Order Rejected Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==4){?>
<script>
   swal("Order Rejected Unsuccessful",'','warning');
</script>
<?php } ?>


<?php
}

else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>
		
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left:20px">
	  <div  id='set'class="row">
	  </div>
	  
	   <input id='fixes' type='hidden' value=''>
       

      </div>
      <div class="modal-footer">
		   <a id="acpt" href="" class="btn btn-success" >Order Accept</a>
		     <a id="" href="javascript:void(0)" onclick="callmod()" class="btn btn-danger" >Order Reject</a>
		   <a id="delt" href="" class="btn btn-warning" >Delete Order</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left:20px">
	    <form id='rejform' action="" method="POST">
				<textarea name="reason" class="form-control" rows="10"></textarea>
	     
     

      </div>
      <div class="modal-footer">
		    <button  type="submit" class="btn btn-danger" >Order Reject</button>
		  </form>   
      </div>
    </div>
  </div>
</div>


<script>
		$(function(){
		  $('#example3_wrapper').removeClass('form-inline');
		  });
		</script>
		
	 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==7){?>
<script>
   swal("Order Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==8){?>
<script>
   swal("Deleting Order Unsuccessful",'','warning');
</script>
<?php } ?>


 <script>
 function calling(datas){
	 
	 $.post('order_data.php',{id:datas},function(data, status){

	  $('#set').html(data);
	   $('#acpt').attr('href','order.php?id='+datas+'&action=proceed');
	  // $('#rejt').attr('href','order_reject.php?id='+datas);
	   $('#delt').attr('href','order_delete_new.php?id='+datas);
	    $('#fixes').val(datas); 
	 });
	
$('#exampleModal').modal('show');	 
 }
 function callmod(){
	  var datas=$('#fixes').val();
	 $('#rejform').attr('action','order.php?id='+datas+'&action=delete');
	$('#exampleModal').modal('hide');	
	$('#exampleModals').modal('show');	
	
}
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
	   
		