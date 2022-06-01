<?php
session_start();
include("db.php");
if(isset($_REQUEST['prop']) && $_REQUEST['prop']=='update'){
 $id=$_REQUEST['id'];
 $qt=$_REQUEST['qt'];
 $pc=$_REQUEST['pr']; 
//echo $id;
 $cur=$_SESSION["SystemID"];
 $upd="update cart set Quantity=$qt,Price=$pc where ProductID=$id and SystemID='$cur'";

$query=mysqli_query($conn,$upd);
echo true;
}
if(isset($_REQUEST['prop']) && $_REQUEST['prop']=='del'){
	 $id=$_REQUEST['id'];
	 $cur=$_SESSION["SystemID"];
	 $query=mysqli_query($conn,"delete from cart where ProductID=$id and SystemID='$cur'");
	 echo true;
}
if(isset($_REQUEST['prop']) && $_REQUEST['prop']=='all'){
	 
	 $cur=$_SESSION["SystemID"];
	 $query=mysqli_query($conn,"delete from cart where SystemID='$cur'");
	 echo true;
}
?>