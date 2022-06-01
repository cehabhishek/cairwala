<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
          <title>The Chairwala.com</title>
        <!-- Favicon -->
         <?php include("header_link.php");?>
		 <style>
		    #p_names{
				font-weight:700;
			}
	        .add-to-link ul li a {
				background: #1a6f40;
				color: #fff;
				padding: 3px;
				width: 120px !important;
				font-size: 12px !important;
				border-radius: 8px !important;
				height: 35px;
				}
				.product-decs {
		          padding: 20px 15px 1px 15px!important;}
		    .txu{
			width: 130px!important;
			margin-left: 14px !important;
			}
			@media only screen and (max-width: 408px) {
  #cartimage {
    width:375px!important;
  }
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
              
			  
			  <?php include("db.php");
			   $sql='';
			   $p_id='';
               if(isset($_REQUEST['search_product']))
			   { $q='';
				   $cat=$_REQUEST['search_product'];
				   $msql="select * from products where Name like '%$cat%' OR Title like '%$cat%' OR SubName like '%$cat%' order by ProductID desc";
			       $resuts=mysqli_query($conn,$msql);
				   while($row=mysqli_fetch_array($resuts)){
					   $q=$row['ProductID'];
				   }
				    $p_id=$q;
			  }else{
			   $p_id=base64_decode($_REQUEST['product']);
			  }
			   
			 
			  $sql="select * from products where ProductID='$p_id' and status='1'";
			   
				$res=mysqli_query($conn,$sql);
				 
				
				
			  ?>
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
           <!-- <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 id='pd' class="breadcrumb-hrading"style="font-family:Georgia;color:#dbb955">Product Description</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li id="product_name">Single Product</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>-->
            <!-- Breadcrumb Area End -->
            <!-- Shop details Area start -->
            <section class="product-details-area mtb-60px">
                <div class="container">
                    <div class="row">
					     <?php
                                   $desc='';
								   $sub_cat_name='';
								   
               						 while($row=mysqli_fetch_array($res)){ 
									
					      ?>
					    
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-img product-details-tab">
                                <div class="zoompro-wrap zoompro-2">
                                    <div class="zoompro-border zoompro-span">
                                        <img class="zoompro" src="admin/product_image/<?php echo $row['Image1'];?>" data-zoom-image="admin/product_image/<?php echo $row['Image1'];?>" alt="" height="450px" width="600px" id="cartimage"/>
                                    </div>
									 <?php if(!empty($row['discount'])){?>
										<li class="dis"><?php echo $row['discount'];?></li>
										<?php } ?>
                                </div>
                                <div id="gallery" class="product-dec-slider-2">
                                    <a class="active" data-image="admin/product_image/<?php echo $row['Image2'];?>" data-zoom-image="admin/product_image/<?php echo $row['Image2'];?>">
                                        <img src="admin/product_image/<?php echo $row['Image2'];?>" alt="" />
                                    </a>
                                    <a data-image="admin/product_image/<?php echo $row['Image3'];?>" data-zoom-image="admin/product_image/<?php echo $row['Image3'];?>">
                                        <img src="admin/product_image/<?php echo $row['Image3'];?>" alt="" />
                                    </a>
                                    <a data-image="admin/product_image/<?php echo $row['Image4'];?>" data-zoom-image="admin/product_image/<?php echo $row['Image4'];?>">
                                        <img src="admin/product_image/<?php echo $row['Image4'];?>" alt="" />
                                    </a>
                                    <a data-image="admin/product_image/<?php echo $row['Image5'];?>" data-zoom-image="admin/product_image/<?php echo $row['Image5'];?>">
                                        <img src="admin/product_image/<?php echo $row['Image5'];?>" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-content">
                               <b> <h3 id="p_names" style="color:#254470;" ><?php echo $row['Name'];?></h3></b>
							     
                                <!--<p class="reference">Reference:<span> demo_17</span></p>-->
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <!--<span class="read-review"><a class="reviews" href="#rev">Read reviews </a></span>-->
                                </div>
                                <div class="pricing-meta">
                                    <ul>
									     <?php if(!empty($row['strike_price'])){?> 
											<li class="old-price">&#8377;<?php echo $row['strike_price'];?></li>
										<?php }?>
                                        <li class="old-price not-cut" style="color:black;font-size:30px;"><b>&#8377;</b><span id="tot_price"><b><?php echo $row['Price'];?></b></span></li>
										<input hidden id="per_itm_prc_new" value="<?php echo str_replace(',','',$row['Price']);?>">
										<input hidden id="per_itm_prc" value="<?php echo str_replace(',','',$row['Price']);?>">
                                    </ul>
                                </div><br>
                                <p style="color:#254470;"><?php echo $row['short_description'];?></p>
                               <br>
							    <?php  if($row['quantitys'] > 0){ ?>	
							   
                                <div class="pro-details-quality mt-0px">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" id="qunt" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#" onclick="add_to_cart_single(<?php echo $p_id;?>)"> + Add To Cart</a>
                                    </div>
                                </div>
								<?php }else{?>
											<a class="btn button_color " href="javascript:void(0)" >COMMING SOON </a>
											<?php } ?>
								
								
                                <div class="pro-details-wish-com">
								  <?php  if($row['quantitys'] > 0){echo '<span style="color:#254470;font-weight:510">In Stock</span>';}else{echo '<span style="color:Red;font-weight:510">Out Of Stock</span>';}?>
								
                                    <!--<div class="pro-details-wishlist">
                                        <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                    </div>-->
                                    <!--<div class="pro-details-compare">
                                       <a href="javascript:void(0)" onclick=call_modal(<?php //echo $row['ProductID']; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a>
                                    </div>-->
                                </div>
                                <!--<div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                                <div class="pro-details-policy">
                                    <ul>
                                        <li><img src="assets/images/icons/policy.png" alt="" /><span style="color:#254470;">Delivery All Over India</span></li>
                                        <li><img src="assets/images/icons/static-icons-3.png" alt="" /><span  style="color:#254470;">100% Secured Payment</span></li>
                                        
                                        <li><img src="assets/images/icons/policy-3.png" alt="" /><span  style="color:#254470;">100% Customer Satisfaction</span></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
						<?php 
						     $desc= $row['Description'];
						     $sub_cat_name= $row['SubName'];
						}?>
						
                    </div>
                </div>
            </section>
			
			
			
			
			
			
            <!-- Shop details Area End -->
            <!-- product details description area start -->
            <div class="description-review-area mb-60px">
                <div class="container">
                    <div class="description-review-wrapper">
                        <div class="description-review-topbar nav">
                            
                            <a class="active" data-toggle="tab" href="#des-details2">Description</a>
                            <a data-toggle="tab" id='rev' href="#des-details3">Reviews </a>
                        </div>
                        <div class="tab-content description-review-bottom">
                            <div id="des-details2" class="tab-pane active">
                                <div class="product-anotherinfo-wrapper"  style="color:#254470!important;">
                                    <p><?php echo $desc;?></p>
                                </div>
                            </div>
                           
                            <div id="des-details3" class="tab-pane" style="color:#254470;">
                                <div class="row">
								 <?php $msql="select * from reviews where product_id=$p_id order by id desc limit 30"; 
								
								    $resu=mysqli_query($conn,$msql);
									if(mysqli_num_rows($resu)>0){
									while($rows=mysqli_fetch_array($resu)){
								
								?>
								 
                                    <div class="col-lg-7">
                                        <div class="review-wrapper">
                                            <div class="single-review">
                                                <div class="review-img">
                                                    <img src="assets/images/testimonial-image/default-avatar.jpg" alt="" />
                                                </div>
                                                <div class="review-content">
                                                    <div class="review-top-wrap">
                                                        <div class="review-left">
                                                            <div class="review-name">
                                                                <h4><?php echo $rows['c_name']; ?></h4>
                                                            </div>
                                                            <div class="rating-product">
                                                                <?php $rate=  $rows['c_rating'];
																       if($rate>0){
																		   for($i=0;$i<=$rate;$i++){
																?>
																<i class="ion-android-star"></i>
																	   <?php }}else{ ?>
																		   <i class="ion-android-star"></i>
																		   <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="review-left">
                                                            <a href="#"> <?php echo date('d/m/Y',strtotime($rows['date'])); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p>
                                                            <?php echo $rows['c_comment']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
									<?php }} else{ echo "<p><center><h5>No Review Is Available For This Product</h5></center></p>";}?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
            <!-- product details description area end -->
            <!-- Recent Add Product Area Start -->
            
            <!-- Recent product area end -->
            <!-- Recent Add Product Area Start -->
			
			<?php   $sqls="select count(*) as no_of_product from products where SubName='$sub_cat_name' and ProductID!='$p_id'";
					 $ress=mysqli_query($conn,$sqls);
					 $no=0;
			          if(mysqli_num_rows($ress)>0){
                           while($rows=mysqli_fetch_array($ress)){
							   $no=$rows['no_of_product'];
					  }}
						  ?>
			
            <section class="recent-add-area mt-30 mb-30px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>In The Same Category</h2>
                                <p><?php echo $no; ?> other products in the same category:</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
						<?php $query="select *  from products where SubName='$sub_cat_name' and ProductID!='$p_id'";
							 $re=mysqli_query($conn,$query);
							 $no='';
							  if(mysqli_num_rows($re)>0){
								   while($rows=mysqli_fetch_array($re)){
									  
						
						?>
						
						
                        <article class="list-product" style="height:455px;">
                            <div class="img-block">
            					<?php $product_name=$row1['Name'];
									$replace_name=str_replace(' ','-',$product_name);
										$id=base64_encode($row1['ProductID']);
										?>
                                <a href="single_product?product=<?php echo $id;?>&&p_name=<?php echo $replace_name;?>" class="thumbnail">
                                    <img class="first-img" height="200px" src="admin/product_image/<?php echo$rows['Image1']?>" alt="" />
                                    <img class="second-img" height="200px" src="admin/product_image/<?php echo$rows['Image2']?>" alt="" />
                                </a>
                                <!--<div class="quick-view">
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>-->
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
								 <?php if(!empty($rows['discount'])){?>
							    	<li class="dis"><?php echo $rows['discount'];?></li>
								<?php } ?>
                            </ul>
                            <div class="product-decs">
                                <a class="inner-link" href="#"><span><?php echo $rows['SubName']?></span></a>
                                <h2><a href="single_product?product=<?php echo $id;?>&&p_name=<?php echo $replace_name;?>" class="product-link"><?php echo$rows['Name']?></a></h2>
                               
                                <div class="pricing-meta">
                                    <ul>
                                        
										 <?php if(!empty($rows['strike_price'])){?> 
										<li class="old-price">&#8377;<?php echo $rows['strike_price'];?></li>
										<?php }?>
                                        <li class="current-price">&#8377;<?php echo $rows['Price'];?></li>
                                       <!-- <li class=""><a href="javascript:void(0)" onclick=call_modal(<?php echo $rows['ProductID']; ?>)><i class="ion-ios-box-outline"></i> Check Availability</a></li>-->
									    <li class="">&nbsp;<?php  if($rows['quantitys'] > 0){echo '<span style="color:#254470;font-weight:510">In Stock</span>';}else{echo '<span style="color:Red;font-weight:510">Out Of Stock</span>';}?></li>
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
									  $id=base64_encode($rows['ProductID']);
									  $pc=base64_encode($rows['Price']);
									  $qt=base64_encode($quantity);
									 ?>
									 	 <?php  if($rows['quantitys'] > 0){ ?>	
									<a class="cart-btn btn txu" href="#" onclick="addtocart('<?php echo $id;?>','<?php echo $pc; ?>','<?php echo $qt; ?>')">ADD TO CART </a>
									<?php }else{?>
											<a class="btn button_color txu" href="javascript:void(0)" >COMMING SOON </a>
											<?php } ?>
                             </div>
                        </article>
							  <?php }}?>
                        <!-- Single Item -->
                       
                      
                    </div>
                    <!-- Recent product slider end -->
                </div>
            </section>
            <!-- Recent product area end -->
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
  $(".cart-plus-minus").click(function() { 
  var $button = $(this);
  var oldValue = $button.parent().find("input").val();
  
  var pr=$("#per_itm_prc").val();
  price=parseFloat(pr);
 
  if ($button.text() === "+") {
    var newVal = parseFloat(oldValue) * price;
  } else {
    // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) * price;
    } else {
      newVal = price;
    }
  }
  
  $("#per_itm_prc_new").val(newVal);
  $("#tot_price").html(newVal);
});

function add_to_cart_single(id){
	 var qt= $('#qunt').val();
	  var pr=$('#per_itm_prc_new').val();
	
	$.ajax({
		url:'add_to_cart_for_single_product.php',
		type:'post',
		data:'id='+id+'&qt='+qt+'&pr='+pr,
		success:function(data){
			$("#c_out").html(data);
			$(".count-cart").click();
			 count_cart();
		}
		
	});
	
	
}


$(function(){
	$('title').html($('#p_names').html());
	$('#pd').html($('#p_names').html());
	$('#product_name').html($('#p_names').html());
	
});

	</script>  
	  
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
</html>
