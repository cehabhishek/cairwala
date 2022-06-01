<?php include('header.php');
if(isset($_REQUEST['type'])){
    $type=$_REQUEST['type'];
    if(isset($_REQUEST['id']) & $_REQUEST['id']>0){
        $id=$_REQUEST['id'];
        if($type=='active'){
            $sql="update products set status='1' where ProductID='$id'";
            
        }
        if($type=='deactive'){
            $sql="update products set status='0' where ProductID='$id'";
            
        }
        if($type=='delete'){
            $sql="delete from products where ProductID='$id'";
            
        }
        mysqli_query($conn,$sql);
    }
    
    
    
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <div class="content-header sty-one">
      <h1 class="text-black">Product Management</h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i>Product</li>
        <li><i class="fa fa-angle-right"></i> Show Product</li>
      </ol>
    </div>
      <div class="content">
          <div class="info-box">
      <h4 class="text-black">Show Product</h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Main Category</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Image</th>
                  <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                        $res=mysqli_query($conn,"select * from products where v_id='$_SESSION[login]'");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            ?>
                        <tr>
                          <td><?php echo $count?></td>
                          <td><?php echo $row['Category']?></td>
                          <td><?php echo $row['SubName']?></td>
                          <td><?php echo $row['Name']?></td>
                          
                          <td><?php echo $row['Price']?></td>
                          <td><img src="product_image/<?php echo $row['Image1']?>" height="50px" width="50px" /></td>
                          <td>
                              
                              
                              <a href="updateProduct.php?id=<?php echo $row['ProductID']?>"> <i class="fa fa-edit btn btn-info"></i> </a> 
                              <a href="?type=delete&id=<?php echo $row['ProductID']?>"> <i class="fa fa-trash btn btn-danger"></i> </a> 
                              <?php if($row['status']==1){
                                $class="btn btn-success";
                                ?><a href="?type=deactive&id=<?php echo $row['ProductID']?>" class="<?php echo $class?>">Active</a><?php
                            }else{
                                $class="btn btn-warning";
                                ?><a href="?type=active&id=<?php echo $row['ProductID']?>" class="<?php echo $class?>">Deactive</a><?php
                            }?>
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