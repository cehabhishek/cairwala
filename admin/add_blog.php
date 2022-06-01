<?php 
session_start();
if(isset($_SESSION['admin_login']))
{
?>
<?php include('header.php');?>
 <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Add Blog</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Elements</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-12">
		  <form method="POST" action="code.php?val=15" enctype="multipart/form-data">
           
          
		   <div class="container">
				<div class="row">
					<div class="col-12 ">
                  <div class="form-group">
					<label>Blog Category(Ex-Engineering,Science,Space...)</label>
					<input name="category" class="form-control" type="text" required >
					
                  </div>
				  <div class="form-group">
                    <label>Blog Title</label>
                    <input class="form-control" name="b_title" type="text" required >
                  </div>
				   <div class="col-lg-2">
				   <img id="blah" alt="." width="100" height="100" />
					</div>
                     <div class="form-group">
                    <label>Upload Blog Image</label>
                    <input class="form-control" name="blog_image" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  required />
                  </div>
				  
				   <div class="form-group col-12">
                    <label>Blog Description</label>
                    <textarea id="about1"  name="blog_desc" class="jqte-test" required></textarea> 
                  </div>
                  </div>
				  
				 
                  </div>
				  
					</div>
		 <div class="col-lg-6"></div>
			  <div class="col-lg-6">
			  <button type="submit" name="add_blog" class="btn btn-primary pull-right"style="margin-left: 20px;height: 38px;width: 93px;background-color: cornflowerblue; font-size: revert;color: white;">Add Blog</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="reset" class="btn btn-danger pull-right" style="width: 68px;
    height: 38px;
    font-size: revert;">Reset </button>
				  </div>
				  </div>
				  </div>
				  
		 </form> 
        </div>
			
	  </div>
	</div>
    </div>
	  
<?php include ('footer.php');?>
<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}
/*
if(isset($_POST['upload']))
{
	$ufo=0;
	include('connection.php');
	$img=$_FILES['file']['name'];
			$tmp=$_FILES['file']['tmp_name'];
			$location="upload/";
			//print_r($img);
			$c=count($img);
			for($i=0;$i<$c;$i++){
				$name=$img[$i];
				mysqli_query($conn,"insert into slider(slider)values('$name')");
				mysqli_query($conn,$sql);
				$tm=$tmp[$i];
				move_uploaded_file($tm,$location.$name);
	           
			   $ufo=1;
			   
	}
	
} */
?>

   <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){?>
<script>
   swal("Blog Added  Successfully",'','success');
</script>
<?php } ?>
 <?php if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){?>
<script>
   swal("Adding Blog Unsuccessful",'','warning');
</script>
<?php } ?>