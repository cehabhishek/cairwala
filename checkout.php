<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:31:04 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com-Checkout</title>
           <?php include("header_link.php");?>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
   <style>
.ss{width:100%!important;}


#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(assets/loader.gif) no-repeat center center;
  z-index: 10000;
}
label{
	color:black;
}
li{
	color:black;
}
</style>
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
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Checkout Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Checkout</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- checkout area start -->
			
			
            <div class="checkout-area mt-60px mb-40px">
                <div class="container">
                     <div class="row">
					     <div class="col-lg-6">
                            <div class="billing-info-wrap">
							<?php if(!isset($_SESSION['uemail'])){?>
								<div class="checkout-account mb-50px">
								  <input class="checkout-toggle2" type="checkbox">
								  <label style="font-weight: 700;font-size: 16px;color:red">Already Have Account,Please Login!</label>
								</div>
								 <div class="checkout-account-toggle open-toggle2 mb-30">
                                    <input name="email" id="email_login" placeholder="Email address" type="email" required />
                                    <input name="password" class='pass' id="password_login" placeholder="Password" type="password" required /><i class="fa fa-eye" style="margin-left:-20px;" onclick='shows()'></i>
                                    <button class="btn-hover checkout-btn float-right" onclick="login_ajax()" type="submit">Login</button>
                                </div>
							<?php }else{?>
							<div class="checkout-account mt-50" style="margin-top:-50px">
								<input class=""id="add_chk" onclick='get_address()' type="checkbox" />
								<label style="font-weight: 700; font-size: 16px;color:#254470;">Use My Save Address</label>
                            </div>	
							<?php }?>
							
				        	</div>
					     </div>
						
					</div>
					<div class="row">
					    <div class="col-lg-7">
                            <div class="billing-info-wrap">
							   
							
                               
                                <div class="row">
								    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
								          <h3>Personal Details</h3>	 
										 </div> 
									</div>	 
								
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20px">
                                            <label>Enter Name*</label>
                                            <input name='name' id='billing_name' placeholder="Enter Name" value='' type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20px">
                                            <label>Enter Mobile Number*</label>
                                             <input name='mobile' id='billing_mobile' value='' placeholder="Enter Mobile" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Enter Email Id*</label>
                                            <input name='email' id='billing_emailid' value='' placeholder="Enter Email Id" type="text" />
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="billing-info mb-20px">
											<h3>Shipping Details</h3>
										</div>	
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Address Line1*</label>
                                            <input class="billing-address" id='billing_address1' name='address' placeholder="Enter Address Line1"  type="text" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Landmark</label>
                                            <input type="text" id='bill_landmark' name='landmark' placeholder="Enter Landmark"  />
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>City*</label>
                                            <input type="text" id='bill_city' name='city' placeholder="Enter City"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>State*</label>
                                             <input type="text" id='bill_state' name='state' placeholder="Enter State" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>Pincode*</label>
                                            <input type="text" id='bill_pincode' name='pin' placeholder="Enter Pincode" />
                                        </div>
                                    </div>
									 
									  
                                    
									
                               
									<?php if(!isset($_SESSION['uemail'])){?>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">									
											<h3>Enter Your Credintials</h3>	 
										</div>
									</div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Password*</label>
                                            <input type="password" class='pass' id='bill_password' placeholder="Enter Password" name='password' /><i class="fa fa-eye" style="margin-left:-20px;" onclick='shows()'></i>
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Confirm Password*</label>
                                            <input type="password" class='cpass' id='bill_confirm_password' placeholder="Enter Confirm Password" name='cpassword' /><i class="fa fa-eye" style="margin-left:-20px;" onclick='cshows()'></i>
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                        <div class="billing-info mb-20px">
									     <button class="btn btn-primary float-right reg_btn_shw" onclick="register_ajax()" type="button">Register Now</button>
									   </div>
								    </div> 

                                     
									<div class="col-lg-12 otp_ver" style="display:none">
                                        <div class="billing-info mb-20px">
                                            <label>Enter OTP*</label>
                                            <input type="password" class='' id='reg_otp' name='otp_reg' placeholder="Enter OTP" />
                                        </div>
                                    </div>
									<div class="col-lg-12 otp_ver" style="display:none">
                                        <div class="billing-info mb-20px">
									     <button class="btn btn-primary " onclick="verify_ajax()" type="button">Verify</button>
										 <button class="btn btn-primary float-right" onclick="register_ajax()" type="button">Resend</button>
									   </div>
								    </div> 
									

									
									<?php }?>
									
                                </div>
								
                             
								
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                            <ul>
                                                <li style="color:#254470;">Product</li>
                                                <li style="color:#254470;">Total</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
											    <?php 
												  $toatl_price=0;
												  $cur=$_SESSION["SystemID"];	 
                                                  $qe1="select * from cart where SystemID='$cur'";
												  $query21=mysqli_query($conn,$qe1);?>
												<!-------------------------------------------------------------->
												<?php  
												    if(mysqli_num_rows($query21)>0){
       												while($row2=mysqli_fetch_array($query21)) {
													 $pid=$row2['ProductID'];
													 $sql11="select p.Image1,p.ProductID,p.Name,c.CartID,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
													 $query31=mysqli_query($conn,$sql11);
													 while($row3=mysqli_fetch_array($query31)) {
														  $row3['ProductID'];
														  $p_price=floatval($row3['Price']);
														  $toatl_price+= $p_price;
												?>
                                                <li><span class="order-middle-left"><?php echo $row3['Name'];?> X <?php echo $row3['Quantity'];?></span> <span class="order-price"><?php echo '&#8377;'.$p_price;?> </span></li>
													<?php }}}else{
														Echo "No Products Is Added To Cart";
													}?>
                                            </ul>
                                        </div>
										 <div class="your-order-bottom">
													<ul>
													   <li class="your-order-shipping" style="color:#254470;">Sub Total </li>
														
														<li style="font-weight: 700;">&#8377;<span><?php echo $toatl_price?></span></li>
													
													</ul>
										</div>
										
										    <div class="your-order-total">
                                            <ul>
													<?php  $qe="select * from gst order by id desc limit 1";
												$gst_per=0;
												  $qus=mysqli_query($conn,$qe);
												  if(mysqli_num_rows($qus)>0){
                                                     while($rroww=mysqli_fetch_array($qus)){
													   $gst_per=$rroww['gst_percentage'];
													 }
												  }
													  ?>
														<li class="order-total" style="font-size: 16px;">GST  (<?php echo $gst_per.'%';?> of Total price)</li>
														
														<li style="font-size: 14px;color: #666;">&#8377;<span><?php echo $gst=($toatl_price*($gst_per/100)) ;
														 // $toatl_price=$toatl_price+($toatl_price*($gst_per/100));
														 
														?></span></li>
													 </ul>
													 <p style="color:black;">Note:GST is already included in sub total price.</p>
                                        </div>
										
										
                                        <div class="your-order-bottom">
                                            <ul>
											   <li class="your-order-shipping">Shipping</li>
												<?php  $qery="select * from delivery_charge_tbl order by id desc limit 1";
												$del_charg=0;
												  $quess=mysqli_query($conn,$qery);
												  if(mysqli_num_rows($quess)>0){
                                                     while($rrow=mysqli_fetch_array($quess)){
													   $del_charg=$rrow['delivery_charges'];
													 }
												  }
													  ?>
                                                <li><?php if($toatl_price>=500){ $del_charg=0; ?>Free shipping <?php }else{
													echo "Rs. ".$del_charg;
												}?>
												<input id='delchg' type='hidden' value='<?php echo $del_charg;?>'>
												</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-total">
                                            <ul>
                                                <li class="order-total">Total</li>
												<input id='totl_org_charge' type='hidden' value='<?php echo $toatl_price;?>'>
                                                <?php $a=$toatl_price+$del_charg;?>
                                                <input id='chn_tot1' type='hidden' value='<?php echo $a;?>'>
                                                <li style="color:#254470!important;">&#8377;<span id='chn_tot' style="color:#254470;"><?php echo $toatl_price+$del_charg;?></span></li>
                                            </ul>
                                        </div>
										<?php if(isset($_SESSION['uemail'])){?>
											<?php if(mysqli_num_rows($query21)>0){ ?>
										 <div class="your-order-bottom">
                                             <div class="billing-info mb-20px kit">
                                                 <span id="cupan_id" style="color:green"></span>
                                            <h4 style="color:#254470;">Apply coupon code if you have</h4>
                                            <input type="text" class='form-control' id='coupon_code_id' onmouseout="cupan(this.value)" placeholder="Enter coupon code" name='' /><br>
											<!--<foote_link.php  check_coupon() -->
											<button type='button'  class='btn btn-danger' onclick='check_coupon()' style="background-color:#254470;border-color:#254470;border-radius:2px;">Apply</button>
                                        </div>
                                        </div>
										<?php }}?>
										<h4 style="color:#254470;">Select Your Payment Method</h4>
										<div class="">
											<input type="radio" onclick="cod()" name="peyment" value="Case on Delivery" checked>
											<img src="assets/cash.webp" alt="" height="30px" width="30px"/>
											<label>Cash On Delivery</label>
                                             
                                        </div>
										<br/>
										<div class="">
											<input type="radio" onclick="pay()" name="peyment"  value="Pay" >
											<img src="assets/online.png" alt="" height="30px" width="30px"/>
                                            <label>Pay Online</label>
											(Debit Card & Credit Card, UPI and Net Banking)
                                           
                                        </div>
										 <!---<div class="">
											<input type="radio" onclick="Wallet()" name="peyment"  value="Wallet" >
                                            <label>Pay Wallet</label>
                                           
                                        </div>
                                        &nbsp;&nbsp;<span id="wallet" style="color: red;"></span>
                                        <span id="to" style="color: red;"></span>-->



                                    </div>
                                   
                                </div>
								<?php if(isset($_SESSION['uemail'])){?>
								<?php if(mysqli_num_rows($query21)>0){ ?>
                                <div class="Place-order mt-25"  >
                                    <input type="button"  value="Place Order" class="pull-right"  id="place" onclick="place_order()" style="background-color:#254470;color:white;border-radius:5px;padding:5px;border-color:#254470;"/>
                                </div>
								<?php }}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php if(isset($_SESSION['uemail'])){
				    $email=$_SESSION['uemail'];
					$sqll="select * from register where email='$email' && address!=' '";
				    $res22=mysqli_query($conn,$sqll);
			  ?> 
			   <?php 
								 
								   if(mysqli_num_rows($res22)>0){
									   while($row=mysqli_fetch_array($res22)){
										   ?>
										  <input type='hidden' id='address' value="<?php echo $row['address']; ?>"> 
										  <input type='hidden' id='landmark' value="<?php echo $row['landmark']; ?>"> 
										  <input type='hidden' id='city' value="<?php echo $row['city']; ?>"> 
										  <input type='hidden' id='state' value="<?php echo $row['state']; ?>"> 
										  <input type='hidden' id='zip' value="<?php echo $row['zip']; ?>"> 
										  <input type='hidden' id='mobile' value="<?php echo $row['mobile']; ?>"> 
										  <input type='hidden' id='name' value="<?php echo $row['name']; ?>"> 
										  <input type='hidden' id='emails' value="<?php echo $row['email']; ?>"> 
								 <?php 	   }
								   }
								   
								}
							   ?>
			                  <form action="order_code.php" id='odrfrm' method="post">
							     <input type='hidden' id='hname' name="name" > 
								  <input type='hidden' id='hmobile' name='mobile' > 
								  <input type='hidden' id='haddress' name="address" > 
								  <input type='hidden' id='hpay' name="peyment" > 
								  <input type='hidden' id='delivery_chg' name="delivery_chg" value='1'> 
							  </form>
			
			
            <!-- checkout area end -->
            <!-- Footer Area start -->
             <?php include("footer.php");?>
			 <div id="loader"></div>
            <!--  Footer Area End -->
        </div>
 <?php include("footer_link.php");?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <script>
  function get_address(){
	if($('input[type="checkbox"]'). prop("checked") == true){ 
	   var address=$('#address').val();
	   var landmark=$('#landmark').val();
	   var city=$('#city').val();
	   var state=$('#state').val();
	   var zip=$('#zip').val();
	   var name=$('#name').val();
	   var mobile=$('#mobile').val();
	   var emails=$('#emails').val();
	
	//var address_usr=address+',landmark - '+landmark+',City - '+city+',State - '+state+',Pincode - '+zip;
	

		$('#billing_name').val(name);
		$('#billing_emailid').val(emails);
	
	   $('#billing_address1').val(address);
	   $('#bill_landmark').val(landmark);
	   $('#bill_city').val(city);
	   $('#bill_state').val(state);
	   $('#bill_pincode').val(zip);
	   
	   $('#billing_mobile').val(mobile);
	
	
	
	}
	else{
	
		$('#billing_name').val('');
		$('#billing_emailid').val('');
	
	   $('#billing_address1').val('');
	   $('#bill_landmark').val('');
	   $('#bill_city').val('');
	   $('#bill_state').val('');
	   $('#bill_pincode').val('');
	   
	   $('#billing_mobile').val('');
	}
	 
	 
	 
	 
 }
 
 
