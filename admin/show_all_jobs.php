<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        if($type=='delete'){
            $query1=mysqli_query($conn,"select resume from apply_job where id='$id'");
            $row=mysqli_fetch_array($query1);
            unlink("../uploades/".$row['resume']);
            $sql= mysqli_query($conn,"delete from apply_job where id='$id'");   
        }  
    }  
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Job Show</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Job</li>
        <li><i class="fa fa-angle-right"></i> Show Job</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Show Job</h4>
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Qulification</th>
                  <th>Document</th>
                  <th>Job Type</th>
                 
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from apply_job");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['fname']?></td>
                          <td><?php echo $row['phone']?></td>
                          
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['qulification']?></td>
                          <td><a href="http://localhost/tirupati balaji/uploades/<?php echo $row['resume']?>" download>View Resume</a></td>
                          <td><?php $a=$row['job_id'];
                            $query1=mysqli_query($conn,"select * from add_job where job_id='$a'");
                             if($row1=mysqli_fetch_array($query1))
                             {
                                 echo $row1['job_category'];
                             }
                          ?></td>
                          <td>
                             <!-- <a href="update_job.php?id=<?php //echo $row['job_id']?>"> <i class="fa fa-edit btn btn-info"></i> </a> 
                              -->
                              <a href="?type=delete&id=<?php echo $row['id'];?>"> <i class="fa fa-trash btn btn-danger"></i> </a> 
                              
                          </td>
                        </tr>
                    <?php
                       $count++; }
                    }else{
                        ?>
                    <tr>
                        <td colspan="7">No Data Found!</td>
                    </tr>
                    <?php
                    }
                    ?>
                
               
           </table>
                  </div>
      </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>