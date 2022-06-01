<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>
<style>
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(../assets/loader.gif) no-repeat center center;
  z-index: 10000;
}</style>
     <div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Processed Order</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
											<th>S.no</th>
                                              <th>Order Id</th>
                                              <th>Bunddle Id</th>
                                              <th>product Name</th>
                                              <th>Customer Name</th>
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
										  $sqls="select o.*,p.Name as pname from orders o join products p on o.ProductID=p.ProductID  where buystatus='Approved' and DeliveryStatus='false' and Shiped is Null and cancel_order=0 order by OrderID DESC";
                                			$res=mysqli_query($conn,$sqls);
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
											  <td class="center"><?php if($row['onlinePayment']=="Paid Online"){echo "Prepaid";}else{echo "COD";}?></td>
											   <td class="center"><?php  if($row['delivery_charges']==0){echo "No Delivery Charges";}else{
													  echo "Delivery Charge is applicable : Rs ".$row['delivery_charges'];
												  }?></td>
                                             <!--<td class="center"><?php //echo $row['DeliveryStatus'];?></td>-->
                                              <td>
											 <a href="tracking_order.php?id=<?php echo $row['OrderID'];?>" class="btn btn-success">Tracking</a>
											  <!--<a href="javascript:void(0)" onclick="callmod(<?php //echo $row['OrderID'];?>)" class="btn btn-success">Tracking</a> -->
											  
										
											  <?php if(empty($row['ship_rocket_order_id']) && empty($row['shipment_id'])){ ?>
											  <!--<a href="javascript:void(0)" onclick="callmod_ship(<?php // echo $row['OrderID'];?>)" class="btn btn-success">Create Shipment</a>
											  <?php } ?>-->
											  
											   <?php if(!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id']) && empty($row['awb_code'])){ ?>
											  <!--<a href="javascript:void(0)" onclick="callmod_courier(<?php //echo $row['shipment_id'];?>)" class="btn btn-success">Asign courier</a>-->
											  <?php } ?>

											  <?php if(!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id']) && !empty($row['awb_code']) && empty($row['pick_up'])){ ?>
											  <a href="javascript:void(0)" onclick="callmod_courier_pick(<?php echo $row['shipment_id'];?>)" class="btn btn-success">Req. For Pick Items</a>
											  <?php } ?>
											  
											    <?php if(!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id']) && !empty($row['awb_code']) && !empty($row['pick_up'])){ ?><br>
												   <a href="javascript:void(0)" onclick="callmod_invoice(<?php echo $row['shipment_id'];?>,<?php echo $row['ship_rocket_order_id'];?>)" class="btn btn-success">Download inv,lbl,manifest</a>
												<?php }?>
												
											  <?php if(!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id']) && !empty($row['awb_code']) && !empty($row['pick_up'])){ ?>
											  <a href="javascript:void(0)" onclick="callmod_get_trk_link(<?php echo $row['shipment_id'];?>,<?php echo $row['awb_code'];?>)" class="btn btn-success mt-2">Generate Tracking link</a>
											<?php } ?>
												
											  <!-- order cancel -->
											   <?php if (empty($row['ship_rocket_order_id']) && empty($row['shipment_id'])){ ?>
                                                <a href="javascript:void(0);" style="padding: 10px 25px!important;margin-top: 5px;"class="btn btn-circle btn-danger" onclick="canceled(<?php echo $row['OrderID'];?>)">Cancel</a>
											   <?php }?>
											   <!-- order + shipment cancel-->
											    <?php if (!empty($row['ship_rocket_order_id']) && !empty($row['shipment_id'])){ ?>
                                                <a href="javascript:void(0);" style="padding: 10px 25px!important;margin-top: 5px;"class="btn btn-circle btn-danger" onclick="cancel_shipment(<?php echo $row['ship_rocket_order_id'];?>)">Cancel</a>
											   <?php }?>
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




 <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tracking order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left:20px">
	    		<form id='trkform' action="order.php?id=<?php echo $row['OrderID'];?>&action=shipping" method="POST">
				<span>Tracking ID : <span><br><input type="text" name="tid" class="form-control" required /><br> 
				<span>Tracking Link : <span><br><input type="text" name="tlink" class="form-control" required /><br> 
      </div>
      <div class="modal-footer">
		    <button  type="submit" class="btn btn-danger" value="" >Add</button>
		  </form>   
      </div>
    </div>
  </div>
