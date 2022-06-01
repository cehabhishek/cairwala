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
$from='info@chairwala.co.in';
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
		<p style="color:Green">www.chairwala.co.in</p>
			<p style="color:Green">Mobile:9958457125 </p>
			<p style="color:Green">Email:info@chairwala.com</p>
			<p style="color:Green">Address:.S-14/84-G-1-M..Near Patel Dharsala Teliabagh, Varanasi, Uttar Pradesh,221002</p>	
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


$sql="select * from register where email='$e'";

if($c==$cp)
 {
	 $res=mysqli_query($conn,$sql);
	 if(!mysqli_num_rows($res)>0)
	  {
		$query=mysqli_query($conn,"insert into register(name,email,mobile,password,cpassword) values('$n','$e','$m','$c','$cp')");
        //sms section
       
        
		if($query)
		{   mailing($n,$e,$c);
			
			$_SESSION['uemail']=$e;
			$_SESSION['uname']=$n;
			$_SESSION['umobile']=$m;
			$val=$_REQUEST['val'];
			if($val==1)
			{
				header('location:user_profile.php');
			}
			else if($val==2)
			{
				header('location:order.php');
			}
		}

	 }else{
		 header('location:user_login.php?rmsg=1');
	 }
 }else{
	    header('location:user_login.php?rmsg=2');
 }

 

 

?>