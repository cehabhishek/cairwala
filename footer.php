<style>

@media only screen and (max-width: 445px) {
	 #img
{
	position: fixed;
		top: 80%;
		
		z-index:2;
		
		
}
#tely
{
	display:block!important;
}
#what
{
	display:block!important;
}	
	
}

</style>

<!--quriycalling start--->
<div class="row" id="img" >
<div class="col-sm-12">
    <!--<a href="tel:9479777365" title="Click to call me" target="_blank">
<img src="assets/call.png" alt="carehealth" height="50px" width="55px" style="display:none;" id="tely"></a>-->
<img src="assets/whatsup.png" border="0"  height="70px" width="80px" style="display:none;margin-left:300px;
    margin-top: -60px;"  id="what" class="float-right"style="margin-left: 300px;"> 
</div>

</div>
	<!-----Category section start----->
	<div class="footer-bottom" Style="background:#f0f0f0;border-top:1px solid;border-color:#fff;padding-top:10px;color:#254470;">
                    <div class="container">
                        <div class="row">
                           <nav class="navbar navbar-expand-lg  ">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
	<?php
		include('db.php');
		$query="select * from category limit 11";
		$res=mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($res))
		{
	?>
      <li class="nav-item active">
        <a class="nav-link" href="index"><?php echo $row['category_name'];?> |<span class="sr-only">(current)</span></a>
      </li>
		<?php } ?>
    </ul>
  </div>
</nav>
                            
                        </div>
                    </div>
                </div>

<!-----Category section end----->	
<!--quriycalling end--->
<footer class="footer-area" style="background:#fff">
                <div class="footer-top"style="background:#254470!important;color:white;font-weight:600;" >
                    <div class="container">
                        <div class="row">
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-4">
                                <!-- footer logo -->
                                <div class="footer-logo" >
									<span style="color:white;font-weight:600;font-size:25px;">The Chairwala.com</span>
                                    <!--a href="index.php"><img class='logoss' id="logow" src="admin/images/chairwala1.jpg" style="width: 200px;height: 120px;" alt="" /></a-->
                                </div>
                                <!-- footer logo -->
                                <div class="about-footer">
                                   <p class="text-info" style=""><h5>Address: </h5>.S-14/84-G-1-M..Near Patel Dharsala Teliabagh, Varanasi, Uttar Pradesh,221002</p>
                                    <div class="need-help">
                                        <p class="phone-info" >
                                            NEED HELP?
                                                <span>
                                              <p class="phone-info">Customer Support:0522-4026921</p>
                                              <p class="phone-info">Customer Support:+91-9958457125 </p>
                                                <p>Email:Info@chairwala.com</p>
													
			
			
			
                                            </span>
                                        </p>
                                    </div>
                                     <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/mimanshanaturecare/"><i class="ion-social-facebook" style="color:#7a7ad2"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter" style="color:#2abddf"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-youtube"style="color:#f01414"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google" style="color:#5570ff"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/mimanshanaturecare?igshid=if2ssd4646ke"><i class="ion-social-instagram" style="color:#dfa561"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Information</h4>
                                    <div class="footer-links">
                                        <ul>
                                            
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="sitemap.xml">Sitemap</a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                            <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Sign in / sign up Links</h4>
                                    <div class="footer-links">
                                        <ul>
										    <li><a href="user_login">Login</a></li>
                                            <li><a href="user_login">Register</a></li>
                                           <!-- <li><a href="return.php">Refund Policy</a></li>
                                            <li><a href="terms.php">Term & Condition</a></li>
                                            <li><a href="privacy.php">Privacy Policy</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
							<div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Custom Links</h4>
                                    <div class="footer-links">
                                        <ul>
										    <li><a href="#">Refund Policy</a></li>
                                            <li><a href="#">Term & Condition</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer single wedget -->
                           <!-- <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Download Our Mobile App</h4>
                                    <div class="subscrib-text">
                                       <p>Download Our Mobile Application From Google Play.</p>
                                    </div>
                                    <!--<div id="mc_embed_signup" class="subscribe-form">
                                        <form
                                            id=""
                                            class=""
                                            novalidate=""
                                            target="_blank"
                                            name=""
                                            method=""
                                            action=""
                                        >
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required="" placeholder="Enter your email here.." name="" value="" />
                                                <div class="mc-news" aria-hidden="true" style="position: absolute; left: -5000px;">
                                                    <input type="text" value="" tabindex="-1" name="" />
                                                </div>
                                                <div class="clear">
                                                    <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="img_app">
                                       
                                        <a href="#"><img src="assets/images/icons/pngwing.png"  style="max-width:280px;" alt="" /></a>
                                    </div>
                                </div>
                            </div>-->
                            <!-- footer single wedget -->
                        </div>
                    </div>
                </div>
                <!--  Footer Bottom Area start -->
	
                <div class="footer-bottom" Style="background:white;border-top:1px solid;border-color:#fff;padding-top:10px;color:#254470;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-4">
                                <p class="copy-text">Copyright © <a href="#"><span  style="color:#254470;font-weight:600;"></span></a> All Rights Reserved</p>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <img class="payment-img" src="assets/images/icons/payment.png" alt="" />
                            </div>
							<div class="col-md-6 col-lg-4">
                                <p class="copy-text">Developed By <a target='_blank' href='Webazu.in'><span style="color:#254470;font-weight:600;">Webazu Technology(OPC) Pvt. Ltd.</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Footer Bottom Area End-->
            </footer>