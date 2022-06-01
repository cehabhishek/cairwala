<?php
session_start();
$em=$_SESSION['uemail'];
include('db.php');
$query=mysqli_query($conn,"select * from register where email='$em'");
if($row=mysqli_fetch_array($query))
{
	$user_id=$row['user_id'];
	$co=mysqli_connect("localhost","root","","medwealth") or die('Database Connection Error');
	//echo $res="select * from manage_kyc where User_id='$user_id' and status='1'";die();
	$query1=mysqli_query($co,"select * from manage_kyc where User_id='$user_id' and status='1'");
	if($row1=mysqli_fetch_array($query1))
		{
			//print_r($row1);
			  $total_amount=$row1['total_amount'];
			 echo $total_amount;
		}
		else
		{
			echo "2";
		}
}

?>