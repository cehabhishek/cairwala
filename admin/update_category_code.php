<?php
include('connection.php');
$val=$_REQUEST['val'];

switch($val)
{
	case 1:
	if(isset($_POST['add_category']))
	{
		$id=$_REQUEST['id'];
		$name=$_POST['category'];
		
		 $datas="category_name='$name'";
		$location='subcategory_image/';
		 if($_FILES['file']['name']!=NULL){
				 $image1=time().$_FILES['file']['name'];
				 $tmp_name=$_FILES['file']['tmp_name'];
				 
				 move_uploaded_file($tmp_name,$location.$image1);
				 $datas.=",banner='$image1'";
			  }
		 $sql="update category set $datas where category_id='$id'";
  
		$res=mysqli_query($conn,$sql);
		if($res>0)
		{
			echo "<script>
			window.location='show_category.php?msg=1';
			
			
			</script>";
		}
		else
		{
			echo "<script>
			window.location='show_category.php?msg=2';
			
			
			</script>";
			
		}
		
		
	}
	break;
	case 2:
	if(isset($_POST['add_subcategory']))
	{
		 $id=$_REQUEST['id'];
		$name=$_POST['subcategory'];
		
		
		 $datas="subcategory_name='$name'";
		$location='subcategory_image/';
		 if($_FILES['file']['name']!=NULL){
				 $image1=time().$_FILES['file']['name'];
				 $tmp_name=$_FILES['file']['tmp_name'];
				 
				 move_uploaded_file($tmp_name,$location.$image1);
				 $datas.=",subcategory_image='$image1'";
			  }
		
		
		
		 $filename=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$location='subcategory_image/';
	    move_uploaded_file($tmp_name,$location.$filename);
	$res=mysqli_query($conn,"update  sub_category set $datas where subcategory_id='$id' ");
		if($res>0)
		{
			echo "<script>
             window.location='show_category.php?msg=3';
			</script>";
		}
		else
		{
			echo "<script>
             window.location='show_category.php?msg=4';
			</script>";
		}
	}
	break;
	case 3:
	if(isset($_POST['update_slider']))
	{
		$id=$_REQUEST['id'];
		$url=$_POST['url'];
		
		 $datas="url='$url'";
		$location='uploads/';
		 if($_FILES['file']['name']!=NULL){
				 $image1=time().$_FILES['file']['name'];
				 $tmp_name=$_FILES['file']['tmp_name'];
				 
				 move_uploaded_file($tmp_name,$location.$image1);
				 $datas.=",slider='$image1'";
			  }
		 $sql="update slider set $datas where id='$id'";
  
		$res=mysqli_query($conn,$sql);
		if($res>0)
		{
			echo "<script>
			window.location='view_slider.php?msg=3';
			
			
			</script>";
		}
		else
		{
			echo "<script>
			window.location='view_slider.php?msg=4';
			
			
			</script>";
			
		}
		
		
	}
	break;
	case 4:
	if(isset($_POST['update_banner']))
	{
		$id=$_REQUEST['id'];
		$old_img=$_POST['old_img'];
		$file=$_FILES['file']['name'];
		$temp_file=$_FILES['file']['tmp_name'];
		
		$location="banner/";
		if($file=='')
		{
			$query="update banner set banner='$old_img' where id='$id'";
			mysqli_query($conn,$query);
			move_uploaded_file($temp_file,$location.$file);
			header('location:view_banner.php');
		}
		else
		{
			$query="update banner set banner='$file' where id='$id'";
			mysqli_query($conn,$query);
			move_uploaded_file($temp_file,$location.$file);
			header('location:view_banner.php');
		}
		
		
		
		
	}
	
	
}


?>