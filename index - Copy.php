<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:50 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Welcome You To Blooming Box Store!</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
    </head>

    <body class="home-3">
       

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Area Start  -->
            <?php include("header.php");?>
			
            <!--  Main Header End -->
            <!-- Slider Arae Start -->
			<?php  include('db.php'); $query=mysqli_query($conn,"select * from slider");?>
		
            <div class="slider-area">
                <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                    <!-- Slider Single Item Start -->
					<?php while($row=mysqli_fetch_array($query))
							{
								$slider=$row['slider'];
					?>
                    <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url(admin/uploads/<?php echo $slider;?>);">
                        <div class="container">
                            <!--<div class="slider-content-5 slider-animated-1 text-left">
                                <span class="animated">100% NATURAL</span>
                                <h1 class="animated">
                                    Fresh Lemonade <br />
                                    Summer Drinks
                                </h1>
                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                            </div>-->
                        </div>
                    </div>
					<?php } ?>
                    <!-- Slider Single Item End -->
                    <!-- Slider Single Item Start -->
                   <!-- <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url(assets/images/slider-image/sample-6.jpg);">
                        <div class="container">
                            <div class="slider-content-5 slider-animated-1 text-left">
                                <span class="animated">100% PURE & NATURE</span>
                                <h1 class="animated">
                                    Fresh Mango Juice<br />
                                    Just Fruit
                                </h1>
                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                            </div>
                        </div>
                    </div>-->
                    <!-- Slider Single Item End -->
                </div>
            </div>
			
            <!-- Slider Arae End -->
            <!-- Banner Area Start -->
            <section class="categorie-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Popular Categories</h2>
                                <p>Add Popular Categories to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Category Slider Start -->
                    
                      <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Product Single Item -->
						 <?php
                         $q="select * from category limit 50";
                            $ses=mysqli_query($conn,$q);	
                                 if(mysqli_num_rows($ses)>0){
									 while($row=mysqli_fetch_array($ses)){
								 							

						?>	
						
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
								<center>
                                    <a href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>" class="thumbnail">
                                        <img class="first-img" src="admin/subcategory_image/<?php echo $row['banner'];?>" style="height:200px;width:200px;" alt="" />
                                        <img class="second-img" src="admin/subcategory_image/<?php echo $row['banner'];?>" style="height:200px;width:200px;" alt="" />
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
                                    <!--<a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>-->
									<a class="inner-link" href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>"  target="_blank"><span><?php echo $row['category_name'];?></span></a>
                                   <!--<h2><a href="single-product.html" class="product-link">Originals Kaval Windbr...</a></h2>-->
                                  
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                   
                                </div>
                                <div class="add-to-link">
                                    <ul>
								
                                        <!--<li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>-->
                                        <li class="cart"><a class="cart-btn" href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>" target="_blank">View All</a></li>
										
                                        
                                    </ul>
                                </div>
                            </article>
                            
                        </div>
						 <?php }} ?>
                      
                        
                    </div>
                      
                    <!-- Category Slider Start -->
                </div>
            </section>
            <!-- Banner Area End -->
            <!-- Static Area Start -->
            <section class="static-area mtb-60px">
                <div class="container">
                    <div class="static-area-wrap">
                        <div class="row">
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                                    <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Shipping</h4>
                                        <p>On all orders over &#8377;500.00</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Returns</h4>
                                        <p>Returns are free within 9 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pb-res-xs-0 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-3.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>100% Payment Secure</h4>
                                        <p>Your payment are safe with us.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Support 24/7</h4>
                                        <p>Contact us 24 hours a day</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Static Area End -->
            <!-- Best Sells Area Start -->
            <section class="best-sells-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2>Best Sellers</h2>
                                <p>Add bestselling products to weekly line up</p>
                            </div>
                            <!-- Section Title Start -->
                        </div>
                    </div>
                    <!-- Best Sell Slider Carousel Start -->
                    <div class="best-sell-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
				   <?php
					include("db.php");
						$query1=mysqli_query($conn,"select * from products where is_best_seller='Yes' order by ProductID desc LIMIT 10");
					?>
					<?php while($row1=mysqli_fetch_array($query1)){ ?>
					   <article class="list-product mb-30px">
                                <div class="img-block">
                                    <center>
									<a href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>" class="thumbnail">
                                        <img class="first-img" src="admin/product_image/<?php echo $row1['Image1'];?>" style="height:200px;width:200px;" alt="" />
                                        <img class="second-img" src="admin/product_image/<?php echo $row1['Image1'];?>"style="height:200px;width:200px;" alt="" />
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
                                    <!--<a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>-->
									<a class="inner-link" href="#"><span><?php echo $row1['SubName'];?></span></a>
                                   <!--<h2><a href="single-product.html" class="product-link">Originals Kaval Windbr...</a></h2>-->
                                   <h2> <a  class="product-link" href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>"><?php echo substr($row1['Name'],0,20);?></a></h2>
                                     <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">&#8377;<?php echo $row1['Price'];?></li>-->
                                            <li class="current-price">&#8377;<?php echo $row1['Price'];?></li>
                                            <!--<li class="discount-price">-10%</li>-->
                                        </ul>
                                    </div>
									<div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                   
                                </div>
                                <div class="add-to-link">
                                    <ul>
									<?php 
												  $quantity=1;
												  $id=base64_encode($row1['ProductID']);
												  $pc=base64_encode($row1['Price']);
												  $qt=base64_encode($quantity);
												 ?>
                                        <!--<li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>-->
                                        <!--<li class="cart"><a class="cart-btn" href="addtocart.php?id=<?php echo $id;?>&pc=<?php echo $pc; ?>&qt=<?php echo $qt; ?>">ADD TO CART </a></li>-->
										<li class="cart"><a class="cart-btn" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a></li>
                                       
                                    </ul>
                                </div>
                            </article>
						<?php }?>
                       
                        <!-- Single Item -->
                    </div>
                    <!-- Best Sell Slider Carousel End -->
                </div>
            </section>
           
            <!-- Feature area 2 End -->

            <!-- Hot deal area Start -->
            <section class="hot-deal-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Hot Deals</h2>
                                <p>Add hot products to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Hot Deal Slider 2 Start -->
                    <div class="hot-deal-2 owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block">
                                    <a href="#" class="thumbnail">
                                        <img class="first-img" src="assets/images/product-image/organic/product-16.jpg" alt="" />
                                        <img class="second-img" src="assets/images/product-image/organic/product-16.jpg" alt="" />
                                    </a>
                                    <div class="quick-view">
                                        <!--<a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>-->
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="#"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="#" class="product-link">Originals Kaval Windbreaker Wint...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">&#8377;418.90</li>
                                            <li class="current-price">&#8377;34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="in-stock">Availability: <span>300 In Stock</span></div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/03/01"></div>
                                </div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block">
                                    <a href="#" class="thumbnail">
                                        <img class="first-img" src="assets/images/product-image/organic/product-11.jpg" alt="" />
                                        <img class="second-img" src="assets/images/product-image/organic/product-12.jpg" alt="" />
                                    </a>
                                    <div class="quick-view">
                                       <!-- <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>-->
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="#"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="#" class="product-link">Originals Kaval Windbreaker Wint...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">&#8377;128.90</li>
                                            <li class="current-price">&#8377;34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="in-stock">Availability: <span>300 In Stock</span></div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/03/01"></div>
                                </div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src="assets/images/product-image/organic/product-15.jpg" alt="" />
                                        <img class="second-img" src="assets/images/product-image/organic/product-2.jpg" alt="" />
                                    </a>
                                    <div class="quick-view">
                                       <!-- <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>-->
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="#"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="#" class="product-link">New Balance Fresh Foam Kaymin</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">&#8377;138.90</li>
                                            <li class="current-price">&#8377;34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="in-stock">Availability: <span>299 In Stock</span></div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/03/01"></div>
                                </div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src="assets/images/product-image/organic/product-14.jpg" alt="" />
                                        <img class="second-img" src="assets/images/product-image/organic/product-14.jpg" alt="" />
                                    </a>
                                    <div class="quick-view">
                                        <!--<a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>-->
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Madden by Steve Madden Cale 6</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">&#8377;128.90</li>
                                            <li class="current-price">&#8377;34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="in-stock">Availability: <span>299 In Stock</span></div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/03/01"></div>
                                </div>
                            </div>
                        </article>
                        <!-- Single Item -->
                    </div>
                    <!-- Hot Deal Slider 2 Start -->
                </div>
            </section>
            <!-- Hot Deal Area End -->
            <!-- Recent Add Product Area Start -->
            <section class="recent-add-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>New Arrivals</h2>
                                <p>Add new products to weekly line up</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Product Single Item -->
						<?php
						include("db.php");
       						$query1=mysqli_query($conn,"select * from products order by ProductID desc LIMIT 24");
						?>
						<?php while($row1=mysqli_fetch_array($query1)){ ?>
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
								   <center>
                                    <a href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>" class="thumbnail">
                                        <img class="first-img" src="admin/product_image/<?php echo $row1['Image1'];?>" style="height:200px;width:200px;" alt="" />
                                        <img class="second-img" src="admin/product_image/<?php echo $row1['Image1'];?>"style="height:200px;width:200px;" alt="" />
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
                                    <!--<a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>-->
									<a class="inner-link" href="#"><span><?php echo $row1['SubName'];?></span></a>
                                   <!--<h2><a href="single-product.html" class="product-link">Originals Kaval Windbr...</a></h2>-->
                                   <h2> <a  class="product-link" href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>"><?php echo substr($row1['Name'],0,20);?></a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">&#8377;<?php echo $row1['Price'];?></li>-->
                                            <li class="current-price">&#8377;<?php echo $row1['Price'];?></li>
                                            <!--<li class="discount-price">-10%</li>-->
                                        </ul>
                                    </div>
									<div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    
                                </div>
                                <div class="add-to-link">
                                    <ul>
									<?php 
												  $quantity=1;
												  $id=base64_encode($row1['ProductID']);
												  $pc=base64_encode($row1['Price']);
												  $qt=base64_encode($quantity);
												 ?>
                                        <!--<li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>-->
                                       <li class="cart"><a class="cart-btn" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a></li>
										
                                        <!--<li>
                                            <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li>
                                            <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
                                        </li>-->
                                    </ul>
                                </div>
                            </article>
                            
                        </div>
						 <?php } ?>
                      
                        
                    </div>
                    <!-- Recent Area Slider End -->
                </div>
            </section>
            <!-- Recent product area end -->
            <!-- Brand area start -->
            <div class="brand-area">
                <div class="container">
                    <div class="brand-slider owl-carousel owl-nav-style owl-nav-style-2">
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/1.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/2.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/3.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/4.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/5.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/1.jpg" alt="" /></a>
                        </div>
                        <div class="brand-slider-item">
                            <a href="#"><img src="assets/images/brand-logo/2.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- Blog Area End -->
            <!-- Category Area Start -->
            
            <!-- Category Area End -->
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

        <!--====== Vendors js ======-->
      <?php include("footer_link.php");?>
	  
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:54 GMT -->
</html>
