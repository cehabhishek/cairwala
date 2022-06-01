<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Order Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function(){
          $('#myModal').modal('show');
      });
  </script>
</head>
<body>
<?php
$OrderID=$_REQUEST['id'];
require('connection.php');
$sql=mysqli_query($conn,"select * from orders where OrderID=$OrderID");
$row=mysqli_fetch_array($sql,MYSQLI_BOTH);
$pid=$row['ProductID'];
$sql1=mysqli_query($conn,"select * from products where ProductID=$pid");
$row1=mysqli_fetch_array($sql1,MYSQLI_BOTH);
?>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <a href="new_order.php" class="close"> &times;</a>
          <h4 class="modal-title">View Order</h4>
        </div>
        <div class="modal-body">
		
			<a href="../../Product.php?pt=<?php echo $row1['Category'];?>"><img src="product_image/<?php echo $row1['Image1'];?>" height="100px" width="100px"></a><br><br>
			<h3><strong>Product Detail</strong></h3>
			<span><strong>Order Name : </strong></span><span> <?php echo $row1['Name'];?></span><br><br>
			<span><strong>Price : </strong></span><span> <?php echo $row1['Price'];?></span><br><br>
			<span><strong>Total Price : </strong></span><span> <?php echo $row['TotalCharge'];?></span>
			<h3><strong>Customer Detail</strong></h3>
			<span><strong>Customer Name : </strong></span><span> <?php echo $row['Name'];?></span><br><br>
			<span><strong>Customer Email : </strong></span><span> <?php echo $row['Email'];?></span><br><br>
			<span><strong>Customer Number : </strong></span><span> <?php echo $row['Mobile'];?></span><br><br>
			
        </div>
        <div class="modal-footer">
          <a href="order.php?id=<?php echo $row['OrderID'];?>&action=proceed" class="btn btn-success" >Order Accept</a>
          <a href="order_reject.php?id=<?php echo $row['OrderID'];?>" class="btn btn-danger" >Order Reject</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