</div>


 <div class="modal fade" id="orderPlaceSR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Place Order For shipments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-left:20px">
	    		<form id='' action="shipment_create_order.php" method="POST">
				 <input type="hidden" id="sr_order_id" name="OrderID" value=''>
				<span>Package box length (in cm) : <span><br><input type="text" name="lenght" class="form-control" required /><br> 
				<span>Package box width (in cm): <span><br><input type="text" name="width" class="form-control" required /><br> 
				<span>Package box height (in cm): <span><br><input type="text" name="height" class="form-control" required /><br> 
				<span>Package box weight (in kg ex:1.200 or 0.259): <span><br><input type="text" name="weight" class="form-control" required /><br> 
      </div>
      <div class="modal-footer">
		    <button  type="submit" class="btn btn-danger" value="" >Place shipment Order</button>
		  </form>   
      </div>
    </div>
  </div>
</div>


 <div class="modal fade" id="orderPSR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asign courier to shipments </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body" style="padding-left:20px">
	        <form id='' action="shipment_asign_courier.php" method="POST">
				 <input  type="hidden" value="" name="shipment_id" id="sr_shipment_id" />	
                <label>courier Patner (optional)</label>                 
				<select class="form-control" name="courier_id">
					<option value="" selected>Select Your courier Patner</option>
					<option value="1">Blue Dart</option>
					<option value="2">FedEx</option>
					<option value="7">FEDEX PACKAGING#</option>
					<option value="8">DHL Packet International#</option>
					<option value="10">Delhivery</option>
					<option value="12">FedEx Surface 10 Kg</option>
					<option value="14">Ecom Express</option>
					<option value="16">Dotzot</option>
					<option value="33">Xpressbees</option>
					<option value="35">Aramex International#</option>
					<option value="37">DHL PACKET PLUS INTERNATIONAL#</option>
					<option value="38">DHL PARCEL INTERNATIONAL DIRECT#</option>
					<option value="39">Delhivery Surface 5 Kgs</option>
					<option value="40">Gati Surface 5 Kg</option>
					<option value="41">FedEx Flat Rate</option>
					<option value="42">FedEx Surface 5 Kg</option>
					<option value="43">Delhivery Surface</option>
					<option value="44">Delhivery Surface 2 Kgs</option>
					<option value="48">Ekart Logistics</option>
					<option value="50">Wow Express</option>
					<option value="51">Xpressbees Surface</option>
					<option value="52">RAPID DELIVERY</option>
					<option value="53">Gati Surface 1 Kg</option>
					<option value="54">Ekart Logistics Surface</option>
					<option value="55">Blue Dart Surface</option>
					<option value="56">DHL Express International</option>
					<option value="57">Professional</option>
					<option value="58">Shadowfax Surface</option>
					<option value="60">Ecom Express ROS</option>
					<option value="62" >FedEx Surface 1 Kg</option>
					<option value="63" >Delhivery Flash</option>
					<option value="68" >Delhivery Essential Surface</option>
					<option value="80">Delhivery Reverse QC</option>
					<option value="95" >Shadowfax Local</option>
					<option value="96" >Shadowfax Essential Surface</option>
					<option value="97" >Dunzo Local</option>
					<option value="99" >Ecom Express ROS Reverse</option>
					<option value="100" >Delhivery Surface 10 Kgs</option>
					<option value="101" >Delhivery Surface 20 Kgs</option>
					<option value="102" >Delhivery Essential Surface 5Kg</option>
					<option value="103" >Xpressbees Essential Surface</option>
					<option value="104" >Delhivery Essential Surface 2Kg</option>
					<option value="106" >Wefast Local</option>
					<option value="107" >Wefast Local 5 Kg</option>
					<option value="108" >Ecom Express Essential</option>
					<option value="109" >Ecom Express ROS Essential</option>
					<option value="110" >Delhivery Essential</option>
					<option value="111" >Delhivery Non Essential</option>
				 </select>		
				 <br>
				  <p style="color:green">Note: The couriers marked '#' are for international shipments.</p>
				  <p style="color:red">Note: If You will not select any courier ,then system will select one of the best courier for your shipment.</p> 
				 <br>
				 <button  type="submit" class="btn btn-danger" value="" >Asign courier</button> 
			</form> 		 
      </div>
      <div class="modal-footer">
		   <button  type="button" class="btn btn-danger" data-dismiss="modal" value="" >Close</button>  
	  </div>
	  
    </div>
  </div>
