<?php
session_start();
include("db.php");
$cur=$_SESSION["SystemID"];
$p=0;
	$query1=mysqli_query($conn,"select count(CartID) as abc from cart where SystemID='$cur'");
										
			if($row1=mysqli_fetch_array($query1))
			{
			 $p=$row1['abc'];
			}
			echo $p;
?> 