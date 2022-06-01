<?php
require('connection.php');
ob_start();
$id=$_REQUEST['id'];
$sql=mysqli_query($conn,"delete from products where ProductID=$id");
if($sql>0)
{
	echo "<script>
			window.location='view_product.php?msg=5';</script>";
}
else
{
	echo "<script>
			window.location='view_product.php?msg=6';</script>";
}
?>