</div>

<div class="modal fade" id="orderPickSR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pick Item Request To Courier </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body" style="padding-left:20px">
	        <form id='' action="shipment_pick_item_courier.php" method="POST">
				 <input  type="hidden" value="" name="shipment_id" id="sr_pick_shipment_id" />	
				 <button  type="submit" class="btn btn-danger" value="" >Request For Pick Item To Courier</button> 
			</form> 		 
      </div>
      <div class="modal-footer">
		   <button  type="button" class="btn btn-danger" data-dismiss="modal" value="" >Close</button>  
	  </div>
	  
    </div>
  </div>
</div>

<div class="modal fade" id="orderInvoiceSR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate & Download Invoice , Label, Manifest </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body" style="padding-left:20px">
	    
				 <input  type="hidden" value="" name="shipment_id" id="inv_shipment_id" />	
				 <input  type="hidden" value="" name="order_id" id="inv_order_id" />	
				<div class="row">
				   <div class="col-md-12 mb-2">
				   <button  type="button" class="btn btn-danger" onclick="generate_invoice();" >Request To Generate Invoice</button> 
				   <a class="pull-right" id='inv' href="" download style="display:none">Click To Download Invoice</a>
				   </div>
				 </div>
				 <div class="row">
				 <div class="col-md-12 mb-2">
				 <button  type="button" class="btn btn-warning" onclick="generate_label();" >Request To Generate Label</button> 
				 <a class="pull-right" id='lab' href="" download style="display:none">Click To Download Label</a>
				 </div>
				 </div>
				<div class="row">
				<div class="col-md-12 mb-2">
				<button  type="button" class="btn btn-success" onclick="generate_manifest();" >Request To Generate Manifest</button> 
				<a class="pull-right" id='mani' href="" download style="display:none">Click To Download Manifest</a>
				</div>
				</div>
		 		 <center><img id='wait' alt='please wait processing' src="assets/wait.gif" style="height:100px;width:180px;display:none"/></center>
      </div>
      <div class="modal-footer">
		   <button  type="button" class="btn btn-danger" data-dismiss="modal" value="" >Close</button>  
	  </div>
	  
    </div>
  </div>
</div>


<?php include ('footer.php');?>
<div id="loader"></div>
 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Shipped Tracking Data Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Shipped Tracking Data Added Unsuccessfully",'','warning');
</script>
<?php } ?>

/
<!--*********************ship rocket********************/  -->
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==96){?>
<script>
   swal("Requested Courier For Picking Item/s Successfully",'','success');
</script>
<?php } ?>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==95){?>
<script>
   swal("Courier Asigned Successfully",'','success');
</script>
<?php } ?>


<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==94){?>
<script>
   swal("Invaild data ",'','warning');
</script>
<?php } ?>



<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==93){?>
<script>
   swal("successfully place order for shiping ",'','success');
</script>
<?php } ?>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==92){?>
<script>
   swal("Error occur plz use ship rocket panel to ship this order",'','warning');
</script>
<?php } ?>


<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==91){?>
<script>
   swal("Data is not formatted ",'','warning');
</script>
<?php } ?>



<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==90){?>
<script>
   swal("Order id (sys) does not exits ",'','warning');
</script>
<?php } ?>

<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==89){?>
<script>
   swal("Order id does not exits",'','warning');
</script>
<?php } ?>


