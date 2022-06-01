<?php
session_start();
if(!isset($_SESSION['admin_login']))
{
    
	header('location:index.php');
    die();
}
/*if($_SESSION['Vendor_image']==""){
	$src="dist/img/img1.jpg";
}else{
	$src="upload/".$_SESSION['Vendor_image'];
}*/
include('connection.php');
define('ORD_CONST','MNC00');

$ms="select count(status) as cont from orders where status = 0";
 $res=mysqli_query($conn,$ms);
 $cont=0;
 if(mysqli_num_rows($res)>0){
	 while($row=mysqli_fetch_array($res)){
		 $cont=$row['cont'];
	 }
 }else{
	 $cont=0; 
 }
 


?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/niche/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 04:35:23 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>The Chairwala.com</title>
 <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/logo.png" />
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="dist/plugins/bootstrap-switch/bootstrap-switch.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

<!-- Chartist CSS -->
<link rel="stylesheet" href="dist/plugins/chartist-js/chartist.min.css">
<link rel="stylesheet" href="dist/plugins/chartist-js/chartist-plugin-tooltip.css">
    <!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">
<style>
 
	.fade:not(.show){
		opacity:.9 !important;
	}
	
	.modal.fade .modal-dialog{
		transform: translate(0,0%);
	}
  @media screen and (max-width: 767px)
#banner {
    display:none;
}

</style>
    
