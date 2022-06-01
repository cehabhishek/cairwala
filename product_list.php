<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/shop-4-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:30 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com! -Product List</title>
        <!-- Favicon -->
         <?php include("header_link.php");?>
		 <style>
		    .add-to-link ul li a {
				background: #1a6f40;
				color: #fff;
				padding: 3px;
				width: 100% !important;
				font-size: 12px !important;
				border-radius: 8px !important;
				height: 35px;
			}
		  .product-decs {
		  padding: 20px 15px 1px 15px!important;}
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
			<?php	 $sbc=base64_decode($_REQUEST['sbc']);
					 $id=base64_decode($_REQUEST['product']);
					 
					 $msqls="select * from products where SubName='$sbc' and status='1'";
					 $res=mysqli_query($conn,$msqls);
					 
			 
			 ?>
			
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading" id='ti'> <?php echo $sbc;?></h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Product List Grid</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- Shop Category Area End -->
			<?php if(mysqli_num_rows($res)>0){
				$sub_id=array();
				$product_name=array();
				$product_img1=array();
				$product_img2=array();
				$product_sub_cat_name=array();
				$product_price=array();
				$product_short_desc=array();
				$discount=array();
				$strike_price=array();
				$qty=array();
				while($rows=mysqli_fetch_array($res)){
					$sub_id[]=$rows['ProductID'];
					$product_name[]=$rows['Name'];
					$product_img1[]=$rows['Image1'];
					$product_img2[]=$rows['Image2'];
					$product_sub_cat_name[]=$rows['SubName'];
					$product_price[]=$rows['Price'];
					$product_short_desc[]=$rows['short_description'];
					$discount[]=$rows['discount'];
					$strike_price[]=$rows['strike_price'];
					$qty[]=$rows['quantitys'];
				}
					$pro_cnt=count($sub_id);
				?>
			
            <div class="shop-category-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- Shop Top Area Start -->
                            <div class="shop-top-bar">
                                <!-- Left Side start -->
                                <div class="shop-tab nav mb-res-sm-15">
                                    <a class="active" href="#shop-1" data-toggle="tab">
                                        <i class="fa fa-th show_grid"></i>
                                    </a>
                                    <a href="#shop-2" data-toggle="tab">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                    <p>There Are <?= $pro_cnt;?> Products.</p>
                                </div>
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
                            </div>
                            <!-- Shop Top Area End -->
			
							

                            <!-- Shop Bottom Area Start -->
                            <div class="shop-bottom-area mt-35">
                                <!-- Shop Tab Content Start -->
                                <div class="tab-content jump">
                                    <!-- Tab One Start -->
                                    <div id="shop-1" class="tab-pane active">
                                        <div class="row">
                                            <?php 
                                               
												for($i=0;$i<$pro_cnt;$i++){											 
											                

											?>
											
											<div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="list-product">
                                                    <div class="img-block">
													<center>
                                                        <a href="single_product?product=<?php echo base64_encode($sub_id[$i]);?>" class="thumbnail">
                                                            <img class="first-img" style="height:300px;width:300px" src="admin/product_image/<?php echo $product_img1[$i];?>" alt="" />
                                                            <img class="second-img" style="height:300px;width:300px" src="admin/product_image/<?php echo $product_img2[$i];?>" alt="" />
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
														 <?php if(!empty($discount[$i])){?>
														<li class="dis"><?php echo $discount[$i];?></li>
														<?php } ?>
                                                    </ul>
                                                    <div class="product-decs">
                                                        <a class="inner-link" href="#"><span><?php echo $product_sub_cat_name[$i];?></span></a>
                                                        <h2><a href="single_product.php?product=<?php echo base64_encode($sub_id[$i]);?>" class="product-link"><?php echo $product_name[$i];?></a></h2>
                                                        
														<div class="pricing-meta">
                                                            <ul>
                                                                <!--<li class="old-price">€18.90</li>-->
																 <?php if(!empty($strike_price[$i])){?> 
														<li class="old-price">&#8377;<?php echo $strike_price[$i];?></li>
														<?php }?>
                                                                <li class="current-price">&#8377;<?php echo $product_price[$i];?></li>
																<!--<li class=""><a href="javascript:void(0)" onclick=call_modal(<?php echo $sub_id[$i]; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>-->
                                                                <!--<li class="discount-price">-5%</li>-->
																<li class="">&nbsp;<?php  if($qty[$i] > 0){echo '<span style="color:green;font-weight:510">In Stock</span>';}else{echo '<span style="color:Red;font-weight:510">Out Of Stock</span>';}?></li>
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
																	  $id=base64_encode($sub_id[$i]);
																	  $pc=base64_encode($product_price[$i]);
																	  $qt=base64_encode($quantity);
																	 ?>
																	 <?php if($qty[$i] > 0){?>
                                                                   <a class="cart-btn btn txu" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a>
																		
																		<?php }else{?>
														<a class="btn button_color txu" href="javascript:void(0)" >COMMING SOON</a>
														<?php } ?>
                                                                        
                                                                    
                                                                </div>
                                                </article>
                                            </div>
												<?php } ?> 
                                            
                                        </div>
                                    </div>
                                    <!-- Tab One End -->
                                    <!-- Tab Two Start -->
                                    <div id="shop-2" class="tab-pane">
									    <?php 
														
														for($i=0;$i<$pro_cnt;$i++){											 
																	

													?>
                                        <div class="shop-list-wrap mb-30px scroll-zoom">
                                            <div class="row list-product m-0px">
                                                <div class="col-md-12">
                                                    <div class="row">
													
													
                                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                            <div class="left-img">
                                                                <div class="img-block">
                                                                    <a href="single_product?product=<?php echo base64_encode($sub_id[$i]);?>" class="thumbnail">
                                                                        <img class="first-img" src="admin/product_image/<?php echo $product_img1[$i];?>" alt="" />
                                                                        <img class="second-img" src="admin/product_image/<?php echo $product_img2[$i];?>" alt="" />
                                                                    </a>
                                                                   <!-- <div class="quick-view">
                                                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                                            <i class="ion-ios-search-strong"></i>
                                                                        </a>
                                                                    </div>-->
                                                                </div>
                                                                <ul class="product-flag">
                                                                    <li class="new">New</li>
																	 <?php if(!empty($discount[$i])){?>
														<li class="dis"><?php echo $discount[$i];?></li>
														<?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                            <div class="product-desc-wrap">
                                                                <div class="product-decs">
                                                                    <a class="inner-link" href="#"><span><?php echo $product_sub_cat_name[$i];?></span></a>
                                                                    <h2><a href="single_product?product=<?php echo base64_encode($sub_id[$i]);?>" class="product-link"><?php echo $product_name[$i];?></a></h2>
                                                                    <div class="rating-product">
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                    </div>
                                                                    <div class="pricing-meta">
                                                                        <ul>
																				<?php if(!empty($strike_price[$i])){?> 
															<li class="old-price">&#8377;<?php echo $strike_price[$i];?></li>
															<?php }?>
                                                                            <li class="current-price">&#8377;<?php echo $product_price[$i];?></li>
																			 <!--<li class=""><a href="javascript:void(0)" onclick=call_modal(<?php //echo $sub_id[$i]; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>-->
																			 <li class="">&nbsp;<?php  if($qty[$i] > 0){echo '<span style="color:green;font-weight:510">In Stock</span>';}else{echo '<span style="color:Red;font-weight:510">Out Of Stock</span>';}?></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="product-intro-info">
                                                                        <p><?php echo $product_short_desc[$i];?></p>
                                                                    </div>
                                                                    <!--<div class="in-stock">Availability: <span>299 In Stock</span></div>-->
                                                                </div>
                                                                <div class="add-to-link">
																  <?php 
																	  $quantity=1;
																	  $id=base64_encode($sub_id[$i]);
																	  $pc=base64_encode($product_price[$i]);
																	  $qt=base64_encode($quantity);
																	 ?>
                                                                    <ul>
																	 <?php if($qty[$i] > 0){?>
                                                                        <li class="cart"><a class="cart-btn" style="margin-top: 15px;" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a></li>
																		
																		<?php }else{?>
														<li class="cart"><a class="cart-btn" style="margin-top: 15px;" href="javascript:void(0)" >COMMING SOON</a></li>
														<?php } ?>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                            
													
													</div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
									
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
			<?php }else{echo"<center><h3><img src='assets/images/logo/pd_nt_avl.png'>Sorry No Product Is Available.</h3></center><div style='margin-bottom:40px'></div>";}?>
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
	  <script> 
	  $(function(){
		  $('title').html($('#ti').html());
	  });
	  
	  </script>
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/shop-4-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:30 GMT -->
</html>
