<?php  
session_start();
ob_start();

error_reporting(0);
ini_set('display_error' , 0);

include("db.php");


function mailing($name,$email,$password){
	  
	  
$subject = 'Thank You For Registered With Us!';
$to=$email;
//$from='autoreply@dcskillhub.com';  //from
$from='info@mimanshanaturecare.co.in';
// message
$message ='
<html>
<head>
  <title>Thank You For Registered With Us!</title>
</head>
<body>
	<p>Dear ,'.$name.'&nbsp;thank you for registered with us, we are happy to serve you.</p>
	<p> Your Username: '.$email.' </p>
	<p> Your Password: '.$password.' </p>
	<br><br></br>
	<p style="color:Green"><u><b>Warm Regards</b></u></p>
		<p style="color:Green">www.mimanshanaturecare.co.in</p>
			<p style="color:Green">Mobile:8112431111 </p>
			<p style="color:Green">Email:mimanshanaturecare@gmail.com</p>
			<p style="color:Green">Address:3rd floor Chitrahar Building ,Nawal Kishor road Hazratganj Lucknow, Uttar Pradesh </p>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From:Mimansha Nature Care <'.$from.'>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
	  
return true;	  
	  
  }
 


$n=$_POST['name'];
$e=$_POST['email'];
$c=$_POST['password'];
$m=$_POST['phone'];
$cp=$_POST['cpassword'];
$address=$_POST['address'];
$land=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];


$sql="select * from register where email='$e'";

if($c==$cp)
 {
	 $res=mysqli_query($conn,$sql);
	 if(!mysqli_num_rows($res)>0)
	  {
		$query=mysqli_query($conn,"insert into register(name,email,mobile,password,cpassword,address,landmark,city,state,zip) values('$n','$e','$m','$c','$cp','$address','$land','$city','$state','$zip')");

		if($query)
		{   mailing($n,$e,$c);
			
			$_SESSION['uemail']=$e;
			$_SESSION['uname']=$n;
			$_SESSION['umobile']=$m;
			$val=$_REQUEST['val'];
			echo json_encode(array("result"=>0,"msg"=>"Your are Registered successfully! Now You Can Place The Order"));
		}

	 }else{
		 //header('location:user_login.php?rmsg=1');
		 echo json_encode(array("result"=>1,"msg"=>"You Are Already Registerd With Us"));
	 }
 }else{
	    echo json_encode(array("result"=>2,"msg"=>"Password And Confirm Password Does Not Matched."));
	    //header('location:user_login.php?rmsg=2');
 }

 

 

?>