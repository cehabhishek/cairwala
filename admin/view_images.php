<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        
        if($type=='delete'){
          $query=mysqli_query($conn,"select name from img where id='$id'");
          $img=mysqli_fetch_array($query);
          unlink("gallery/".$img['name']);
            $sql=mysqli_query($conn,"delete from img where id='$id'");
            
        }
        
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Show All Image</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Image</li>
        <li><i class="fa fa-angle-right"></i> Show Image</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Show Image</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                 
                 
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from img");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><img src="gallery/<?php echo $row['name']?>" style="height:100px;"/></td>
                         
                         
                          <td>
                              
                              
                              
                              <a href="?type=delete&id=<?php echo $row['id']?>"> <i class="fa fa-trash btn btn-danger"></i> </a> 
                              
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