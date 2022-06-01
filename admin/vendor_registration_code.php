<?php 
require ("connection.php");
require ("../mail.php");

 $select_category=$_POST['select_category'];

	 $vendor_name=$_POST['vendor_name'];
	 $vendor_mobile=$_POST['vendor_mobile'];
    $vendor_email=$_POST['vendor_email'];
    $business=$_POST['business'];
    $pin=$_POST['pin'];
    $google=$_POST['google'];
    $hours=$_POST['hours'];
    $filename=$_FILES['image']['name'];
     $tmp_name=$_FILES['image']['tmp_name'];
	  $location="upload/";
	$filename1=$_FILES['logo']['name'];
     $tmp_name1=$_FILES['logo']['tmp_name'];
	
	 $location1="logo/";
	 $vendor_password=$_POST['vendor_password'];
	$comfirm_password=$_POST['comfirm_password'];
	
	 $sel="select * from add_new_vendor where vendor_email='$vendor_email' and reject=''";
    $r=mysqli_query($conn,$sel);
		if(mysqli_fetch_array($r,MYSQLI_BOTH))
   {
	
       echo "<script>window.location.href='vendor_registration.php'; alert(' this email Id  alraedy register please your change email');</script>";
   
   }
else
{
    
    
    
    //select category start
    
    
		    
		    
		   
		    
	if($comfirm_password==$vendor_password)
	{
	 $ins="INSERT INTO `add_new_vendor`(select_category,vendor_name,vendor_mobile,vendor_email,vendor_password,business,
	 pin,google,hour,image1,logo,date) VALUES ( '$select_category','$vendor_name','$vendor_mobile','$vendor_email',
	 '$vendor_password','$business','$pin','$google','$hours','$filename','$filename1',curdate())";
       move_uploaded_file($tmp_name,$location.$filename);
	    move_uploaded_file($tmp_name1,$location1.$filename1);
  if(mysqli_query($conn,$ins))
   		{  mailing($vendor_name,$vendor_email,$vendor_password,'ven_registration');
			echo "<script>alert('Vendor Registration Successfully.Please verify your mail.');
			window.location='index.php'</script>";
	}
	else
	{
			echo "<script>alert('Vendor Registration Fail ');
			window.location='vendor_registration.php'
			</script>";
	}
	}
	  else
	  {
		  echo "<script>alert('confirm password not match');
			window.location='vendor_registration.php'
			</script>";
	  }
	  
	  

		
}




?>