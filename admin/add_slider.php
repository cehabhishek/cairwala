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
      <h1 class="text-black">Add Slider</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Slider</li>
        <li><i class="fa fa-angle-right"></i>Add Slider</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
	  <div class="row">
          <div class="col-lg-6">
		  <form method="POST" action="#" enctype="multipart/form-data">
           
          </div>
		  </div>
		   <div class="row">
		   <div class="col-lg-6">
            <div class="form-group">
                    <label>Upload Slider</label>
                   
                    <input class="form-control" name="file[]" type="file" required multiple>
                  </div>
          </div> 
          </div> 
		   <div class="row">
		  <div class="col-lg-6">
            <div class="form-group">
                    <label>Url For slider(Optional)</label>
                   
                    <input class="form-control" name="url" type="text"  >
                  </div>
          </div>
		  
         </div>
		 <button type="submit" name="upload" class="btn btn-primary" style="font-size:revert;">Add Slider</button>
		  <button type="reset" class="btn btn-primary" style="font-size: inherit;">Reset </button>
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
if(isset($_POST['upload']))
{
	include('connection.php');
	$dele=1;
	$url=$_REQUEST['url'];
	$img=$_FILES['file']['name'];
			$tmp=$_FILES['file']['tmp_name'];
			$location="uploads/";
			//print_r($img);
			$c=count($img);
			for($i=0;$i<$c;$i++){
				$name=$img[$i];
				mysqli_query($conn,"insert into slider(slider,url)values('$name','$url')");
				mysqli_query($conn,$sql);
				$tm=$tmp[$i];
				move_uploaded_file($tm,$location.$name);
	         $dele=5;
	}
	
}



?>


   <?php if(isset($dele)&& $dele==5){?>
<script>
   swal("Banner Added Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($dele)&& $dele==1){?>
<script>
   swal("Banner Added Unsuccessfully",'','warning');
</script>
<?php } ?>