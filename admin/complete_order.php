<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>

     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Complete Order</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
										<thead>
												<tr>
											<th>ID</th>
                                              <th>Order Id</th>
                                              <th>Bunddle Id</th>
											  <th>Product Name</th>
											  <th>customer Name</th>
                                              <th>Order Date</th>
                                              <th>Delivery Date</th>
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
                                			$res=mysqli_query($conn,"select o.*,p.Name as pname from orders o join products p on o.ProductID=p.ProductID where Shiped='true' and DeliveryStatus='true' and cancel_order=0 order by OrderID DESC");
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
                                              <td><?php echo $row['delivery_date'];?></td>
                                              <td><?php echo $row['Address'];?></td>
                                              <td class="center"><?php echo $row['TotalCharge'];?></td>
											  <td class="center"><?php echo $row['Quantity'];?></td>
											 <td class="center"><?php  if($row['delivery_charges']==0){echo "No Delivery Charges";}else{
													  echo "Delivery Charge is applicable : Rs ".$row['delivery_charges'];
												  }?></td>
                                              <td class="center"><?php  if($row['DeliveryStatus']=='false'){echo 'Pending';}else{echo'Delivered';}?>
                                              <td class="center"> <a href="#" onclick="del_complete(<?php echo $row['OrderID'];?>)" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a></td>
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


<?php include ('footer.php');?>

 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Order Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Order Deleted Unsuccessfully",'','warning');
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
		  data:'id='+id+'&action=complete_order_delete',
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
		
		
		