<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        if($type=='active'){
            $sql="update vendor_sub_category set active='1' where subcategory_id='$id'";
            
        }
        if($type=='deactive'){
            $sql="update vendor_sub_category set active='0' where subcategory_id='$id'";
            
        }
        if($type=='delete'){
            $sql="delete from vendor_sub_category where subcategory_id='$id'";
            
        }
        mysqli_query($conn,$sql);
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Show Category</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Categroy</li>
        <li><i class="fa fa-angle-right"></i> Show Category</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Show Category</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Main Category</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th width="30%">Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from vendor_sub_category where v_id='$_SESSION[login]'");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['category_id']?></td>
                          <td><?php echo $row['subcategory_name']?></td>
                          <td><img src="subcategory_image/<?php echo $row['subcategory_image']?>" height="50px" width="50px" /></td>
                          <td>
                              
                              
                              <a href="updateCat.php?id=<?php echo $row['subcategory_id']?>"> <i class="fa fa-edit btn btn-info"></i> </a> 
                              <a href="?type=delete&id=<?php echo $row['subcategory_id']?>"> <i class="fa fa-trash btn btn-danger"></i> </a> 
                              <?php if($row['active']==1){
                                $class="btn btn-success";
                                ?><a href="?type=deactive&id=<?php echo $row['subcategory_id']?>" class="<?php echo $class?>">Active</a><?php
                            }else{
                                $class="btn btn-warning";
                                ?><a href="?type=active&id=<?php echo $row['subcategory_id']?>" class="<?php echo $class?>">Deactive</a><?php
                            }?>
                          </td>
                        </tr>
                    <?php
                       $count++; }
                    }else{
                        ?>
                    <tr>
                        <td colspan="5">No Data Found!</td>
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