<?php include("session_random.php");?>
<?php
// including database connection
require 'db.php';

if(isset($_GET['page'])){
    // if get page number through url and check it is a valid number
    $page_num = filter_var($_GET['page'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 1,
            'min_range' => 1
        ]
    ]); 
    
}else{
    //default page number
    $page_num = 1;
}
// set how much show posts in a single page
$page_limit = 6;
// Set Offset
$page_offset = $page_limit * ($page_num - 1);

function showPosts($conn, $current_page_num, $page_limit, $page_offset){
    
    // query of fetching posts
    $query = mysqli_query($conn,"SELECT * FROM `blog_data` ORDER BY id DESC LIMIT $page_limit OFFSET $page_offset");
    
    // check database is not empty
    if(mysqli_num_rows($query) > 0){
        
        // fetching data
		echo'<div class="blog-posts">
                                <div class="row">';
		
        while($row = mysqli_fetch_array($query)){ 
          //  echo '<li><h2>'.$row['title'].'</h2><p>'.$row['body'].'</p></li>';
			  $day=date('d',strtotime($row['published_on']));
			  $mon= date('M',strtotime($row['published_on']));
			  $yrs= date('Y',strtotime($row['published_on']));
			  $cont=html_entity_decode(substr($row['content'], 0, 100));
			  
							echo"<div class='col-md-4 mb-res-sm-30px'>
                                        <div class='single-blog-post blog-grid-post'>
                                            <div class='blog-post-media'>
                                                <div class='blog-image'>
                                                    <a href='blog_details.php?id=$row[id]&cat=$row[related_to]'><img src='admin/blog/$row[photo]' height=200px alt='blog'></a>
                                                </div>
                                            </div>
                                            <div class='blog-post-content-inner mt-30'>
                                                <h4 class='blog-title'><a href='blog_details.php?id=$row[id]&cat=$row[related_to]'>$row[topic]</a></h4>
                                                <ul class='blog-page-meta'>
                                                    <li>
                                                        <a href='#'><i class='ion-person'></i> Category: $row[related_to]</a>
                                                    </li>
													 <li>
                                                        <a href='#'><i class='ion-person'></i> By: $row[author]</a>
                                                    </li>
                                                    <li>
                                                        <a href='#'><i class='ion-calendar'></i> $day $mon, $yrs</a>
                                                    </li>
                                                </ul>
                                                <p>
                                                  $cont
                                                </p>
                                                <a class='read-more-btn' href='blog_details.php?id=$row[id]&cat=$row[related_to]'> Read More <i class='ion-android-arrow-dropright-circle'></i></a>
                                            </div>
                                        </div>
                                        <!-- single blog post -->
                                    </div>";
			
								}
        //onclick='show_content($row[id]);'
        // total number of posts
        $total_posts = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `blog_data`"));
        
        // total number of pages
        $total_page = ceil($total_posts / $page_limit);
        // set next page number
        $next_page = $current_page_num+1; 
        // set prev page number
        $prev_page = $current_page_num-1; 
		
		echo"</div></div>";
		echo'<div class="pro-pagination-style text-center">
					<ul>';
       //showing prev button and check current page number is greater than 1
        if($current_page_num > 1){
         //  echo '<a href="?page='.$prev_page.'" class="page_link">Prev</a>';
		   echo'<li ><a href="?page='.$prev_page.'"><i class="ion-ios-arrow-left"></i></a></li>';
        }
        // show all number of pages
        for($i = 1; $i <= $total_page; $i++){
            //highlight the current page number
            if($i == $current_page_num){
               // echo '<a href="?page='.$i.'" class="page_link active_page">'.$i.'</a>';
				echo'<li ><a class="active" href="?page='.$i.'">'.$i.'</a></li>';
            }else{
               // echo '<a href="?page='.$i.'" class="page_link">'.$i.'</a>';
				echo'<li><a href="?page='.$i.'">'.$i.'</a></li>';
            }
            
        }
        // showing next button and check this is last page
        if($total_page+1 != $next_page){
           //echo '<a href="?page='.$next_page.'" class="page_link">Next</a>';
		   echo '<li ><a  href="?page='.$next_page.'"><i class="ion-ios-arrow-right"></i></a></li>';
        }
        
						echo '</ul>
						</div>';
		
    }else{
        echo "No Blog found !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
          <title>Mimansha Nature Care! - Blogs </title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
    </head>
    <body class='home-3'> 
	<?php include("db.php");?>
     <?php
							  $sql="select * from blog_data order by id desc";
                              $res=mysqli_query($conn,$sql);
							//if($rows=mysqli_fetch_array($res))						   
							
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
                                <h1 class="breadcrumb-hrading"> Blogs</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li> Blogs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
           <div class="shop-category-area blog-grid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                           
                           <?php 
						// call showPosts function 
						showPosts($conn, $page_num, $page_limit, $page_offset);
						?>   
                        </div>
                        <!-- Sidebar Area Start -->
                        
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