function shows(){
	 var a=$('.pass').attr('type');
	 if(a=='text'){
	   $('.pass').attr('type','password');
	 }else{
		 $('.pass').attr('type','text');
	 }
   }
  function cshows(){
	 var a=$('.cpass').attr('type');
	 if(a=='text'){
	   $('.cpass').attr('type','password');
	 }else{
		 $('.cpass').attr('type','text');
	 }
   }

function login_ajax(){
	
	var email=$('#email_login').val();
	var password=$('#password_login').val();
	$.ajax({
		url:"login_ajx_code.php",
		type:"POST",
		data:'email='+email+'&password='+password,
		
		success:function(d){
			var k=JSON.parse(d);
			if(k.result==1){
				location.reload();
			}else{
				swal(k.msg,''); 
			}
		}
	});
	
	//	swal("ok",'OTP Not Matched,Please Enter Correct OTP'); 
	
}


function place_order(){
	   var name = $('#billing_name').val();
	   var mobile = $('#billing_mobile').val();
	  
	   var cities=$('#bill_city').val();
	   var states=$('#bill_state').val();
	  var pincodes= $('#bill_pincode').val();
	   var address1=$('#billing_address1').val();
	   var address2=$('#billing_address2').val();
	   
	   var address = $('#billing_address1').val() +" "+ $('#billing_address2').val() +' Landmark-'+ $('#bill_landmark').val()+" * "+ $('#bill_city').val()+" * "+$('#bill_state').val()+" * "+$('#bill_pincode').val();
	  var pay= $("input[name='peyment']:checked").val();
	   
	   if(name!=''&&mobile!=''&&address1!=''&&pay!=''&&cities!=''&&states!=''&&pincodes!=''){
	   
	$('#hname').val(name);
	$('#hmobile').val(mobile);
	$('#haddress').val(address);
	$('#hpay').val(pay);
	 $('#loader').show();
	$('#odrfrm').submit();
	   }
	   else{
		 swal('Please Fill All Mandatory Fields','');
	   }
	
}

