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
      <h4 class="text-black">Rejected Order List(Admin Rejected)</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
												  <th>S.No.</th>
                                                  <th>Order Id</th>
                                                  <th>Bunddle Id</th>
                                                  <th>Product Name</th>
                                    			  <th>Customer Name</th>
                                                  
                                                  <th>Customer Mobile</th>
                                                  
                                                  <!--<th>Total Charge </th>
                                                  <th>Quantity</th>-->
                                                  <th>Ordered Date</th>
                                                  <th>Rejected Reason</th>
                                                 <th>Action</th>
                                                </tr>
                                              </thead>
										                        <tbody>
                                    		  <?php
                                    		  $v=0;
											  $q="select o.*,r.reason,p.Name as pname from orders o join orderreject r on o.OrderID=r.OrderID join products p on o.ProductID=p.ProductID  where o.buystatus='Rejected'";
                                    			$res=mysqli_query($conn,$q);
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
                                                 
                                                  <td><?php echo $row['Mobile'];?></td>
                                                  
                                                 <!-- <td><?php echo $row['TotalCharge'];?></td>
                                                  <td><?php echo $row['Quantity'];?></td>-->
                                                  
                                                  <td><?php echo date('d/m/y h:i:s',strtotime($row['Date']));?></td>
                                                 
												 <td><?php echo $row['reason']; ?></td>
                                                 <td> <a href="#" onclick="del_complete(<?php echo $row['OrderID'];?>)" ><i class="fa fa-trash"></i></a></td>

											   <!--  <td><a class='btn btn-success' onclick='showall(<?php echo $v;?>)' >View</a>
												     <input type='hidden' id='<?php echo $v; ?>email' value="<?php echo $row['Email'];?>">
												     <input type='hidden' id='<?php echo $v; ?>address' value="<?php echo $row['Address'];?>">
													 <input type='hidden' id='<?php echo $v; ?>onlinePayment' value="<?php echo $row['onlinePayment'];?>">
													 <input type='hidden' id='<?php echo $v; ?>onlinePaymentId' value="<?php echo $row['onlinePaymentId'];?>">
													 <input type='hidden' id='<?php echo $v; ?>DeliveryStatus' value="<?php if($row['DeliveryStatus']=='false'){echo 'Not Delivered';}else{echo'Delivered';}?>">
													 <input type='hidden' id='<?php echo $v; ?>Shiped' value="<?php echo $row['Shiped'];?>">
												  </td>-->
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

  <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <div class="form-group">
         <div class='col-12'><label>Email</label>
		 <input type='text' id='email' name='email' class='form-control' required>
		</div>
         <div class='col-12'><label>Address</label>
		 <input type='text' id='address' name='address' class='form-control'required></div>
         <div class='col-12'><label>Online Payment</label>
		 <input type='text' id='onlinePayment' name='onlinePayment' class='form-control'required></div>
		 <div class='col-12'><label>Online Payment Id</label>
		 <input type='text' id='onlinePaymentId' name='onlinePaymentId' class='form-control'required></div>
         <div class='col-12'><label>Delivery Status</label>
		 <input type='text' id='DeliveryStatus' name='DeliveryStatus' class='form-control'required>
		</div>
		<div class='col-12'><label>Shiped Status</label>
		 <input type='text' id='Shiped' name='Shiped' class='form-control'required>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>-->


<?php include ('footer.php');?>

<script>
/*
function showall(m){
$('#email').val($('#'+m+'email').val());
$('#address').val($('#'+m+'address').val());
$('#onlinePayment').val($('#'+m+'onlinePayment').val());
$('#onlinePaymentId').val($('#'+m+'onlinePaymentId').val());
$('#DeliveryStatus').val($('#'+m+'DeliveryStatus').val());
$('#Shiped').val($('#'+m+'Shiped').val());
	
$('#exampleModal').modal('show');
}*/
</script>

<?php
}

else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
?>
		
<script>
		$(function(){
		  $('#example3_wrapper').removeClass('form-inline');
		  });
		</script>
		
<script>
function del_complete(id){
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this order!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
	 if (willDelete){ 
      $.ajax({
		  url:'order.php',
		  data:'id='+id+'&action=rejected_order_delete',
		  type:'Post',
		  success:function(ds){
			  if (ds) {
					swal("Order deleted successfully!", {
					  icon: "success",
					});
					 setTimeout(function() {
					 window.location.reload();
				  }, 2500);
				  } else {
					swal("Deleting order unsuccessful!");
				  }
		  }
	  });
    }
});

}





</script>		
		