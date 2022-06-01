
<?php include("session_random.php");?>
	<?php
		error_reporting(0);
		include('db.php');
		$email='';
		$name='';

		$ids=$_SESSION['id'];
        
		$id =explode(',',$ids);
		//print_r($id);
		   $n=count($id);
		   $html='';
		   $mob="";
		   $msg_mob='';
		   $delivery_chr_remark='';
		   $ck_payment_type='';
		   $online_pay_id='';
		   $pay_status='';
		   $pay_online_already='';
		   $c_num=9958457125;
		for($i=0;$i<$n;$i++){
		  $query="select o.*,p.Name as p_name from orders o join products p on o.ProductID=p.ProductID where OrderID='$id[$i]'";
		$res=mysqli_query($conn,$query);

		 if(mysqli_num_rows($res)>0){
			 while($row=mysqli_fetch_array($res)){
				$email=$row['Email']; 
				$name=$row['Name'];
				$mob=$row['Mobile'];
			 $html.="<tr><td>CHIWLA00$row[OrderID]</td><td>$row[p_name]</td><td>$row[Quantity]</td><td>$row[TotalCharge]</td></tr>";
             $msg_mob.="CHIWLA$row[p_name] of Rs. $row[TotalCharge]/-,";		
              $delivery_chr_remark=	$row['delivery_charges'];	
			   $ck_payment_type=$row['onlinePayment'];
			   $online_pay_id=$row['onlinePaymentId'];
			}
		 }
		}
         if($ck_payment_type=='Paid Online'){
			 $pay_status="Payment Mode: Online & Payment Id: ".$online_pay_id;
			 $pay_online_already="(paid already online)";
		 }else{
			  $pay_status="Payment Mode: Cash On Delivery";
		 }
			//mail  
		$subject = 'Thank You For Buying Product With Us!';
		$to=$email;
		
		$from='Info@chairwala.co.in';  //from
		// message
		 $message ='
		<html>
		<head>
		  <title>Thank You For Buying Product With Us!</title>
		</head>
		<body>
			<p>Dear ,'.$name.'&nbsp;thank you for buying product with us. We are happy to serve you.Your shopping details are given below: </p>
			<p>'.$pay_status.'</p>
			 <table border="1">
			   <thead><tr><th>Order Id</th><th>Product Name</th><th>Quantity</th><th>Price</th><tr></thead>'.$html.'
			   
			 </table>
			  *Remark:You have to pay '.$gst_percentage.'% GST on every unit of product purchased. 
			 *Remark:You have to pay delivery charge of Rs '.$delivery_chr_remark.' '. $pay_online_already.'
			 <br>
			<p style="color:Green"><u><b>Warm Regards</b></u></p>
			<p style="color:Green">www.chairwala.co.in</p>
			<p style="color:Green">Mobile:9958457125  </p>
			<p style="color:Green">Email:Info@chairwala.com </p>
			

		</body>
		</html>
		';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From:The Chairwala.com! <'.$from.'>' . "\r\n";

		//Mail it
		mail($to, $subject, $message, $headers);


		$m_num=$mob;
		
		 $sm="Hi {$name} we received your order ID{$msg_mob}. We inform once your order is accepted or call us at {$c_num} for more information- Team www.thechairwala.com";
		    
		     $sms=urlencode($sm);
		     $url="http://45.249.108.134/api.php?username=webazutechnology&password=517984&sender=CHIWLA&sendto=".$mob."&message=".$sms."&PEID=1501604760000039060&templateid=1507165226448203790";   
		    file_get_contents($url); 
		
	



?> 
<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chairwala.com- Thank You</title>
        <!-- Favicon -->
       <?php include("header_link.php");?>
		<style>
			table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
@media all and (max-width:480px) {

    #col3{
		display:none!important;
	}
}
		</style>
    </head>
    <body class="home-3">
    

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
                                <h1 class="breadcrumb-hrading">Thank You For Buying With Us.</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Thank You</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
	 



            <!-- About Area Start -->
               <section class="">
                <div class="container">
					<div class="row">
						<div class="col-4"  id="col3"></div>
						<div class=" border border-primary mt-4" style="overflow-x:auto;">
							<center><img src="assets/giphy.gif" alt="" height="200px" id="image">
								<h3 style="color:#254470;"  id="image">Your Order Completed</h3>
							</center>
							<table class="table mt-2">
								
									<h5 style="color:#254470;text-align:center;border-top:1px solid #dee2e6;padding-top:20px;">Your Order Details</h5>
								
								  <tbody class="border">
									<?php
									
										//include('connection.php');
										$em=$_SESSION['uemail'];
										 
										//$_SESSION['id']
										$query="select * from orders where Email='$em' ORDER BY OrderID DESC LIMIT 1";
										$res=mysqli_query($conn,$query);
										while($row=mysqli_fetch_array($res))
										{
												$am=$row['TotalCharge'];
												
												$pid=$row['ProductID'];
												$query1="select * from products where ProductID='$pid'";
												$res1=mysqli_query($conn,$query1);
												if($rows=mysqli_fetch_array($res1))
												{
													?>
													<tr>
									  <th scope="row">Order Id</th>
										
									  <td><?php echo $row['OrderID']; ?></td>
									  <td></td>
									</tr>
									<tr>
									  <th scope="row">Products</th>
									  <td><?php echo $rows['Name'];?></td>
									  <td></td>
									</tr>
									<tr>
									  <th scope="row">Amount</th>
									  <td>₹<?php echo $am; ?></td>
									  <td></td>
									</tr>
									<tr>
									  <th scope="row">Payment Mode</th>
									  <td><?php echo $row['onlinePayment'];?></td>
									  <td></td>
									</tr>
									<tr>
									  <th scope="row">Order Date</th>
									  <td><?php echo date('d/m/Y' ,strtotime($row['Date']));?></td>
									  <td></td>
									</tr>
									<tr>
										
										<td><a href="user_profile" style="color:white;"  class="btn btn-info">Profile</a></td>
										<th><a href="invoice_generator.php?id=<?php echo base64_encode($row['OrderID']);  ?>" style="color:white;"  class="btn btn-info">Download Recipt</a></th>
										<td><a href="index"  style="color:white;"  class="btn btn-info float-right">Home</a></td>
									</tr>
													
													<?php
												}
										?>
									
									<?php } ?>
								  </tbody>
							</table>
						</div>
						<div class="col-3"  id="col3"></div>
					</div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-res-sm-50px">
                            <div class="about-left-image">
                                
                            </div>
							</br>

                        </div>
                        <!-- <div class="col-lg-6 col-sm-12">
                            <div class="about-content">
                                <div class="about-title">
                                    <h2>Thank You For Buying With Us</h2>
                                </div>
                              
                                 <p class="lead">
								    Please Check Your Email For More Details. 

								</p>
								<p>
								</p>
                            </div>
                        </div> -->
                    </div>
                    
                </div>
            </section>

            <!-- About Area End -->

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
      <?php include("footer_link.php");
	    unset($_SESSION['SystemID']);
	  ?>
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
</html>