function register_ajax(){ 

      var name = $('#billing_name').val();
	   var mobiles = $('#billing_mobile').val();
	  
	   var cities=$('#bill_city').val();
	   var states=$('#bill_state').val();
	  var pincodes= $('#bill_pincode').val();
	   var address1=$('#billing_address1').val();
	   var pass=$('#bill_password').val();
	   var cpass=$('#bill_confirm_password').val();
	  var pay= $("input[name='peyment']:checked").val();
	  
	   
	   if(name!=''&&mobiles!=''&&address1!=''&&pay!=''&&cities!=''&&states!=''&&pincodes!=''&&cpass!=''&&pass!=''){
           if(pass==cpass){

     var email = $('#billing_emailid').val();
	  var mobile = $('#billing_mobile').val();
    $.ajax({
		url:'otp_sms_generate.php',
		type:'POST',
		data:'email='+email+'&mobile='+mobile,
		success:function(d){
			//alert(d);
			 swal('OTP Sent Successfully To Your Mobile And Email','');
		}
		
	});

    $('.otp_ver').css('display','block');
	$('.reg_btn_shw').css('display','none');  
		   }else{
			    swal('Password And Confirm Password Not Matched','');
		   }	
  }else{
	    swal('Please Fill All Mandatory Fields','');
  }
	
}

