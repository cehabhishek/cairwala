
<?php
$na=$_SESSION['admin_login'];
if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
    $id=$_REQUEST['id'];
}
?>
 <?php include('header.php');?>
<?php
$na=$_SESSION['login'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Update Job</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Update</li>
        <li><i class="fa fa-angle-right"></i> Update Job</li>
      </ol>
    </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card ">
                <div class="card-header bg-blue">
                  <h5 class="text-white m-b-0">Update Job</h5>
                </div>
                <div class="card-body">
                <?php
                //echo $res="select * from add_job where job_id='$id'";
                   $query=mysqli_query($conn,"select * from add_job where job_id='$id'");
                    if($row=mysqli_fetch_array($query))
                    {
                       // print_r($row);
                ?>

                  <form method="POST" action="code.php?val=8&id=<?php echo $row['job_id'];?>" enctype="multipart/form-data">
                  <div class="row">
                      
                     
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Job Category</label>
                        <input class="form-control" placeholder="Job Category" type="text" value="<?php echo $row['job_category'];?>" name="jobcategory" required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">Job Title</label>
                        <input class="form-control" placeholder="Job Title" type="text" name="job_title" value="<?php echo $row['job_title'];?>" required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <label class="control-label">No of Vacancy</label>
                        <input class="form-control" placeholder="Vacancy" type="text" name="vacancy" value="<?php echo $row['vacancy'];?>" required>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <label class="control-label">Job Discription</label>
                        <textarea class="form-control" name="discription" rows="5" id="comment"  required><?php echo $row['description'];?></textarea>
                        <span class="fa fa-pencil form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                     
                      
                      
                   
                   
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                     </div>
                  </form>
                    <?php   } ?>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>