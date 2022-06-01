<?php
  include('connection.php');
   $sql="update orders set status=1 where status=0";

    $res=mysqli_query($conn,$sql);
	$des=0;
	if(mysqli_affected_rows($conn)>0){
	  $des = 1;
	}
     echo $des;

?>