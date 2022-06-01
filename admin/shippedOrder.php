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
                  <th>Name</th>
                  <th>Address</th>
                  <th>Total Charge</th>
                  <th>Delivery Status</th>
                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from orders where buystatus='Approved' and DeliveryStatus='false' and cancel_order='0' and Shiped='true' and user_cancel_order='0' and v_id='$_SESSION[login]'");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['Name']?></td>
                          <td><?php echo $row['Address']?></td>
                          <td><?php echo $row['TotalCharge']?></td>
                          
                          <td><?php echo $row['DeliveryStatus']?></td>
                          <!--<td><img src="product_image/<?php //echo $row['Image1']?>" height="50px" width="50px" /></td>-->
                          <td>
                              
                              
                             <a href="order.php?id=<?php echo $row['OrderID'];?>&action=delivered" class="btn btn-success ">Deliver</a>
                              
                              
                          </td>
                        </tr>
                    <?php
                       $count++; }
                    }else{
                        ?>
                    <tr>
                        <td colspan="6">No Data Found!</td>
                    </tr>
                    <?php
                    }
                    ?>
                
               
           </table>
                  </div>
      </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>