function verify_ajax(){
	   
	   var otps=$('#reg_otp').val();
	   
	   if(otps!=''){
	   
	 $.ajax({
		url:'otp_verify.php',
		type:'Post',
		data:{'otp':otps},
		success:function(d){
			var res=JSON.parse(d);
			if(res.result==1){
				get_data();
			}
			if(res.result==0){
			//alert(d);
			 swal('OTP Does Not Matched','');
			}
		}
		
	});
	   }else{
		    swal('Please Enter OTP','');
	   }
}

function get_data(){
	 
		 var name = $('#billing_name').val();
		 var email = $('#billing_emailid').val();
		 var mobile = $('#billing_mobile').val();
		 var address = $('#billing_address1').val() + ' '+ $('#billing_address2').val();
	   //$('#billing_address2').val();
		 var landmark =  $('#bill_landmark').val();
		 var city =  $('#bill_city').val();
		 var state =  $('#bill_state').val();
		 var zip =  $('#bill_pincode').val();
		 var pass=$('#bill_password').val();
	     var cpass=$('#bill_confirm_password').val();
		 
	     $.ajax({
		url:'register_ajx_code.php',
		type:'Post',
		data:{'email':email,'phone':mobile,'name':name,'password':pass,'cpassword':cpass,'city':city,'address':address,'landmark':landmark,'state':state,'zip':zip},
		success:function(d){
			var res=JSON.parse(d);
			if(res.result==0){
				 swal(res.msg,'');
				 location.reload();
		    }
			if(res.result==1){
				 swal(res.msg,'');
		    }
			if(res.result==2){
				 swal(res.msg,'');
		    }
		}
		
	});


	 

}

