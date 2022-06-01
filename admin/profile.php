<?php include('header.php');?>
<?php $name=$_SESSION['Vendor_name'];?>
<?php 
include('connection.php');
$query="select * from add_new_vendor where vendor_name='$name'";
$res=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($res))
{
?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Profile Page</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Pages</li>
        <li><i class="fa fa-angle-right"></i> Profile Page</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-4">
          <div class="user-profile-box m-b-1">
            <div class="box-profile text-white" style="padding:0px"> <img class="profile-user-img img-responsive img-circle" src="upload/user.png"style="height: 96px;" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo $_SESSION['Vendor_name'];?>
</h3>
              <p class="text-center"><?php echo $row['business'];?></p>
              <p class="text-justify"><?php echo $row['about'];?></p>
            </div>
          </div>
          <div class="info-box">
            <div class="box-body">
			<!--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>
              <p class="text-muted"> B.S. in Computer Science from the University of Tennessee at Knoxville </p>-->
          
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location <i class="fa fa-edit" style="margin-left: 211px;" data-toggle="modal" data-target="#exampleModalCenter"></i>  </strong>
              <p class="text-muted"><?php echo $row['address'];?></p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email address <i class="fa fa-edit " style="margin-left: 161px;" data-toggle="modal" data-target="#exampleModalCenter1"></i></strong>
              <p class="text-muted"><?php echo $row['contact_email'];?></p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone<i class="fa fa-edit " style="margin-left: 227px;" data-toggle="modal" data-target="#exampleModalCenter2"></i></strong>
              <p><?php echo $row['contact_mobile'];?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address<i class="fa fa-edit " style="margin-left: 215px;" data-toggle="modal" data-target="#exampleModalCenter3"></i></strong>
              <div class="embed-container maps">
                <iframe class="full-wid" src="<?php echo $row['google'];?>" style="pointer-events: none;"></iframe>
              </div>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Social Profile</strong>
              <div class="text-left"> <a class="btn btn-social-icon btn-facebook" href="<?php echo $row['facebook'];?>"><i class="fa fa-facebook"></i></a> <a class="btn btn-social-icon btn-instagram" href="<?php echo $row['facebook'];?>"><i class="fa fa-instagram"></i></a> <a class="btn btn-social-icon btn-youtube play" href="<?php echo $row['youtube'];?>"><i class="fa fa-youtube-play"></i></a> <a class="btn btn-social-icon btn-twitter" href="<?php echo $row['twitter'];?>"><i class="fa fa-twitter"></i></a> </div>
            </div>
            <!-- /.box-body --> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
            <div class="card tab-style1"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">About</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Update Profile</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="user-img pull-left"> <img src="upload/<?php echo $row['image1'];?>" style="height: 80px;" class="img-circle img-responsive" alt="User Image"> </div>
                      </div>
                      <div class="col-lg-10">
                        <div class="mail-contnet">
                          <h5>About Us</h5>
                          <p><?php echo $row['about'];?></p>
                         
                         
                         
                        </div>
                      </div>
                    </div>
                   
                   
                  </div>
                </div>
                <!--second tab-->
                <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Category</strong> <br>
                        <p class="text-muted"><?php echo $row['select_category'];?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Full Name</strong> <br>
                        <p class="text-muted"><?php echo $row['vendor_name'];?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Mobile Number</strong> <br>
                        <p class="text-muted"><?php echo $row['vendor_mobile'];?></p>
                      </div>
                    </div>
					</br>
					<div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Email</strong> <br>
                        <p class="text-muted"><?php echo $row['vendor_email'];?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Business Name</strong> <br>
                        <p class="text-muted"><?php echo $row['business'];?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Address</strong> <br>
                        <p class="text-muted"><?php echo $row['address'];?></p>
                      </div>
                    </div>
					</br>
					<div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Opining Hours</strong> <br>
                        <p class="text-muted"><?php echo $row['hour'];?></p>
                      </div>
                      <div class="col-lg-6 col-xs-6 b-r"> <strong>About Us</strong> <br>
                        <p class="text-muted" ><?php echo $row['about'];?></p>
                      </div>
                     
                    </div>
					</br>
					 <div class="row">
					
					          
					        
                            <div class="col-lg-3 col-xs-4 m-bot-2"><strong>Shop Front Photo</strong></br><img src="upload/<?php echo $row['shop_front_photo'];?>" alt="user" class="img-responsive img-rounded"></div>
							
                            <div class="col-lg-3 col-xs-4 m-bot-2"><strong>Banner Image</strong><img src="upload/<?php echo $row['banner_image'];?>" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><strong>Gallery</strong><img src="upload/<?php echo $row['gallery'];?>" alt="user" class="img-responsive img-rounded"></div>
                            <div class="col-lg-3 col-xs-4 m-bot-2"><strong>Logo</strong><img src="upload/<?php echo $row['logo'];?>" alt="user" class="img-responsive img-rounded"></div>
                          
                          </div>
                    <hr>
                   
                  
                  
                  </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
                    <form class="form-horizontal form-material" action="vendor_update_code.php" method="post" enctype="multipart/form-data">
					<div class="row">
					<div class="col-md-6">
					<div class="form-group">
                        <label >Category</label>
                        
                          <input name="select_category" value="<?php echo $row['select_category'];?>" class="form-control form-control-line" type="text" readonly>
                        </div>
                      </div>
					   <div class="col-md-6">
                      <div class="form-group">
                        <label >Full Name</label>
                       
                          <input name="vendor_name" value="<?php echo $row['vendor_name'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
                      </div>
					  <div class="row">
					  <div class="col-md-6">
					   <div class="form-group">
                        <label >Mobile Number</label>
                        
                          <input name="vendor_mobile" value="<?php echo $row['vendor_mobile'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
					   <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-email">Email</label>
                       
                          <input name="vendor_email" value="<?php echo $row['vendor_email'];?>" class="form-control form-control-line" name="example-email" id="example-email" type="email" >
                        </div>
                      </div>
                      </div>
					  <div class="row">
					   <div class="col-md-6">
					  <div class="form-group">
                        <label >Business Name</label>
                       
                          <input name="business" value="<?php echo $row['business'];?>" class="form-control form-control-line" type="text" > 
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >Address</label>
                        
                          <input name="address" value="<?php echo $row['address'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
                      </div>
					  <div class="row">
					    <div class="col-md-6">
					  <div class="form-group">
                        <label >Opining Hours</label>
                      
                          <input name="hours" value="<?php echo $row['hour'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >Facebook Link</label>
                      
                          <input name="facebook" value="<?php echo $row['facebook'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
                      </div>
					  <div class="row">
					    <div class="col-md-6">
					  <div class="form-group">
                        <label >Twitter Link</label>
                      
                          <input name="twitter" value="<?php echo $row['twitter'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >Instagram Link</label>
                      
                          <input name="instagram" value="<?php echo $row['instagram'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
                      </div>
					  <div class="row">
					    <div class="col-md-6">
					  <div class="form-group">
                        <label >Youtube Link</label>
                      
                          <input name="youtube" value="<?php echo $row['youtube'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >LinkedIn Link</label>
                      
                          <input name="linkedin" value="<?php echo $row['linkedin'];?>" class="form-control form-control-line" type="text" >
                        </div>
                      </div>
                      </div>
					    <div class="row">
					    <div class="col-md-6">
					  <div class="form-group">
                        <label >Shop Front Photo</label>
                      
                          <input  name="shop"  class="form-control form-control-line" type="file" >
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >Banner Image</label>
                      
                          <input  name="banner" class="form-control form-control-line" type="file" >
                        </div>
                      </div>
                      </div>
					    <div class="row">
					    <div class="col-md-6">
					  <div class="form-group">
                        <label >Logo</label>
                      
                          <input name="logo" class="form-control form-control-line" type="file" >
                        </div>
                      </div>
					  <div class="col-md-6">
					  <div class="form-group">
                        <label >Gallery Image</label>
                      
                          <input name="gallery" class="form-control form-control-line" type="file" >
                        </div>
                      </div>
                      </div>
                     <div class="row">
                     <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-md-12">About</label>
                        
                          <textarea rows="5" name="about" value="<?php echo $row['about'];?>" class="form-control form-control-line" ><?php echo $row['about'];?></textarea>
                        </div>
                      </div>
                      </div>
                    
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-----------------------modal 1---------------------->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="modal_update_code.php?val=1" method="post">
        <div class="form-group">
    <label for="name">Location</label>
    <input type="text" class="form-control" name="location" value="<?php echo $row['address'];?>">
  </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
	 </form>
    </div>
  </div>
</div>


<!-----------------------modal end---------------------->
<!-----------------------modal 2---------------------->

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Email Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="modal_update_code.php?val=2" method="post">
        <div class="form-group">
    <label for="name">Email Address </label>
    <input type="text" class="form-control" name="email" value="<?php echo $row['contact_email'];?>">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
	  </form>
    </div>
  </div>
</div>


<!-----------------------modal end---------------------->
<!-----------------------modal 3---------------------->

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Phone Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="modal_update_code.php?val=3" method="post">
        <div class="form-group">
    <label for="name">Phone Number</label>
    <input type="text" class="form-control" name="number" value="<?php echo $row['contact_mobile'];?>">
  </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
	   </form>
    </div>
  </div>
</div>


<!-----------------------modal end---------------------->
<!-----------------------modal 4---------------------->

<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Google Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="modal_update_code.php?val=4" method="post">
        <div class="form-group">
    <label for="name">Google Address</label>
    <input type="text" class="form-control" name="google" value="<?php echo $row['google'];?>">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
	  </form>
    </div>
  </div>
</div>


<!-----------------------modal end---------------------->
<?php
}?>

<script>
$('#exampleModalCenter').modal('show');
$('#exampleModalCenter1').modal('show');
$('#exampleModalCenter2').modal('show');
$('#exampleModalCenter3').modal('show');
</script>




<?php include('footer.php');?>