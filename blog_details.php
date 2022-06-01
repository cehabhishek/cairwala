<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
                  <title>Mimansha Nature Care! - Blogs Details</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
	   <style>
			.blog-image img {
			width:50%
			 }
		 </style>
    </head>
    <body class='home-3'> 
       <?php include("db.php");?>
	  <?php
	      $id=$_REQUEST['id'];
	    $cat=$_REQUEST['cat'];
		  
	  ?>

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
            <?php include("header.php");?>
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading"> Blog Details</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li> Blog Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
             <div class="shop-category-area single-blog">
                <div class="container">
                    <div class="row">
					
                        <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                            <div class="blog-posts">
							<?php
							  $sql="select * from blog_data where id='$id'";
                              $res=mysqli_query($conn,$sql);
							if($rows=mysqli_fetch_array($res)){   
							   
							
							?>
                                <div class="single-blog-post blog-grid-post">
                                    <div class="blog-post-media">
                                        <div class="blog-image single-blog">
                                            <a href="#"><img height='200px' src="admin/blog/<?php echo $rows['photo'];?>" alt="blog"></a>
                                        </div>
                                    </div>
                                    <div class="blog-post-content-inner">
                                        <h4 class="blog-title"><a href="#"><?php echo $rows['related_to'];?>:<?php echo $rows['topic'];?></a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> <?php echo $rows['author'];?></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i>  <?php echo date('d/m/Y',strtotime($rows['published_on']));?></a>
                                            </li>
                                        </ul>
                                      
										  <?php echo html_entity_decode($rows['content']);?>
										 
                                           
                                    </div>
                                
                                </div>
								<?php }?>
                                <!-- single blog post -->
                            </div>
                            
                                                                                   
                        </div>
					
                        <!-- Sidebar Area Start -->
                        <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-res-md-60px mb-res-sm-60px">
                            <div class="left-sidebar">
                                <!-- Sidebar single item -->
                                
                                <!-- Sidebar single item -->
                                <!-- Sidebar single item -->
                                                               <!-- Sidebar single item -->
                                <div class="sidebar-widget mt-40">
                                    <div class="main-heading">
                                        <h2>Recent Post</h2>
                                    </div>
                                    <div class="recent-post-widget">
									   <?php
									     $sqls="select * from blog_data where related_to='$cat' limit 10";
										  $res1=mysqli_query($conn,$sqls);
										  if(mysqli_fetch_row($res1)>0){
											while($row=mysqli_fetch_array($res1)){   
										   
										
										?>
                                        <div class="recent-single-post d-flex">
                                            <div class="thumb-side">
                                                <a href="#"><img src="admin/blog/<?php echo $row['photo'];?>" alt=""></a>
                                            </div>
                                            <div class="media-side">
                                                <h5><a href="blog_details.php?id=<?php echo $row['id'];?>&cat=<?php echo $row['related_to']; ?>"><?php echo $row['topic'];?></a> </h5>
                                                <span class="date"><?php echo $row['published_on'];?></span>
                                            </div>
                                        </div>

										  <?php }}else{ echo"No Related Topic Available.";}?>
                                    </div>
                                </div>
                                <!-- Sidebar single item -->
                                
                                <!-- Sidebar single item -->
                            </div>
                        </div>
                        <!-- Sidebar Area End -->
                    </div>
                </div>
            </div>
            <!-- Footer Area start -->
             <?php include("footer.php");?>
            <!--  Footer Area End -->
        </div>

        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->

        <!--====== Vendors js ======-->
      <?php include("footer_link.php");?>


    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
</html>
