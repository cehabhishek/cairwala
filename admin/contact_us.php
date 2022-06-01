<?php include('header.php');?>
<?php
if(isset($_REQUEST['type']))
{ $kk=0;
	include('connection.php');
	$id=$_REQUEST['id'];
	$query="delete from contact where id='$id'";
	$e=mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)>0){
		$kk=1;
	}
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Contact Us</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Contact</li>
        <li><i class="fa fa-angle-right"></i> Show Contact</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Show All Contact</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name </th>
                  
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Massege</th>
                  <th>Date</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from contact ");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['telephone']?></td>
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['subject']?></td>
                          <td><?php echo $row['msg']?></td>
                          
                          <td><?php echo $row['datetime']?></td>
                          
                          <td>
                            <a href="?id=<?php echo $row['id'];?>&type=delete"><i class="fa fa-trash btn btn-danger"></i></a>  
                              
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
  
   <?php if(isset($kk)&& $kk==1){?>
<script>
   swal("Deleted  Successfully",'','success');
</script>
<?php } ?>
<?php if(isset($kk)&& $kk==0){?>
<script>
   swal("Deleting Operation Unsuccessful",'','warning');
</script>
<?php } ?>
  