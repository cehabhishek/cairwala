<?php 
include("db.php");
$id=$_POST['id'];
$pin=$_POST['pin'];

// $query="select * from products where ProductID='$id' and available_location like '%$pin%'";
 $query="select * from product_location where city like '%$pin%'";
$res=mysqli_query($conn,$query);
if(mysqli_fetch_row($res)>0){
	
	echo "<p style='color:green'> <i class='ion-android-checkbox'></i>Product Is  Available To Your Location</p>";
}
else{
	echo "<p style='color:red'> <i class='ion-android-cancel'></i>Product Is Not Available To Your Location</p>";
}





?>