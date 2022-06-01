<?php 
ob_start();
include('db.php');


$pid=$_REQUEST['pid'];
$name=$_REQUEST['c_name'];
$email=$_REQUEST['c_email'];
$rating=$_REQUEST['score'];
$comment=$_REQUEST['comment'];

 $sql="insert into reviews(`product_id`,`c_name`,`c_email`,`c_rating`,`c_comment`,`date`)values('$pid','$name','$email','$rating','$comment',CURDATE())";

$res=mysqli_query($conn,$sql);

header('location:user_order.php');


?>