<?php 
include('db.php');
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];
 $sql="insert into contact (`name`,`email`,`subject`,`msg`,`datetime`) values('$name','$email','$subject','$message',curdate())";
$res=mysqli_query($conn,$sql);

header('location:contact.php?msg=1001');



?>