<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==88){?>
<script>
   swal("Ship rocket auth error ",'','warning');
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

function callmod(datas){
	
	 $('#trkform').attr('action','order.php?id='+datas+'&action=shipping');
	
	$('#exampleModals').modal('show');	
	
}
</script>


 <script>

function callmod_ship(datas){
	
	 $("#sr_order_id").val(datas);
	$('#orderPlaceSR').modal('show');	
	
}
</script>
 <script>

function callmod_courier(datas){
	
	 $("#sr_shipment_id").val(datas);
	$('#orderPSR').modal('show');	
	
}
</script>
 <script>

function callmod_courier_pick(datas){
	
	 $("#sr_pick_shipment_id").val(datas);
	$('#orderPickSR').modal('show');	
	
}
</script>

 <script>

function callmod_invoice(shipmentId,orderId){

	 $("#inv_shipment_id").val(shipmentId);
	 $("#inv_order_id").val(orderId);
	$('#orderInvoiceSR').modal('show');	
	
}
</script>
<script>
  function generate_invoice(){
	  var order_id=$('#inv_order_id').val();
	  $('#wait').css('display','block');
	  $.ajax({
		  url:"shipment_invoice_gen.php",
		  data:"order_id="+order_id,
		  type:'POST',
		  dataType:'json',
		  success:function(d){
			  if(d.status==1){
				  $('#wait').css('display','none'); 
				  $('#inv').attr('href',d.url);
				  $('#inv').css('display','block'); 
			  }
			  if(d.status==0)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
			   if(d.status==2)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
		  }
		  
	  });
	  
  }
</script>
	
<script>
  function generate_label(){
	  var shipment_id=$('#inv_shipment_id').val();
	  $('#wait').css('display','block');
	  $.ajax({
		  url:"shipment_label_gen.php",
		  data:"shipment_id="+shipment_id,
		  type:'POST',
		  dataType:'json',
		  success:function(d){
			  if(d.status==1){
				  $('#wait').css('display','none'); 
				  $('#lab').attr('href',d.url);
				  $('#lab').css('display','block'); 
			  }
			  if(d.status==0)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
			   if(d.status==2)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
		  }
		  
	  });
	  
  }
</script>	

<script>
  function generate_manifest(){
	  var shipment_id=$('#inv_shipment_id').val();
	  $('#wait').css('display','block');
	  $.ajax({
		  url:"shipment_manifest_gen.php",
		  data:"shipment_id="+shipment_id,
		  type:'POST',
		  dataType:'json',
		  success:function(d){
			  if(d.status==1){
				  $('#wait').css('display','none'); 
				  $('#mani').attr('href',d.url);
				  $('#mani').css('display','block'); 
			  }
			  if(d.status==0)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
			   if(d.status==2)
			  {
				  $('#wait').css('display','none'); 
                   swal(d.msg,'','warning'); 				  
			  }
		  }
		  
	  });
	  
  }
</script>

<script>
function cancel_shipment(datas){
		swal({
  title: "Are you sure to cancel the Bunddle order?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
	  $('#loader').show();
	  $.post('shipment_order_cancel.php',{order_id:datas},function(data, status){
		        if(data==1){   $('#loader').hide();
				   swal("Order cancelled successfully", {
			         icon: "success",
				});
				 setTimeout(function() {
					  window.location.href="processed_order.php";
				  }, 3000);
				}
				else{  $('#loader').hide();
					  swal("Cancelling order unsuccessful!Please try after some time", {
			         icon: "warning",
				 });
				}
				
	});
	 
   
  } else {
    $('#loader').hide();
  }
});
}


</script>

<script>
function callmod_get_trk_link(shiped_id,awb){
		swal({
  title: "Please generate and download Invoice,Label and Manifest before generating tracking link.Once tracking link generated you are not able to generate and download Invoice,Label and Manifest. ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
	  $('#loader').show();
	  $.ajax({
		  url:"shipment_tracking_link_gen.php",
		  type:'POST',
		  data:{shipment_id:shiped_id,awb_code:awb},
		  dataType:'json',
		  success:function(d){
			   $('#loader').hide();
				if(d.status==1){
			       swal(d.msg,'','success');
				}
				if(d.status==2){
			       swal(d.msg,'','warning');
				}
				if(d.status==3){
			       swal(d.msg,'','warning');
				}
				if(d.status==4){
			       swal(d.msg,'','warning');
				}
				if(d.status==5){
			       swal(d.msg,'','warning');
				}
				if(d.status==6){
			       swal(d.msg,'','warning');
				}
				
		  }
	  });
 
  } else {
    $('#loader').hide();
  }
});
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
					 window.location.href="processed_order.php";
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