<!--<link rel="stylesheet" href="dist/plugins/summernote/summernote-bs4.css">-->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="dashboard.php" class="logo blue-bg" style="background-color:#fff8dc;"> 
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini" style="color:black;font-weight:600;">The Chairwala.com<!---<img src="images/chairwala1.jpg" style="width: 180px;height: 65px;background-color: cornsilk;" alt="">--></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg" style="color:black;font-weight:600;">The Chairwala.com<!---<img src="images/chairwala1.jpg" style="width: 180px;height: 65px;background-color: cornsilk;" alt="">---></span> </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
      </ul>
      <!--<div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="Search..." type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form </div>-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
             <li class="dropdown messages-menu"> 
             <?php if($cont > 0){?>
			 <a href="#"   class="dropdown-toggle" data-toggle="dropdown"  onclick="recall();"> <i class="fa fa-bell-o"></i>
                <div class="notify" ><span class="heartbit"></span> <span class="" style="color:lime;top: -16px !important;position: absolute;"><?php echo $cont;?></span> </div>
            </a>
			 <?php }else{ ?>
			   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-bell-o"></i>
                <div class="notify"><span class=""></span> <span class="" style="top: -16px !important;position: absolute;"><?php echo $cont;?></span> </div>
              </a>
			 <?php } ?>
            </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu p-ph-res "> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!--<img src="upload/user.png" class="user-image" alt="User Image">--> <span class="hidden-xs fa fa-user"><?php// echo $_SESSION['Vendor_name']?></span> </a>
            <ul class="dropdown-menu">
              <li class="user">
				
                <!--<div class="pull-left user-img"><img src="upload/user.png" class="img-responsive" alt="User"></div>-->
                <p class="text-left" style="padding-left:15px"><?php //echo $_SESSION['Vendor_name']?><small><?php echo $_SESSION['admin_login']?></small> </p>
                <!--<div class="view-link text-left"><a href="#">View Profile</a> </div>-->
              </li>
            <!--  <li><a href="profile.php"><i class="icon-profile-male"></i> My Profile</a></li>-->
              
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"> 
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
	  
		<!--<div class="image text-center"><img src="upload/user.png" class="img-circle" alt="User Image"> </div>-->
				
        
        <div class="info">
          <p><?php echo $_SESSION['admin_login'];

          
          
          ?></p>
         </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">PERSONAL</li>-->
        <li> <a href="dashboard.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <!--<i class="fa fa-angle-left pull-right"></i>--> </span> </a>
         <!-- <ul class="treeview-menu">
            <li class="active"><a href="index.html">Dashboard 1</a></li>
            <li><a href="index2.html">Dashboard 2</a></li>
            <li><a href="index3.html">Dashboard 3</a></li>
            <li><a href="index4.html">Dashboard 4</a></li>
          </ul>-->
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-cart-arrow-down"></i> <span>Category</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_category.php">Add Category</a></li>
            <li><a href="add_subcategory.php">Add Sub Category</a></li>
            <li><a href="show_category.php">Show All Category</a></li>
            
            
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-product-hunt"></i> <span>Manage Products</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_product.php">Add  Product</a></li>
            <li><a href="view_product.php">View All Products</a></li>
            
          </ul>
        </li>
		
       <!-- <li class="treeview"> <a href="#"> <i class="fa fa-cart-arrow-down"></i> <span>Manage Coupon</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_coupon.php">Add New Coupon</a></li>
            <li><a href="veiw_all_coupon.php">View All Coupons</a></li>
            
          </ul>
        </li>--> 
		
		 <li class="treeview"> <a href="#"> <i class="fa fa-sliders"></i> <span> Manage Slider</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_slider.php">Add Slider</a></li>
            <li><a href="view_slider.php">View Slider</a></li>
            
          </ul>
        </li>
		<li class="treeview"> <a href="#"> <i class="fa fa-sliders"></i> <span> Manage Banner</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_banner.php">Add Banner</a></li>
            <li><a href="view_banner.php">View Banner</a></li>
            
          </ul>
        </li>
		
		  <!--<li class="treeview"> <a href="#"> <i class="fa fa-sliders"></i> <span>Products Locations</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_location_product.php">Add Product Location</a></li>
            <li><a href="show_location_product.php">View Product Location</a></li>
            
          </ul>
        </li>-->
		
		 <li class="treeview"> <a href="#"> <i class="fa fa-first-order"></i> <span>Order</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
		    <!-- <li><a href="#"  onclick="recall();">New Order</a></li>-->
            <li><a href="new_order.php">New Order</a></li>
            <li><a href="processed_order.php">Processed Order</a></li>
            <li><a href="shipping_order.php">Shipping Order</a></li>
            <li><a href="complete_order.php">Complete Order</a></li>
            <!--<li><a href="deliveredOrder.php">Delevered Order</a></li>-->
            <li><a href="cancel_order.php">Cancelled Order</a></li>
            <li><a href="rejected_order.php">Rejected Order</a></li>
            
          </ul>
        </li>
		
		 <li class="treeview"> <a href="#"> <i class="fa fa-sliders"></i> <span>Coupon Code</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_coupon_code.php">Add Coupon Code</a></li>
            <li><a href="show_coupon_code.php">View Coupon Code</a></li>
            
          </ul>
        </li>
			<!-- Blog data -->
						
					<!--	<li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Manage Blog</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_blog.php">Add Blog</a></li>
            <li><a href="view_blog.php">View All Blog</a></li>
         
          </ul>
        </li>-->
		<li class="nav-item">
							<a class="nav-link" href="show_delivery_charge.php"><i class="fa fa-truck"></i>Product Delivery Charge</a>
						</li>
		<li class="nav-item">
							<a class="nav-link" href="show_gst.php"><i class="fa fa-truck"></i>Manage GST </a>
						</li>				
		<li class="nav-item">
							<a class="nav-link" href="all_member.php"><i class="icon fa fa-sitemap"></i>All Site Member</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact_us.php"><i class="icon fa fa-compress"></i>Contacted Customer</a>
						</li>
        <li class="nav-item">
							<a class="nav-link" href="customer_reviews.php"><i class="icon fa fa-eye"></i>Customer Reviews</a>
						</li>
        <li class="nav-item">
							<a class="nav-link" href="update_profile.php"><i class="icon fa fa-user fa-fw"></i>Admin Profile</a>
						</li>
						
					
					

					
        <!--<li class="treeview"> <a href="#"> <i class="ti-bag"></i> <span>Order Management</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="newOrder.php" >New Order</a></li>
            <li><a href="acceptedOrder.php" >Accepted Order</a></li>
            <li><a href="shippedOrder.php" >Shipping Order</a></li>
            <li><a href="deliveredOrder.php" >Delivered Order</a></li>
            <li><a href="returnOrder.php" >Returned Order</a></li>
            
            
          </ul>
        </li>-->
        
        
        <!--<li > <a href="profile.php"> <i class="fa fa-user"></i> <span>Profile</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>-->
      <!--  <li > <a href="contact_us.php"> <i class="fa fa-phone"></i> <span>Contact</span> <span class="pull-right-container"> <!--<i class="fa fa-angle-left pull-right"></i>--> 
      <!--  <li > <a href="change_password.php"> <i class="fa fa-unlock"></i> <span>Change Password</span> <span class="pull-right-container"> <!--<i class="fa fa-angle-left pull-right"></i>--> 
        
      </ul>
    </div>

  </aside>