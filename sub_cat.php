<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/shop-4-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:30 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com</title>
        <!-- Favicon -->
         <?php include("header_link.php");?>
		 <style>
		    .add-to-link ul li a {
				background: #1a6f40;
				color: #fff;
				padding: 3px;
				width: 120px !important;
				font-size: 13px !important;
				border-radius: 8px !important;
				height: 35px;
				}
				.product-decs {
		          padding: 20px 15px 1px 15px!important;}
		    .txu{
			width: 140px!important;
			margin-left: 73px !important;
			}
		  
		 </style>
    </head>

    <body class="home-3">
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->

        <!-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> -->

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
              <?php include("header.php");?>
              <?php include("db.php");?>
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
			<?php	 $cn=base64_decode($_REQUEST['cn']);
					 $id=base64_decode($_REQUEST['id']);
					 
					  $msqls="select * from sub_category where category_id=$id";
					 $res=mysqli_query($conn,$msqls);
					 
			 
			 ?>
			
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading"> <?php echo $cn;?></h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Product Category Grid</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- Shop Category Area End -->
			<?php if(mysqli_num_rows($res)>0){
				
				
			?>
            <div class="shop-category-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- Shop Top Area Start -->
                            <div class="shop-top-bar">
                                <!-- Left Side start -->
                                <!--<div class="shop-tab nav mb-res-sm-15">
                                    <a class="active" href="#shop-1" data-toggle="tab">
                                        <i class="fa fa-th show_grid"></i>
                                    </a>
                                    <a href="#shop-2" data-toggle="tab">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                    <p>There Are 17 Products.</p>
                                </div>-->
                                <!-- Left Side End -->
                                <!-- Right Side Start -->
                               <!-- <div class="select-shoing-wrap">
                                    <div class="shot-product">
                                        <p>Sort By:</p>
                                    </div>
                                    <div class="shop-select">
                                        <select>
                                            <option value="">Sort by newness</option>
                                            <option value="">A to Z</option>
                                            <option value=""> Z to A</option>
                                            <option value="">In stock</option>
                                        </select>
                                    </div>
                                </div>-->
                                <!-- Right Side End -->
								 <h3><center><?php echo $cn;?> Category</center></h3>
                            </div>
                            <!-- Shop Top Area End -->
			
							

                            <!-- Shop Bottom Area Start -->
                            <div class="shop-bottom-area mt-35">
                                <!-- Shop Tab Content Start -->
                                <div class="tab-content jump">
                                    <!-- Tab One Start -->
                                    <div id="shop-1" class="tab-pane active">
                                        <div class="row">
                                            <?php include("db.php");
											 while($rows=mysqli_fetch_array($res)){
					                                
					   					?>
											
											<div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                       <center>
														   <a href="product_list?product=<?php echo base64_encode($rows['subcategory_id']);?>&sbc=<?php echo base64_encode($rows['subcategory_name']); ?>" class="thumbnail">
																<img class="first-img" style="height:300px;width:300px;"src="admin/subcategory_image/<?php echo $rows['subcategory_image'];?>" alt="" />
																
															</a>
														</center>
                                                        <!--<div class="quick-view">
                                                            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                                <i class="ion-ios-search-strong"></i>
                                                            </a>
                                                        </div>-->
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="#"><span><?php echo $cn;?></span></a>
                                                        <h2><a href="product_list?product=<?php echo base64_encode($rows['subcategory_id']);?>&sbc=<?php echo base64_encode($rows['subcategory_name']); ?>" class="product-link"><?php echo $rows['subcategory_name']; ?></a></h2>
                                                        <div class="rating-product">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                        </div>
                                                        <!--<div class="pricing-meta">
                                                            <ul>
                                                                <li class="old-price">€18.90</li>
                                                                <li class="current-price">€34.21</li>
                                                                <li class="discount-price">-5%</li>
                                                            </ul>
                                                        </div>-->
                                                    </div>
                                                    <div class="add-to-link-btns">
                                                        <!--<ul>
                                                            <li class="cart">--><center><a class="cart-btn btn txu" href="product_list?product=<?php echo base64_encode($rows['subcategory_id']);?>&sbc=<?php echo base64_encode($rows['subcategory_name']); ?>">View Products</a></center><!--</li>-->
                                                           <!-- <li>
                                                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                                            </li>-->
                                                     <!--   </ul> -->
                                                    </div>
                                                </article>
                                            </div>
											 <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Tab One End -->
                                    <!-- Tab Two Start -->
                                   
                                    <!-- Tab Two End -->
                                </div>
                                <!-- Shop Tab Content End -->
                                <!--  Pagination Area Start -->
                               <!-- <div class="pro-pagination-style text-center">
                                    <ul>
                                        <li>
                                            <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                                        </li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li>
                                            <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>-->
                                <!--  Pagination Area End -->
                            </div>
                            <!-- Shop Bottom Area End -->
                        </div>
                    </div>
                </div>
            </div>
			<?php }else{echo "<center><h3>Sorry No Sub Category is Available For Selected Category</h3></center>";} ?>
            <!-- Shop Category Area End -->
            <!-- Footer Area start -->
             <?php include("footer.php");?>
            <!--  Footer Area End -->
        </div>

        <!-- Modal -->
          <?php include("modal.php");?>
        <!-- Modal end -->

        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->
      <?php include("footer_link.php");?>
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/shop-4-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:30 GMT -->
</html>
