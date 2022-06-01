<?php include('header.php');?>
<style>
caption
{
	display:none;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Dashboard</h1>
	  
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 
      <!-- Small boxes (Stat box) -->
	  			<?php
include('connection.php');
$query="select count(*) from orders";
$query1="select count(*) from orders";
$query2="select count(*) from contact ";
$query3="select count(*)  from img";
 $res=mysqli_query($conn,$query);
 $res1=mysqli_query($conn,$query1);
 $res2=mysqli_query($conn,$query2);
 $res3=mysqli_query($conn,$query3);
 $row=mysqli_fetch_assoc($res);
 $row1=mysqli_fetch_assoc($res1);
 $row2=mysqli_fetch_assoc($res2);
 $row3=mysqli_fetch_assoc($res3);
 //print_r($row); 
?>
      <div class="row">
        
         <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class=" fa fa-cart-arrow-down"></i></span>
                           <div class="media">
									<div class="media-body">
									   <?php 
									     //// $sql33="select * from orders o join products p on o.ProductID=p.ProductID  where o.buystatus='Pending' and o.cancel_order=0";
                                    			
			                                     $sql33="select * from orders o where o.buystatus='Pending' and o.cancel_order=0";
                                    			$res44=mysqli_query($conn,$sql33);
												  $row31=mysqli_num_rows($res44);
												?>
										<h2 class="f-light"><?php echo $row31;?></h2>
										<p class="mb-0">New Order</p>
									</div>
									<span class="icon fa fa-exclamation-circle"></span>
								</div>
								<div class="progress progress-sm rounded-0 light mt-3">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $row31;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>

        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-truck text-white"></i></span>
                           <div class="media">
									<div class="media-body">
									    <?php
									    $sql1=mysqli_query($conn,"select o.* from orders o join products p on o.ProductID=p.ProductID  where o.DeliveryStatus='false' and o.cancel_order=0 and buystatus!='Rejected'");
									    $row1=mysqli_num_rows($sql1);
									    ?>
										<h2 class="f-light"><?php echo $row1;?></h2>
										<p class="mb-0">Pending Order</p>
									</div>
									<span class="icon fa fa-exclamation-circle"></span>
								</div>
								<div class="progress progress-sm rounded-0 light mt-3">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $row1;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="ti-thumb-up"></i></span>
            <div class="media">
									<div class="media-body">
									    <?php
									    $sql2=mysqli_query($conn,"select * from orders where DeliveryStatus='true' and cancel_order=0");
									    $row2=mysqli_num_rows($sql2);
									    ?>
										<h2 class="f-light"><?php echo $row2;?></h2>
										<p class="mb-0">Total Delivered</p>
									</div>
									<span class="icon fa fa-info-circle"></span>
								</div>
								<div class="progress progress-sm rounded-0 light mt-3">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $row2;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
        <!-- /.col -->
		<div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="fa fa-user"></i></span>
            <div class="media mb-2">
									<div class="media-body">
									    <?php
									    $sql5=mysqli_query($conn,"select * from register");
									    $row5=mysqli_num_rows($sql5);
									    ?>
										<h4><?php echo $row5;?></h4>
										<p class="mb-0">Our Users</p>
									</div>
									<span class="icon fa fa-users"></span>
								</div>
								
								  	<div class="progress progress-sm rounded-0 bottom light">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $row5;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
		<div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class=" fa fa-cart-arrow-down"></i></span>
           <div class="media mb-2">
									<div class="media-body">
									     <?php
									    $sql6=mysqli_query($conn,"select o.* from orders o join products p on o.ProductID=p.ProductID where o.cancel_order=1");
									    $row6=mysqli_num_rows($sql6);
									    ?>
										<h4><?php echo $row6;?></h4>
										<p class="mb-0">CANCELLED ORDERS</p>
									</div>
									<span class="icon fa fa-info-circle"></span>
								</div>
							
								  	<div class="progress progress-sm rounded-0 bottom light">
									<div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $row6;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
            <!-- /.info-box-content --> 
          </div>
          <!-- /.info-box --> 
        </div>
		<!--<div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white"><a  href="AddProduct.php" style="color:white;">Add New Product</a></h6>
              <h1 class="text-white" style="    height: 41px;"></h1>
              <span class="progress-description text-white"> <a  href="AddProduct.php" style="color:white;">Add New Product</a> </span> </div>
            <!-- /.info-box-content  
          </div>
          <!-- /.info-box
        </div>-->
        <!-- /.col --> 
      </hr>
          </div>
		 
		
		

          <div class="info-box">
      <h4 class="text-black">Today's Order</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
												<th>S.No</th>
                                                  <th>Order Id</th>
                                                  <th>Bunddle Id</th>
												  <th>Name</th>
                                    			  <th>Order Date</th>
                                    			  <!--<th>Address</th>-->
                                                  <!--<th>Total Price</th>-->
                                                  <th>Quantity</th>
                                                  <th>Payment Type</th>
												  <!--<th>Delivery Charge Remark</th>-->
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
                                    				$v++;
                                    		  ?>
                                                <tr>
                                                  <td><?php echo $v;?></td>
                                                  <td>CHIWLA<?php echo $row['OrderID'];?></td>
                                                  <td><?php echo $row['SystemId'];?></td>
                                                  <td><?php echo $row['Name'];?></td>
                                                  <td><?php echo $row['Date'];?></td>
                                                 <!-- <td><?php echo $row['Address'];?></td>-->
                                                  <!--<td class="center"><?php echo $row['TotalCharge'];?></td>-->
												   <td class="center"><?php echo $row['Quantity'];?></td>
												<td class="center"><?php if($row['onlinePayment']=="Paid Online"){echo "Prepaid";}else{echo "COD";}?></td>
												 <!---<td class="center"><?php  if($row['delivery_charges']==0){echo "No Delivery Charges";}else{
													  echo "Delivery Charge is applicable : Rs ".$row['delivery_charges'];
												  }?></td>-->
                                                  <!--<td class="center"><?php //echo $row['DeliveryStatus'];?></td>-->
                                                  <td class="center">
												  <a href="#" class="btn btn-circle btn-success" onclick="calling(<?php echo $row['OrderID'];?>)"><i class="fa fa-eye"></i></a>
												  <a href="javascript:void(0);" style="padding: 10px 22px!important;margin-top: 5px;" class="btn btn-circle btn-danger" onclick="canceled(<?php echo $row['OrderID'];?>)"><i class="fa fa-times"></i></a>
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


  
  <!-- /.content-wrapper -->
<?php include('footer.php');?>

 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Order Deleted Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
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
	   $('#delt').attr('href','order_delete.php?id='+datas);
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
	   
	   
	   