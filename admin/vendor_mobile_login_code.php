<?php
session_start();
ob_start();
$number=$_POST['number'];
//echo $email;
$password=$_POST['password'];
//$enc=base64_encode($p);
//echo $password;



include('connection.php');
  $query="select * from add_new_vendor where vendor_mobile='$number' and vendor_password='$password' "; 
  
  $query1="select * from add_new_vendor where vendor_mobile='$number' and vendor_password='$password' and verify=1"; 

$res=mysqli_query($conn,$query);

if(mysqli_num_rows($res)>0)
{
   $res1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($res1)>0){
		
		
		
        if($row=mysqli_fetch_array($res1)){
	 $_SESSION['login']=$row['vendor_email'];
	 $_SESSION['reg_id']=$row['reg_id'];
	 $_SESSION['vendor_mobile']=$row['vendor_mobile'];
	 $_SESSION['Vendor_name']=$row['vendor_name'];
	 $_SESSION['Vendor_image']=$row['image1'];
	header("location:dashboard.php");
    }
        
    }
    else{
          echo "<script>window.location.href='vendor_mobile_login.php?msg=6';</script>";
    }
}

else
{
	   echo "<script>window.location.href='vendor_mobile_login.php?msg=1';</script>";
}


?>

