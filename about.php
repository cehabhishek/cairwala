<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:39 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com! -About Us </title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
	   <style>
		.pad_top{
			padding:20px 0px;
			color:#254470;
		}
		.para_top_pad{
			padding:20px 5px 0px 5px;
			color:#254470;
		}
	   </style>
    </head>
    <body class='home-3'>
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->

        

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Start -->
              <?php include("header.php");?>
			
            <!--  Main Header End -->
            <!-- Slider Arae Start -->
			
                
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">About Us</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>About Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- contact area start -->
            <div class="contact-area mtb-60px">
                <div class="container">
                   
                    <div class="custom-row-2">
                        <div class="col-lg-3 col-md-5">
                           <img style="width:100%" src="assets/images/menakshi.jpg"/>
						   <h5 class="pad_top">

							DR. MEENAKSHI SINGH
							<br>
							Founder Mimansha Nature Care Pvt. Ltd
							</h5>
							 <img style="width:100%" src="assets/images/hari.jpg"/>
							 <h5 class="pad_top">

							Mr. Hari Shankar Singh
							<br>
							Managing Director
							<br>
							Mimansha nature care Pvt. Ltd.
							</h5 >
                        </div>
                        <div class="col-lg-9 col-md-7">
                            <h2 style="color:#254470;">Welcome To Mimansha Nature Care Pvt. Ltd.</h2>
							<p class="para_top_pad">
								Mimansha Nature care Pvt. Ltd. is a marketing company and a division of Mimansha Herbals- A manufacturer of research-based Ayurvedic and herbal Products. DR. MEENAKSHI SINGH is the former scientist of National Botanical Research Institute, CSIR, Lucknow Scientist & Owner of Mimansha Herbal, which is a non-government organization created in 2009 based on Lucknow under her able guidance. She has 21 years experience in the field of “Herbal Technology”.
								</p>
								
								<p class="para_top_pad">
								We, Mimansha Herbals, assure that all our Products are 100% Natural and Biodegradable. It is a Certified Company and licensed by the Ministry of AYUSH and encourages healthy living practices by bringing holistic solutions for everyday issues. We believe that it is possible to ensure good health, and dedicated to the cause of delivering quality herbal solutions, Mimansha Herbals strives to provide high quality herbal products to allow you to get away from the chemicals you use in your daily life. Mimansha Herbals has a Good Manufacturing Practices (GMP) certificate that ensures the quality of products manufactured is of a high standard.</p>
								 <p class="para_top_pad">
								The goal of our company is to introduce new and developed products, constantly staying in touch with the latest in technology and the needs of the consumer.
								</p>
								
								<p class="para_top_pad">
								Amidst the hustle- bustle of modern life what makes us embark on a disease free and happy life? What fuels the journey of life and what gives it momentum? A few moments of reflection in the silent depths of our hearts May be useful to find answer to these questions. Nature is bountiful. Knowledge and ancient wisdom of Ayurveda is providing holistic medicines to the world in a pioneering way. Its treatment is profound and it develops mind, body and soul. In Pandemic Covid – 19 periods, the role of Ayurveda as immuno-modulator and in treatment is immense. Mimansha Nature Care products are genuine, pure and are doing a tremendous job in providing original plant based Ayurvedic medicines, quality sanitizers and other valuable products.
								</p>
								
								<p class="para_top_pad">
								We wish all the very best to Mimansha Nature Care for providing genuine Ayurvedic medicines to human being. We always look forward hearing from you at www.mimanshanaturecare.co.in.
								</p>
								
								<p class="para_top_pad">
								Thanking you
								</p>
								
                        </div>
                    </div>
					
                </div>
            </div>
            <!-- contact area end -->
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
	  
	  
	  
	  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	 <script>
	function sweet(){
		
		swal("Message Sent Successfully !", "", "success");
	}
</script>


<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']==1001){   ?>
	    <script> sweet()   </script>
<?php }  ?>
	  
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:39 GMT -->
</html>
