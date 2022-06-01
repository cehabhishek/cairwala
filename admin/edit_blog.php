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
      <h1 class="text-black">Update Blog</h1>
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
		  <?php 
	                      $email=$_SESSION['login']; 					
						  include('connection.php');
						  $res=mysqli_query($conn,"select * from admin where email='$email'");
						  
						while($row=mysqli_fetch_array($res))
						{
						?>
		 <form method="POST" action="code.php?val=17" enctype="multipart/form-data">
			<!-- Begin page content -->
			<div class="container">
				<div class="row">
				<?php   
				          $id=$_REQUEST['id'];
						$sql2=mysqli_query($conn,"select * from blog_data where id='$id'");
						if($row2=mysqli_fetch_array($sql2,MYSQLI_BOTH))
						{
						 
					?>
					<div class="col-12 ">
                  <div class="form-group">
					<label>Blog Category(Ex-Engineering,Science,Space...)</label>
					<input name="category" class="form-control" type="text" value="<?php echo $row2['related_to']; ?>" required >
					<input name="id"  type="hidden" value="<?php echo $row2['id']; ?>"  >
					
                  </div>
				  <div class="form-group">
                    <label>Blog Title</label>
                    <input class="form-control" name="b_title" type="text" required value="<?php echo $row2['topic']; ?>" >
                  </div>
				  <div class="col-lg-2">
				     <img src="blog/<?php echo $row2['photo'];?>" style="height:200pxs;width:200px;">
					</div> 
					 <div class="col-lg-2">
				   <img id="blah" alt="." style="height:200pxs;width:200px;"/>
					</div>
					 
                     <div class="form-group">
                    <label>Upload Blog Image(If need to change Image)</label>
                    <input class="form-control" name="blog_image" type="file"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"  />
                  </div>
				  
				   <div class="form-group">
                    <label>Blog Description</label>
                    <textarea id="about1"  name="blog_desc" class="jqte-test"  required><?php echo $row2['content']; ?></textarea> 
                  </div>

                  </div>
				  
						<?php }?>
                  </div>
				  
					</div>
					
					
			 
			  <div class="col-lg-6"></div>
			  <div class="col-lg-6">
			  <button type="submit" name="" class="btn btn-primary pull-right"style="background-color: cornflowerblue; font-size: revert;color: white;">Update Blog</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="reset" class="btn btn-danger pull-right" style="width: 68px;
    height: 38px;
    font-size: revert;">Reset </button>
				  </div>
				</div>

			</div>
			</form>
 
				<?php
						}
						?>		 
        </div>
			
	  </div>
	</div>
    </div>
	  
<?php include ('footer.php');?>
<script src="../js/adminnine.js"></script>
<script>
    function myfun(datavalue)
    {
        $.ajax({
            url:'ajax.php',
            type:'POST',
            data:{datapost : datavalue},
            success:function(result)
            {
                $('#dataget').html(result);
            }
        });
    }
</script>
<?php
}





else
{
	echo "<script>location.href='index.php';alert('Session Expired Login Again');</script>";
}



?>