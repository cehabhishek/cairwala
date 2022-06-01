<?php
session_start();
ob_start();
include('connection.php');
$email=mysqli_real_escape_string($conn,$_POST['email']);
//echo $email;
$password=mysqli_real_escape_string($conn,$_POST['password']);
//$enc=base64_encode($p);
//echo $password;



   $query="select * from admin where email='$email' and password='$password'"; 
  
  

$res=mysqli_query($conn,$query);

if(mysqli_num_rows($res)>0)
{
    if(mysqli_num_rows($res)>0){
        if($row=mysqli_fetch_array($res)){
	 $_SESSION['admin_login']=$email;
	 $_SESSION['reg_id']=$row['reg_id'];
	 $_SESSION['Vendor_name']=$row['vendor_name'];
	 $_SESSION['Vendor_image']=$row['image1'];
	header("location:dashboard.php");
    }
        
    }
    else{
          echo "<script>window.location.href='index.php?msg=6';</script>";
    }
}

else
{
	   echo "<script>window.location.href='index.php?msg=1';</script>";
}


?>

