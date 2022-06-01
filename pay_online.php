<?php include("session_random.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:32:50 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com!</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
    </head>

    <body class="home-3">
       

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Area Start  -->
            <?php include("header.php");?>
<?php //Session_start();
  
  $id_for_p=$_SESSION['id'];
  $name=$_SESSION['name'];
  $email=$_SESSION['uemail'];
  $mobile=$_SESSION['mobile'];
  $amountpay=$_SESSION['amount']*100;


?>

<form action="req_data.php" method="POST">
				<!-- 
					 
				 rzp_live_bTB20wj7oFw3n2	 4111 1111 1111 1111  rzp_test_DyWruErT6xXMHP
				-->
				<script 
					src="https://checkout.razorpay.com/v1/checkout.js"
					data-key="rzp_live_qF9ReLEQJEJCtE" 
					data-amount="<?php echo $amountpay; ?>"
					data-currency="INR"

					data-buttontext="Verify1"
					data-name="The Chairwala.com"
					data-description=""
					data-image="admin/images/chairwala1.jpg"
					data-prefill.name="<?php echo $name; ?>"
					data-prefill.email="<?php echo $email; ?>"
					data-prefill.contact="<?php echo $mobile; ?>" 
					data-theme.color="#254470"
					
				></script>
				<input type="hidden" custom="Hidden Element" name="hidden">
				<input type="hidden" custom="Hidden Element" name="pay_id" value="<?php echo $id_for_p?>" id='pay_ids'>
         </form>
		
		
		<!--/ End Breadcrumbs -->
		
		<!-- Contact Us -->
		
		<!--/ End Contact Us -->
		
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
		<script>
		 $(document).ready(function(){
	    	 $( ".razorpay-payment-button" ).hide(); 
		 });
		 </script>
		<script>
		  $(document).ready(function(){
			  $(".razorpay-payment-button").trigger("click");
		  });
		
		</script>
		
		
    </body>


</html>