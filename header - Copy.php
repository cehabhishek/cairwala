<header class="main-header">
                <!-- Header top Area Start  -->
                <div class="header-top-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--Left Start-->
                            <div class="col-lg-4 col-md-4">
                                <div class="left-text">
                                    <p>Welcome You To Blooming Box Store!</p>
                                </div>
                            </div>
                            <!--Left end-->
                            <!--Right Start-->
                            <div class="col-lg-8 col-md-8 text-right">
                                <div class="header-right-nav">
                                   <!-- <ul class="res-xs-flex">
                                        <li class="after-n">
                                            <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Compare (0)</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Wishlist (0)</a>
                                        </li>
                                    </ul>-->
                                    <div class="dropdown-navs">
                                        <ul>
                                            <!-- Settings Start  -->
                                            <li class="dropdown">
											<?php if(isset($_SESSION['uemail'])){?>
                                                <a class="angle-icon" href="#"><?php echo $_SESSION['uname'];?></a>
												<?php }else{ ?>
                                                <a class="angle-icon" href="#">Account</a>
												<?php }?>
                                                <ul class="dropdown-nav">
												<?php if(isset($_SESSION['uemail'])){?>
                                                    <li><a href="user_profile.php">My Profile</a></li>
                                                    <li><a href="user_order.php">My Orders</a></li>
                                                    <li><a href="logout.php">Logout</a></li>
													<?php }else{ ?>
                                                    <li><a href="user_login.php">Login</a></li>
                                                    <li><a href="user_login.php">Register</a></li>
													<?php }?>
                                                </ul>
                                            </li>
                                            <!-- Settings Start  -->
                                            <!-- Currency Start -->
                                           <!-- <li class="top-10px first-child">
                                                <select>
                                                    <option value="1">USD $</option>
                                                    <option value="2">EUR €</option>
                                                </select>
                                            </li>  -->
                                            <!-- Currency End -->
                                            <!-- Language Start -->
                                            <!--<li class="top-10px mr-15px">
                                                <select>
                                                    <option value="1">English</option>
                                                    <option value="2">France</option>
                                                </select>
                                            </li>-->
                                            <!-- Language End -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Right end-->
                        </div>
                    </div>
                </div>
                <!-- Header top Area end  -->
                <!-- Header Navigation Area Start  -->
                <div class="header-navigation sticky-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--  Logo Area Start-->
                            <div class="col-md-2 col-sm-2">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/images/logo/logos1.jpg" height="75px" alt="" /></a>
                                </div>
                            </div>
                            <!--  Logo Area end-->
							
							
							
                            <div class="col-md-10 col-sm-10">
                                <div class="main-navigation d-none d-lg-block">
                                    <ul>
									<li><a href="index.php">Home</a></li>
                                        <li class="menu-dropdown">
                                            <a href="#">Shop <i class="ion-ios-arrow-down"></i></a>
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
                                                    <a href="#"><?php echo $arr_n[$i]; ?> <i class="ion-ios-arrow-down"></i></a>
                                                    <ul class="sub-menu sub-menu-2">
                                                        <?php for($k=0;$k<$scn;$k++){?>
														<li><a href="product_list.php?product=<?php echo base64_encode($arrs_id[$k]);?>&sbc=<?php echo base64_encode($arrs_na[$k]);?>"><?php echo $arrs_na[$k]; ?></a></li>
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
                                        
                                        
                                        
                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!-- Main Navigation Area end -->
                                <div class="header_account_area">
                                    <!-- Search start -->
                                    <div class="header_account_list search_list">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                        <div class="dropdown_search">
                                            <form action="single_product.php">
                                                <input class="search-field ui-autocomplete-input"  id="fullname" name='search_product' placeholder="Search entire store here ..." type="text" />
                                                
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
                                                            <h4><a href="single_product.php?product=<?php echo base64_encode($row3['ProductID']);?>"><?php echo $row3['Name'];?></a></h4>
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
                                                    <a class="default-btn" href="cart.php">View Cart</a>
                                                </div>
												<?php }else{ echo "<p><center><h5>Empty Cart</h5></center></p>";}?>
												
                                            </div>
                                        </div>
                                    </div>
                                    <!-- cart info  End -->
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-menu-area">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow" style="height: 490px;">
									<li><a href="index.php">Home</a></li>
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
														<li><a href="product_list.php?product=<?php echo base64_encode($arrs_id[$k]);?>&sbc=<?php echo base64_encode($arrs_na[$k]);?>"><?php echo $arrs_na[$k]; ?></a></li>
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
                                        
                                        <!--<li>
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li><a href="about.html">About Page</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="compare.html">Compare Page</a></li>
                                                <li><a href="login.html">Login & Regiter Page</a></li>
                                                <li><a href="my-account.html">Account Page</a></li>
                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                            </ul>
                                        </li>-->
                                        
                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- mobile menu end-->
                    </div>
                </div>
                <!--Header Bottom Account End -->
            </header>