function Wallet(id)
{
    
     var t=$('#chn_tot1').val();
      var a=parseInt(t);
    //         alert(a);
    
           
            
            //alert(total);
            $.ajax({
                        url:'wallet.php',
                data:{data:id},
                type:'post',
                success:function(res)
                {
                    //alert(res);
                     $('#to').html("Wallet Ballance ₹"+res);
              //alert(da);
            if(res >= a)
            {
                //alert("a");false
                 $('#place').attr('disabled',false);
                //$('#btn').hide();
           }
            if(res < a)
            {
                //alert("b");
                 $('#place').attr('disabled',true);
                 $('#to').html("Unsaficiant ablebale balance ₹"+res);
            }
             
            if(res==2)
            {
                //alert("b");
                 
                 $('#to').html("Your Wallet is Not Activeted");

            }
           
            }
          }); 
}
function cod()
{
     $('#place').attr('disabled',false);
    $('#to').html(' ');

}
function pay()
{
     $('#place').attr('disabled',false);
    $('#to').html(' ');

}
function cupan(cupan_code)
{
    $.ajax({
        url:'cupancode_check.php',
        type:'post',
        data:{cupan:cupan_code},
        success:function(response){
            if(response=='2')
            {
                //alert("not");
                 $('#cupan_id').html('Coupon have not available.');
            }
            else
            {
                $('#cupan_id').html(response);
            }
            
        }
    });
}
	   
	   </script>
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:31:46 GMT -->
</html>
