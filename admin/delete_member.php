<?php
require('connection.php');
ob_start();

if(isset($_REQUEST['act'])){
	$user_sataus=$_REQUEST['act'];
	$id=$_REQUEST['id'];
	 $sqls="update register set user_status='$user_sataus' where id='$id'";
	$res=mysqli_query($conn,$sqls);
	if(mysqli_affected_rows($conn)>0){
		if($user_sataus==0){
		header('location:all_member.php?msg=5');
		}
		if($user_sataus==1){
		header('location:all_member.php?msg=4');
		}
	}else{
		header('location:all_member.php?msg=3');
	}
}else{
$id=$_REQUEST['id'];
$sql=mysqli_query($conn,"delete from register where id=$id");
if($sql>0)
{
	echo "<script>
			window.location='all_member.php?msg=1'</script>";
}
else
{
	echo "<script>
			window.location='all_member.php?msg=2'</script>";
}
}
?>