<style>

@media screen and (max-width:600px){
	.hidden_section{
		display:none;
	}
} 
.dropdown_search {
	border-radius:0px!important;
}
.breadcrumb-hrading{
	color:#254470!important;
	font-weight:600;
}
.breadcrumb-links li{
		color:#254470!important;
}
.breadcrumb-links li a{
		color:#254470!important;
}

</style>
 <!--====== PRELOADER PART START ======-->

    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> 

        <!--====== PRELOADER PART ENDS ======-->

<header class="main-header">
                <!-- Header top Area Start  -->
                <div class="header-top-nav desk">
                    <div class="container-fluid">
                        <div class="row">
                            <!--Left Start-->
                            <div class="col-lg-4 col-md-4">
                                <div class="left-text lt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<!--<span style="font-size:28px;">&#9755;</span>
                                     <a href="user_login" style="color:white!important;font-weight:600;font-size:16px;;">Login</a>-->
                                </div>
                            </div>
                            <!--Left end-->
                            <!--Right Start-->
                            <div class="col-lg-8 col-md-8 text-right rts">
                                <div class="header-right-nav rt">
                                   
                                    <div class="dropdown-navs">
                                        <ul>
                                            <!-- Settings Start  -->
                                            <li class="dropdown">
											<?php if(isset($_SESSION['uemail'])){?>
                                                <a class="angle-icon" href="#"><?php $ssa=explode(' ',$_SESSION['uname']); echo $ssa[0];?></a>
												<?php }else{ ?>
                                                <a class="angle-icon" href="#" style="color:white;font-weight:600;">Account</a>
												<?php }?>
                                                <ul class="dropdown-nav">
												<?php if(isset($_SESSION['uemail'])){?>
                                                    <li><a href="user_profile">My Profile</a></li>
                                                    <!--li><a href="user_order">My Orders</a></li-->
                                                    <li><a href="logout">Logout</a></li>
                                                    <!--li><a href="#">Addresses</a></li>
                                                    <li><a href="shoppingaddress">Shopping Address</a></li-->
                                                   
													<?php }else{ ?>
                                                    <li><a href="user_login">Login</a></li>
                                                    <li><a href="user_login">Register</a></li>
													<?php }?>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Right end-->
                        </div>
                    </div>
                </div>
                <!-- Header top Area end  -->
				   <!-- Header top email mobile no start area  -->
				 <div class="header-top-nav hidden_section">
                    <div class="container-fluid">
                        <div class="row">
					
                            
                            <div class="col-lg-4 col-md-4 hidden-sm hidden-md">
                                <div class="left-text lt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <span><i class="far fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email:info@chairwala.com </span>|
							   <span style="margin-left:10px;"><i class="fa fa-mobile-alt" aria-hidden="true"></i> +91-9958457125</span>
                                     <!--<a href="user_login" style="color:white!important;font-weight:600;font-size:16px;;"><i class="icon ion-ios-contact" style="font-size:42px;"></i>Login</a>-->
                                </div>
                            </div>
                         
							 <div class="col-lg-3 col-md-3 text-right">
                          
                            </div>
							 <div class="col-lg-5 col-md-5">
                            </div>
                            
                        </div>
                    </div>
                </div>
				   <!-- Header top mobile email  Area end  -->
                <!-- Header Navigation Area Start  -->
                <div class="header-navigation sticky-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--  Logo Area Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="logo">
                                    <a href="index"><img class='logoss' id="logow" src="admin/images/chairwala1.jpg" style="width: 150px;height: 90px;" alt="" /></a><!--<a class="mart" href="contact.php">NVDS MART</a>-->
                                <div class="main-navigation d-none d-lg-block">
                                    <ul>
									
									 <li class="header_account_list search_list">
                                       
                                        <div class="dropdown_search" style='display:block;right:-520px;top:-10px;width:312px;border:2px solid #254470;'>
                                            <form action="single_product">
                                                <input class="search-field ui-autocomplete-input"  id="fullname1" name='search_product' placeholder="Search" type="text" />
                                                
                                                <button type="submit"><i class="ion-ios-search-strong" style="color:#e2e8e5!important;"></i></button>
                                            </form>
										</div>
                                        </li>
									
									
                                        <li class="menu-dropdown">
                                            
											    <ul class="sub-menu">
											<?php
                               include('db.php');
							    $sqls="select * from category";
                                $res=mysqli_query($conn,$sqls);
								$arr=array();
								$arr_n=array();
								#$arrs_id=array();
								#$arrs_na=array();
								if(mysqli_num_rows($res)>0){
									while($rows=mysqli_fetch_array($res))
									{
									    $arr[]=$rows['category_id'];
										$arr_n[]=$rows['category_name'];
								}
								$cn=count($arr);
								
								for($i=0;$i<$cn;$i++){
								$arrs_id=array();
								$arrs_na=array();
								  $msqls="select * from sub_category where category_id=$arr[$i]";
                                $res1=mysqli_query($conn,$msqls);
								
								
								if(mysqli_num_rows($res1)>0){
									while($rows1=mysqli_fetch_array($res1)){
										$arrs_id[]=$rows1['subcategory_id'];
										$arrs_na[]=$rows1['subcategory_name'];
									  } 
									  $scn=count($arrs_na);
									  #print_r($arrs_na);
									  
								?>
                                          
                                                <li class="menu-dropdown position-static">
                                                    <a style="color:#100d31 !important;" href="#"><?php echo $arr_n[$i]; ?> <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <?php for($k=0;$k<$scn;$k++){?>
														<li><a style="color:#100d31 !important;" href="product_list?product=<?php echo base64_encode($arrs_id[$k]);?>&sbc=<?php echo base64_encode($arrs_na[$k]);?>"><?php echo $arrs_na[$k]; ?></a></li>
                                                        <?php }?>
                                                    </ul>
                                                </li>
											
                                          <?php     
								   
								   }
								  }
								}
							?>         
                                           </ul>    
                                        </li>
                                         
                                    </ul>
                                </div>
								</div>
								
                            </div>
							
							
							
                            <!--  Logo Area end-->
							
							
							
                            <div class="col-md-9 col-sm-6">
                                <div class="main-navigation d-none d-lg-block">
                                    <ul style="margin-left: 190px;">
									
									 <li class="header_account_list search_list">
                                       
                                        <!--<div class="dropdown_search" style='display:block;right:-485px;top:-32px;width:312px;border:2px solid #254470;'>
                                            <form action="single_product.php">
                                                <input class="search-field ui-autocomplete-input"  id="fullname1" name='search_product' placeholder="Search" type="text" />
                                                
                                                <button type="submit"><i class="ion-ios-search-strong" style="color:#e2e8e5!important;"></i></button>
                                            </form>
										</div>--->
                                        </li>
									
									
                                        <?php
										include('db.php');
														$sqls="select * from category limit 5";
														$res=mysqli_query($conn,$sqls);
														while($rows=mysqli_fetch_array($res))
															{  $name=$rows['category_name']; 
															  $cat_id=$rows['category_id']; 
																?>
										  <li class="menu-dropdown">
                                            <a href="#"><?php echo $name;?><i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                                 <?php 
													$sqlss="select * from sub_category where category_id='$cat_id'";
														$res1=mysqli_query($conn,$sqlss);
													while($rowss=mysqli_fetch_array($res1))
															{ 
														$sub_id=$rowss['category_id'];
														$sub_name=$rowss['subcategory_name'];
													?>
                                                <li class="menu-dropdown position-static">
                                                    <a href="#"><?php echo $rowss['subcategory_name'];?> <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <?php 
												 $sqls1="select * from products where Category='$sub_id' and SubName='$sub_name'";
														$res2=mysqli_query($conn,$sqls1);
													while($rowss1=mysqli_fetch_array($res2))
															{ 
														$arrs_id=$rowss1['Category'];
										                $arrs_na=$rowss1['SubName'];
													?>
                                                        <li><a href="sub_product_list?product=<?php echo base64_encode($arrs_id);?>&sbc=<?php echo base64_encode($arrs_na);?>"><?php echo $rowss1['Name'];?></a></li>
                                                       <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php  } ?>
                                            </ul>
                                        </li>
																<?php
															}
										
										?>    
                                           <li class="menu-dropdown">
                                            <a href="#"><!--<i class="icon ion-ios-briefcase" style="font-size: 38px;"></i>-->More</a>
											    <ul class="sub-menu" style="margin-left: -600px;width: 590px;">
											<?php
                               include('db.php');
							    $sqls="select * from category";
                                $res=mysqli_query($conn,$sqls);
								$arr=array();
								$arr_n=array();
								#$arrs_id=array();
								#$arrs_na=array();
								if(mysqli_num_rows($res)>0){
									while($rows=mysqli_fetch_array($res))
									{
									    $arr[]=$rows['category_id'];
										$arr_n[]=$rows['category_name'];
								}
								$cn=count($arr);
								
								for($i=0;$i<$cn;$i++){
								$arrs_id=array();
								$arrs_na=array();
								  $msqls="select * from sub_category where category_id=$arr[$i]";
                                $res1=mysqli_query($conn,$msqls);
								
								
								if(mysqli_num_rows($res1)>0){
									while($rows1=mysqli_fetch_array($res1)){
										$arrs_id[]=$rows1['subcategory_id'];
										$arrs_na[]=$rows1['subcategory_name'];
									  } 
									  $scn=count($arrs_na);
									  #print_r($arrs_na);
									  
								?>
                                          
                                                <li class="menu-dropdown position-static">
                                                    <a style="color:#100d31 !important;" href="#"><?php echo $arr_n[$i]; ?> <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <?php for($k=0;$k<$scn;$k++){?>
														<li><a style="color:#100d31 !important;" href="product_list?product=<?php echo base64_encode($arrs_id[$k]);?>&sbc=<?php echo base64_encode($arrs_na[$k]);?>"><?php echo $arrs_na[$k]; ?></a></li>
                                                        <?php }?>
                                                    </ul>
                                                </li>
											
                                          <?php     
								   
								   }
								  }
								}
							?>         
                                           </ul>    
                                        </li>
										
										
										
										
										
                                    </ul>
                                </div>
                                <!-- Main Navigation Area end -->
                                <div class="header_account_area">
                                    <!-- Search start -->
                                    <div class="header_account_list search_list desk_search">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong" style="color:#fff!important;"></i></a>
                                        <div class="dropdown_search">
                                            <form action="single_product">
                                                <input class="search-field ui-autocomplete-input"  id="fullname" name='search_product' placeholder="Search" type="text" />
                                                
                                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Search  End -->
                                    <!-- cart info start  -->
									<?php $cur=$_SESSION["SystemID"];
											$p=0;
												$query1=mysqli_query($conn,"select count(CartID) as abc from cart where SystemID='$cur'");
																					
														if($row1=mysqli_fetch_array($query1))
														{
														 $p=$row1['abc'];
														} 
									?>
                                    <div class="cart-info d-flex">
                                        <div class="mini-cart-warp">
                                            <a href="#" class="count-cart"><span id='p_count' class='product-quantity' style="left: -28px;display:block;"><?php echo $p;?></span></a>
                                            <div class="mini-cart-content" id="c_out">
											
											<?php $cur=$_SESSION["SystemID"];	 
                                                  $qe="select * from cart where SystemID='$cur'";
												  $query2=mysqli_query($conn,$qe);?>
												<!-------------------------------------------------------------->
												<?php   while($row2=mysqli_fetch_array($query2)) {
													 $pid=$row2['ProductID'];
													 $sql="select p.Image1,p.ProductID,p.Name,c.CartID,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
													 $query3=mysqli_query($conn,$sql);
													 while($row3=mysqli_fetch_array($query3)) {
														  $row3['ProductID'];
												?>
                                                <ul>
                                                    <li class="single-shopping-cart">
                                                        <div class="shopping-cart-img">
                                                            <a href="#"><img alt="" src="admin/product_image/<?php echo $row3['Image1'];?>" /></a>
                                                            <span class="product-quantity"><?php echo $row3['Quantity'];?></span>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="single_product?product=<?php echo base64_encode($row3['ProductID']);?>"><?php echo $row3['Name'];?></a></h4>
                                                            <span><?php echo $row3['Price'];?></span>
                                                            <div class="shopping-cart-delete">
                                                                <a href="#" onclick='del_cart(<?php echo $row3['CartID']?>)'><i class="ion-android-cancel"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
												<?php }}?>
                                                <!--<div class="shopping-cart-total">
                                                    <h4>Subtotal : <span>$20.00</span></h4>
                                                    <h4>Shipping : <span>$7.00</span></h4>
                                                    <h4>Taxes : <span>$0.00</span></h4>
                                                    <h4 class="shop-total">Total : <span>$27.00</span></h4>
                                                </div>-->
												 <?php  
													$cur=$_SESSION["SystemID"];								
													$query1=mysqli_query($conn,"select count(CartID) as abc from cart where SystemID='$cur'");
													  if($row1=mysqli_fetch_array($query1))
															{
															 $p=$row1['abc'];
															}
												?>
												<?php if($p!=0){ ?>
                                                <div class="shopping-cart-btn text-center">
                                                    <a class="default-btn" href="cart">View Cart</a>
                                                </div>
												<?php }else{ echo "<p><center><h5>Empty Cart</h5></center></p>";}?>
												
                                            </div>
                                        </div>
                                    </div>
                                    <!-- cart info  End -->
									<div class="cart-info  desktopes">
									  <div class="dropdown-navs">
                                        <ul>
                                            <!-- Settings Start  -->
                                            <li class="dropdown">
											<?php if(isset($_SESSION['uemail'])){?>
                                                <a class="" href="#" style="color:#254470!important;"><center><i class="icon ion-ios-contact" style="font-size:42px;"></i></center><?php $ssa=explode(' ',$_SESSION['uname']); echo $ssa[0];?></a>
												<?php }else{ ?>
                                                <a class="" href="#" style="color:#254470!important;"><i class="icon ion-ios-contact" style="font-size:42px;"></i></a>
												<?php }?>
                                                <ul class="dropdown-nav">
												<?php if(isset($_SESSION['uemail'])){?>
                                                    <li><a href="user_profile">My Profile</a></li>
                                                    <!--li><a href="user_order">My Orders</a></li>
                                                    <li><a href="logout">Logout</a></li>
													<li><a href="#">Addresses</a></li>
                                                    <li><a href="shoppingaddress">Shopping Address</a></li-->
													<li><a href="logout">Logout</a></li>
													<?php }else{ ?>
                                                    <li><a href="user_login">Login</a></li>
                                                    <li><a href="user_login">Register</a></li>
													<?php }?>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
									
									</div>
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-menu-area">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow" style="height: 490px;color:black;">
									<li><a href="index">Home</a></li>
                                        <li>
                                            <a href="#">Shop</a>
                                            <ul>
                                                
												    <?php
													   include('db.php');
														$sqls="select * from category";
														$res=mysqli_query($conn,$sqls);
														$arr=array();
														$arr_n=array();
														#$arrs_id=array();
														#$arrs_na=array();
														if(mysqli_num_rows($res)>0){
															while($rows=mysqli_fetch_array($res))
															{
																$arr[]=$rows['category_id'];
																$arr_n[]=$rows['category_name'];
														}
														$cn=count($arr);
														
														for($i=0;$i<$cn;$i++){
														$arrs_id=array();
														$arrs_na=array();
														  $msqls="select * from sub_category where category_id=$arr[$i]";
														$res1=mysqli_query($conn,$msqls);
														
														
														if(mysqli_num_rows($res1)>0){
															while($rows1=mysqli_fetch_array($res1)){
																$arrs_id[]=$rows1['subcategory_id'];
																$arrs_na[]=$rows1['subcategory_name'];
															  } 
															  $scn=count($arrs_na);
															  #print_r($arrs_na);
															  
														?>
                                
												   <li>
                                                    <a href="#"><?php echo $arr_n[$i]; ?></a>
                                                    <ul>
                                                        <?php for($k=0;$k<$scn;$k++){?>
														<li><a href="product_list?product=<?php echo base64_encode($arrs_id[$k]);?>&sbc=<?php echo base64_encode($arrs_na[$k]);?>"><?php echo $arrs_na[$k]; ?></a></li>
                                                        <?php }?>
                                                    </ul>
													</li>
													       <?php     
								   
														   }
														  }
														}
														
													?>  
                                                
                                                
                                            </ul>
                                        </li>
                                        
                                      
                                         <!--li><a href="blog.php">Blogs</a></li>
                                        <li><a href="contact.php">Contact Us</a></li--->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end-->
                    </div>
                </div>
                <!--Header Bottom Account End -->
            </header>