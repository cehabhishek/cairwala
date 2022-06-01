<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="windows-1252">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Mimansha Nature Care!</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
    
	<style>
	  @media screen and (max-width:500px){
		  .mob{
			  height:200px;
		  }
		  .slider-height-6 {
			   height:200px!important;
		  }
	  }
	  

.blog:hover
{
	transform: scale(1.5)!important;

}


.add-to-link-btns a {
    display: inline-block;
    background: #253237;  
   /* background: #00923f; */
    color: #fff;
    font-weight: 700;
    padding: 10px 18px;
    border-radius: 5px;
    border: none;
    line-height: 18px;
    height: 38px;
    width: auto;
    cursor: pointer;
    font-size: 14px;
    text-transform: capitalize;
    position: relative;
    z-index: 1;
    transition: all .3s ease-in-out;
	
}
.txu{
	margin: 10px 28% !important;
}
.btn:hover {
    color: #59b059!important;
    text-decoration: none;
}

	</style>
	</head>
    <body class="home-3">
       

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Area Start  -->
            <?php include("header.php");?>
			
            <!--  Main Header End -->
            <!-- Slider Arae Start -->
			<?php  include('db.php'); $query=mysqli_query($conn,"select * from slider");?>
		
            <div class="slider-area" style="overflow-x: hidden;">
                <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                    <!-- Slider Single Item Start -->
					<?php while($row=mysqli_fetch_array($query))
							{
								$slider=$row['slider'];
					?>
                    <!--<div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" style="background-image: url(admin/uploads/<?php echo $slider;?>);">-->
                    <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img" >
                       <img class="mob" src="admin/uploads/<?php echo $slider;?>" height="100%" width="100%" />
                    </div>
					<?php } ?>
                    
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
                                <h2> Shop by Category</h2>
                                <p></p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Category Slider Start -->
                    
                      
                      <div class="row">
								  <?php
								 $q="select * from category limit 12";
									$ses=mysqli_query($conn,$q);	
										 if(mysqli_num_rows($ses)>0){
											 while($row=mysqli_fetch_array($ses)){
											 $tots=0;
											 $nor=$row['category_id'];
											    $num_pro=mysqli_query($conn,"select count(Name) as totss from products where Category='$nor'");
												  while($row234=mysqli_fetch_array($num_pro)){
													  $tots=$row234['totss'];
												  }													  
																

								?>	
											
											<div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <center>
															<a href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>" class="thumbnail">
																<img class="first-img" src="admin/subcategory_image/<?php echo $row['banner'];?>" style="height:300px;width:300px" alt="" />
																
															</a>
														</center>
                                                     
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                    <div class="product-decs">
                                                       
                                                        <h2><a class='product-link' href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>"  target="_blank"><span><?php echo $row['category_name'];?></span></a></h2>
                                                        
														<!-- <p>Available Products- <?php //echo $tots;?></p> -->
														
														<!--<div class="rating-product">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                        </div>-->
                                                        
                                                    </div>
                                                   <!--  <div class="add-to-link">
													<ul>
												
														
													   <li class="cart"><a class="btn" href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>" target="_blank">View All</a></li>
														
													
													</ul>
												</div>-->
												<a class="btn btn-primary form-control button_color" href="sub_cat.php?cn=<?php echo base64_encode($row['category_name']);?>&id=<?php echo base64_encode($row['category_id']);?>" target="_blank">View All </a>
                                                </article>
                                            </div>
												 <?php }} ?>
                                            
                             </div>
                        
                    
                      
                    <!-- Category Slider Start -->
                </div>
            </section>
			<section class="static-area mtb-60px">
                <div class="container">
                    <div class="static-area-wrap">
                        <div class="row">
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                                    <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive">
                                    <div class="single-static-meta">
                                        <h4>Free Shipping</h4>
                                        <p>On all orders over Rs. 500.00</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Single Item End -->
                            <!-- Static Single Item Start -->
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-2.png" alt="" class="img-responsive">
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
                                    <img src="assets/images/icons/static-icons-3.png" alt="" class="img-responsive">
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
                                    <img src="assets/images/icons/static-icons-4.png" alt="" class="img-responsive">
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
			<section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-res-sm-50px">
                            <div class="about-left-image">
                                <img  src="assets/images/img/slider6.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="about-title">
                                    <h2>Welcome to Mimansha Nature Care Pvt. Ltd.</h2>
                                </div>
                                <!--<p class="mb-30px">
								Do you feel a trail of negative thoughts running in your mind, wondering to stay fit and healthy?
								Do not let that happen.
                                 </p>-->
                                <p>
                                  Mimansha Nature care Pvt. Ltd. is a marketing company and a division of Mimansha Herbals- 
								  A manufacturer of research-based Ayurvedic and herbal Products. DR. MEENAKSHI SINGH is the former scientist 
								  of National Botanical Research Institute, CSIR, Lucknow Scientist & Owner of Mimansha Herbal, which is a 
								  non-government organization created in 2009 based on Lucknow under her able guidance. 
								  She has 21 years experience in the field of "Herbal Technology".
									<b>#Mimansha Nature Care</b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row mt-60px">
                        <div class="col-md-4 mb-res-sm-30px">
                            <div class="single-about">
                                <h4>Our Company</h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing
                                    elit.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-res-sm-30px">
                            <div class="single-about">
                                <h4>Our Team</h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing
                                    elit.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-about">
                                <h4>Testimonial</h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing
                                    elit.
                                </p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </section>
            <!-- Banner Area End -->
            <!-- Static Area Start -->
            
			<!--<section class="static-area mtb-60px">
                <div class="container">
                    <div class="static-area-wrap">
                        <div class="row">
                            
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                                    <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Shipping</h4>
                                        <p>On all orders over &#8377;500.00</p>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Free Returns</h4>
                                        <p>Returns are free within 9 days</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pb-res-xs-0 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-3.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>100% Payment Secure</h4>
                                        <p>Your payment are safe with us.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                                <div class="single-static pt-res-md-30 pb-res-sm-30 pt-res-xs-20">
                                    <img src="assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                                    <div class="single-static-meta">
                                        <h4>Support 24/7</h4>
                                        <p>Contact us 24 hours a day</p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </section>-->
			
			<div class="banner-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="banner-wrapper">
                                <a href="#"><img src="assets/images/img/Slide2.JPG" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 mt-res-sx-30px">
                            <div class="banner-wrapper">
                                <a href="#"><img src="assets/images/img/Immunearth.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 mt-res-sx-30px">
                            <div class="banner-wrapper">
                                <a href="#"><img src="assets/images/img/Slide3.JPG" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
            <!-- Static Area End -->
            <!-- Best Sells Area Start -->
            <section class="best-sells-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2>Best Sellers</h2>
                                <p>Best selling products this week</p>
                            </div>
                            <!-- Section Title Start -->
                        </div>
                    </div>
                    <!-- Best Sell Slider Carousel Start -->
                   
					<div class="row">
								 <?php include("db.php");
									$query1=mysqli_query($conn,"select * from products where is_best_seller='Yes' and status='1' order by ProductID desc LIMIT 24");
								?>
								<?php while($row1=mysqli_fetch_array($query1)){ ?>
											
											<div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <center>
														<a href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>" class="thumbnail">
															<img class="first-img" src="admin/product_image/<?php echo $row1['Image1'];?>" style="height:300px;width:300px" alt="" />
														   
														</a>
													   </center>
                                                     
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="#"><span><span><?php echo $row1['SubName'];?></span></a>
                                                        <h2><a class='product-link' href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>"><?php echo substr($row1['Name'],0,30);?></a></h2>
                                                        
														<div class="pricing-meta">
                                                            <ul>
                                                                <!--<li class="old-price">§Ó??18.90</li>-->
                                                                <li class="current-price">&#8377;<?php echo $row1['Price'];?></li>
                                                                <li class=""><a href="javascript:void(0)" onclick=call_modal(<?php echo $row1['ProductID']; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>
															  <!--<li class="discount-price">-5%</li>-->
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
													
                                                     <div class="add-to-link-btns">
                                   
													<?php 
																  $quantity=1;
																  $id=base64_encode($row1['ProductID']);
																  $pc=base64_encode($row1['Price']);
																  $qt=base64_encode($quantity);
																 ?>
														<!--<li class="cart"><a class="btn" href="#">ADD TO CART </a></li>-->
													  <a class="btn button_color txu" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a>
														
													
												
												</div>
                                                </article>
                                            </div>
												<?php } ?> 
                                            
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
                                <p>Hot deal on products listed below </p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Hot Deal Slider 2 Start -->
                    <div class="hot-deal-2 owl-carousel owl-nav-style">
                        <!-- Single Item -->
						 <?php include("db.php");
									$query1=mysqli_query($conn,"select * from products where hot_deal='Yes' and status='1' order by ProductID desc LIMIT 24");
								?>
								<?php while($row1=mysqli_fetch_array($query1)){ ?>
						
						
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block">
								  <center>
                                    <a  href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>" class="thumbnail">
                                       <img class="first-img" src="admin/product_image/<?php echo $row1['Image1'];?>" style="height:300px;width:300px" alt="" />
                                       
                                    </a>
								</center>	
									
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
                                    <a class="inner-link" href="#"><span><?php echo $row1['SubName'];?></span></a>
                                    <h2><a class='product-link' href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>"><?php echo substr($row1['Name'],0,38);?></a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            
                                            <li class="current-price">&#8377;<?php echo $row1['Price'];?></li>
											&nbsp;&nbsp;&nbsp;
											 <li class=""><a href="javascript:void(0)" onclick=call_modal(<?php echo $row1['ProductID']; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>
                                            
                                        </ul>
                                    </div>
									<div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                     <span ><?php echo substr($row1['short_description'],0,90);?> <a class='product-link' style="font-size:12px;" href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>">Read More..</a> </span>
                                    <div class="add-to-link-btns">
									<?php 
									  $quantity=1;
									  $id=base64_encode($row1['ProductID']);
									  $pc=base64_encode($row1['Price']);
									  $qt=base64_encode($quantity);
									 ?>
                                       <!-- <ul>-->
                                           <!-- <li class="cart button_color">--><a class="btn float-rigth button_color" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a><!--</li>-->
                                           
                                        <!--</ul>-->
                                    </div>
                                </div>
                               <!-- <div class="in-stock">Availability: <span>300 In Stock</span></div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/03/01"></div>
                                </div>-->
                            </div>
                        </article>
                        <!-- Single Item -->
								<?php } ?>
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
                                <p>New products arrived this week</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                   				
							<div class="row">
								 <?php include("db.php");
									$query1=mysqli_query($conn,"select * from products where  status='1' order by ProductID desc LIMIT 24");
								?>
								<?php while($row1=mysqli_fetch_array($query1)){ ?>
											
											<div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <center>
														<a href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>" class="thumbnail">
															<img class="first-img" src="admin/product_image/<?php echo $row1['Image1'];?>" style="height:300px;width:300px" alt="" />
														   
														</a>
													   </center>
                                                     
                                                    </div>
                                                    <ul class="product-flag">
                                                        <li class="new">New</li>
                                                    </ul>
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="#"><span><span><?php echo $row1['SubName'];?></span></a>
                                                        <h2><a class='product-link' href="single_product.php?product=<?php echo base64_encode($row1['ProductID']);?>"><?php echo substr($row1['Name'],0,30);?></a></h2>
                                                        
														<div class="pricing-meta">
                                                            <ul>
                                                                <!--<li class="old-price">§Ó??18.90</li>-->
                                                                <li class="current-price">&#8377;<?php echo $row1['Price'];?></li>
                                                                <li class=""><a href="javascript:void(0)" onclick=call_modal(<?php echo $row1['ProductID']; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>
																<!--<li class="discount-price">-5%</li>-->
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
                                                     <div class="add-to-link-btns">
                                   <!-- <ul> -->
													<?php 
																  $quantity=1;
																  $id=base64_encode($row1['ProductID']);
																  $pc=base64_encode($row1['Price']);
																  $qt=base64_encode($quantity);
																 ?>
														<!--<li class="cart"><a class="btn" href="#">ADD TO CART </a></li>-->
													   <!--<li class="cart button_color">--><a class="btn button_color txu" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a><!--</li>-->
														
													
													<!--</ul>-->
												</div>
                                                </article>
                                            </div>
												<?php } ?> 
                                            
                             </div>
					
					
					
					
					
					
                    <!-- Recent Area Slider End -->
                </div>
            </section>
			</br>
			</br>
			<!--<section class="blog-area mb-60px" style="background:aliceblue;margin-top: -4%;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-top:100px;">
                           
                            <div class="section-title underline-shape">
                                <h2>Latest Blogs</h2>
                                <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                            </div>
                          
                        </div>
                    </div>
					
				
					
                  
                    <div class="blog-slider-active owl-carousel owl-nav-style-3">
                        	<?php  $sq="select * from blog_data order by id desc limit 20 ";
								    $res=mysqli_query($conn,$sq);
									 while($row=mysqli_fetch_array($res)){ ?>
                      
                        <article class="blog-post">
                            <div class="blog-post-top">
                                <div class="blog-img banner-wrapper">
								
                                    <a href="#" ><img class="blog" src="admin/blog/<?php echo $row['photo'];?>" alt="" style="width: 407px; height: 227px;"/></a>
                                </div>
                                </br>
                                <h4 class="blog-post-heading" ><a href="#"style="color:black;height: 154px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['topic'];?></a></h4>
                              	
                            </div>
                            
                            <div class="blog-post-content">
                                <h4 class="blog-title full-right" style="margin-top: 275px;"><a href="#"><?php echo $row['related_to'];?></a></h4>
                                </br>
                                <p class="blog-text" style="color:green;">
                                   <?php echo $row['author'];?>&nbsp;|<i class="ion-calendar"></i> &nbsp;<?php echo date('d/m/Y',strtotime($row['published_on']));?>
                                </p>
                                <a class="read-more-btn" href="blog_details.php?id=<?php echo $row['id'];?>&cat=<?php echo $row['related_to'];?>" style="color:black;"> Read More <i class="ion-android-arrow-dropright-circle"></i></a>
                            </div>
                        </article>
							 <?php }?>
                       
                    </div>
                    </br>
				
					
					
					
                  
                </div>
            </section> -->
            <!-- Recent product area end -->
            <!-- Brand area start -->
            <!--<div class="brand-area">
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
            </div>-->
           
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
</html>
