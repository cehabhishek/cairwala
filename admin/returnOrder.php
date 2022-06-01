<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        if($type=='active'){
            $sql="update products set status='1' where ProductID='$id'";
            
        }
        if($type=='deactive'){
            $sql="update products set status='0' where ProductID='$id'";
            
        }
        if($type=='delete'){
            $sql="delete from products where ProductID='$id'";
            
        }
        mysqli_query($conn,$sql);
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Order Management</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Order</li>
        <li><i class="fa fa-angle-right"></i> New Order</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">New Order</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>OrderID</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Total Charge</th>
                  <th>Quantity</th>
                  <th>Order Date</th>
                  <th>Cancel Date</th>
                  
                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                    $v=0;
                        $res=mysqli_query($conn,"select * from orders where buystatus='Rejected' and v_id='$_SESSION[login]'");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            $v++;
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['OrderID']?></td>
                          <td><?php echo $row['Name']?></td>
                          <td><?php echo $row['Mobile']?></td>
                          <td><?php echo $row['TotalCharge']?></td>
                          <td><?php echo $row['Quantity']?></td>
                          <td><?php echo $row['Date']?></td>
                          <td><?php echo $row['order_cancel_date']?></td>
                          
                          <!--<td><?php// echo $row['DeliveryStatus']?></td>-->
                          <!--<td><img src="product_image/<?php //echo $row['Image1']?>" height="50px" width="50px" /></td>-->
                          <td>
                              
                              
                              <a class='btn btn-success' onclick='showall(<?php echo $v;?>)' >View</a>
												     <input type='hidden' id='<?php echo $v; ?>email' value="<?php echo $row['Email'];?>">
												     <input type='hidden' id='<?php echo $v; ?>address' value="<?php echo $row['Address'];?>">
													 <input type='hidden' id='<?php echo $v; ?>onlinePayment' value="<?php echo $row['onlinePayment'];?>">
													 <input type='hidden' id='<?php echo $v; ?>onlinePaymentId' value="<?php echo $row['onlinePaymentId'];?>">
													 <input type='hidden' id='<?php echo $v; ?>DeliveryStatus' value="<?php echo $row['DeliveryStatus'];?>">
													 <input type='hidden' id='<?php echo $v; ?>Shiped' value="<?php echo $row['Shiped'];?>">
                              
                              
                          </td>
                        </tr>
                    <?php
                       $count++; }
                    }else{
                        ?>
                    <tr>
                        <td colspan="9">No Data Found!</td>
                    </tr>
                    <?php
                    }
                    ?>
                
               
           </table>
                  </div>
      </div>
      </div>
  </div>



<div class="modal fade" id='modal_reply' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Cancelled Order Details</h5>
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
</div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
<script>

function showall(m){
$('#email').val($('#'+m+'email').val());
$('#address').val($('#'+m+'address').val());
$('#onlinePayment').val($('#'+m+'onlinePayment').val());
$('#onlinePaymentId').val($('#'+m+'onlinePaymentId').val());
$('#DeliveryStatus').val($('#'+m+'DeliveryStatus').val());
$('#Shiped').val($('#'+m+'Shiped').val());
	
$('#modal_reply').modal('show');
}
</script>	