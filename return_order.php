<?php
 $id=base64_decode($_REQUEST['id']);
 include('db.php');
 $query=mysqli_query($conn,"update orders set order_return='1' where OrderID='$id'");

?>