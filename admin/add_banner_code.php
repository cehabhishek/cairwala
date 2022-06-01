<?php
	if(isset($_POST['upload']))
	{
		include('connection.php');
		$file=$_FILES['file']['name'];
		$tmp=$_FILES['file']['tmp_name'];
		$location="banner/";
		$query="insert into banner(banner)values('$file')";
		$res=mysqli_query($conn,$query);
		move_uploaded_file($tmp,$location.$file);
		header('location:add_banner.php?msg=success');
	}

?>