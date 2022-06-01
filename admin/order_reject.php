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
          <h4 class="modal-title">Order Rejection Reason</h4>
        </div>
        <div class="modal-body">
			<form action="order.php?id=<?php echo $row['OrderID'];?>&action=delete" method="POST">
				<textarea name="reason" class="form-control" rows="10"></textarea>
			
        </div>
        <div class="modal-footer">
          <button  type="submit" class="btn btn-danger" >Reject</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
