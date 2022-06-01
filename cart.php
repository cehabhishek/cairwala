<?php include("session_random.php");?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>The Chaiwala.com!  - Cart</title>
        <!-- Favicon -->
        <?php include("header_link.php");?>
		
		<style>
		@media only screen and (max-width: 600px) {
  #cart2{
    display:block!important;
  }
  #about{
	  display:none;
  }
  #cs{
	  margin-left:4px!important;
  }
}
		</style>
    </head>
    <body>
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->

        <!-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> -->

        <!--====== PRELOADER PART ENDS ======-->
        <body class="home-3">
       

        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">
            <!-- Header Area Start  -->
            <?php include("header.php");?>
			
                <!-- Header Top End -->
                <!-- Header Buttom Start -->
                
         
            <!-- Header End -->
            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style>
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Product Cart </h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index">Home</a></li>
                                    <li>Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- cart area start -->
            <div class="cart-main-area mtb-60px"  id="about">
                <div class="container">
                    <h3 class="cart-page-title">Your cart items</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <form action="#">
                                <div class="table-content table-responsive cart-table-content">
                                    <table>
                                        <thead>
                                            <tr >
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Until Price</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
								<?php  $cur=$_SESSION["SystemID"];
									   $query=mysqli_query($conn,"select * from cart where SystemID='$cur'");
									   $total=0;
									   $a=1;$s=0;
										while($row=mysqli_fetch_array($query))
										{
									   $pid=$row['ProductID'];
									   $sql="select p.Image1,p.ProductID,p.Description,p.Name,c.CartID,c.base_price,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
														 $query3=mysqli_query($conn,$sql);
															while($row3=mysqli_fetch_array($query3)) {
																	  $row3['ProductID'];
																	$total+=floatval($row3['Price']);
																	$_SESSION['pname']=$row3['Name'];
										?>
											<tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img height="100px" src="admin/product_image/<?php echo $row3['Image1'];?>" alt="" /></a>
                                                </td>
                                                <td class="product-name">
												<a href="single_product?product=<?php echo base64_encode($row3['ProductID']);?>"><?php echo $row3['Name'];?></a>
												<input type='hidden'  id="<?php echo $a; ?>pid" name='pid' value="<?php echo $row3['ProductID'];?>">
												</td>
                                                <td class="product-price-cart">
												<span class="amount">&#8377;<?php echo $row3['base_price'];?></span>
												<input type='hidden'  id="<?php echo $a; ?>abc" value="<?php echo $row3['Price'];?>">
												<input type='hidden'  id="<?php echo $a; ?>basePrice" value="<?php echo $row3['base_price'];?>">
												</td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?php echo $row3['Quantity'] ?>" id="<?php echo $a; ?>" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal ">&#8377;<span class="<?php echo $a; ?>"><?php echo $row3['Price'];?></span></td>
                                                <td class="product-remove">
                                                    <a href="single_product?product=<?php echo base64_encode($row3['ProductID']);?>"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="#" onclick='del_from_cart(<?php echo $row3['ProductID']?>)'><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
											
											<?php }
											  $a++;
											}?>

                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart-shiping-update-wrapper">
                                           
											
                                            <div class="cart-clear">
                                                <a href="#" onclick="del_all()">Clear Shopping Cart</a>
                                            </div>
											 <div class="cart-shiping-update">
                                                <a id="cs" href="index">Continue Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                
                                <div class="col-lg-4 col-md-6">
                                   <!-- <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                        </div>
                                        <div class="discount-code">
                                            <p>Enter your coupon code if you have one.</p>
                                            <form>
                                                <input type="text" required="" name="name" />
                                                <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>-->
                                </div>
								  <div class="col-lg-4 col-md-12"></div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                        <h5>Total product Price  <span id='s_totls'><?php echo $total ;?></span><span>&#8377;</span></h5>
                                        <!--<div class="total-shipping">
                                            <h5>Total shipping</h5>
                                            <ul>
                                                <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                                <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                            </ul>
                                        </div>-->
                                        <h4 class="grand-totall-title">Grand Total <span id='totls'><?php echo $total ;?></span><span>&#8377;</span></h4>
                                        <?php // if(!isset($_SESSION['uemail'])){ ?>
										<!--<a href="authentication.php">Proceed to Checkout</a> -->
										<?php // }else{?>
										<!--<a href="order.php">Proceed to Checkout</a> -->
										<?php// }?>
										<a href="checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart area end -->
			<div class="container">
			<div class="row mt-4" id="cart2" style="display:none;">
					<?php  $cur=$_SESSION["SystemID"];
									   $query11=mysqli_query($conn,"select * from cart where SystemID='$cur'");
									   $total=0;
									   $a=1;$s=0;
										while($row11=mysqli_fetch_array($query11))
										{
									   $pid=$row11['ProductID'];
									   $sql11="select p.Image1,p.ProductID,p.Description,p.Name,c.CartID,c.base_price,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
														 $query3=mysqli_query($conn,$sql11);
															while($row33=mysqli_fetch_array($query3)) {
																	  $row33['ProductID'];
																	$total+=floatval($row33['Price']);
																	$_SESSION['pname']=$row33['Name'];
						?>
			<div class="col-sm-4">
			<div class="card">
			<center>
  <img class="card-img-top" src="admin/product_image/<?php echo $row33['Image1'];?>" alt="Card image cap" height="200px" width="310px"></center>
  <div class="card-body">
  <table class="table">
  <thead class="thead-primary">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col"><a class="ml-5" href="single_product?product=<?php echo base64_encode($row33['ProductID']);?>"><?php echo $row33['Name'];?></a></th>
    </tr>
	<tr>
      <th scope="col">Until Price</th>
      <th scope="col"><span class="amount ml-5">&#8377;<?php echo $row33['base_price'];?></span></th>
    </tr>
	<tr>
      <th scope="col">Quantity</th>
      <th scope="col">
	  <div class="cart-plus-minus">
          <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?php echo $row33['Quantity'] ?>" id="<?php echo $a; ?>" />
           </div>
		</th>
    </tr>
	<tr>
      <th scope="col">Sub Total</th>
      <th scope="col"><span class="<?php echo $a; ?> ml-5">&#8377;<?php echo $row33['Price'];?></span></th>
    </tr>
	<tr>
	<th>
      Action
	  </th>
	  <th>
	  <a href="single_product?product=<?php echo base64_encode($row33['ProductID']);?>"><i class="fa fa-pencil-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#" onclick='del_from_cart(<?php echo $row33['ProductID']?>)'><i class="fa fa-times"></i></a>
	</th>
	</tr>
  </thead>
   </table>

    <a href="#"  onclick="del_all()" class="btn btn-primary" style="background-color:#254470;">Clear Shopping Cart</a><br/><br/>
    <a  id="cs" href="index" class="btn btn-primary" style="margin-left:50px;background-color:#254470;">Continue Shopping</a>
  </div>
</div>
</div>
	<?php }						
	$a++;
		}?>
</div>
</div>
</br>
            <!-- cart2 area start -->
			<div class="row"  id="cart2" style="display:none;">
                                
                                <div class="col-lg-4 col-md-6">
                                   <!-- <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                        </div>
                                        <div class="discount-code">
                                            <p>Enter your coupon code if you have one.</p>
                                            <form>
                                                <input type="text" required="" name="name" />
                                                <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>-->
                                </div>
								  <div class="col-lg-4 col-md-12"></div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                        <h5>Total product Price  <span id='s_totls'><?php echo $total ;?></span><span>&#8377;</span></h5>
                                        <!--<div class="total-shipping">
                                            <h5>Total shipping</h5>
                                            <ul>
                                                <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                                <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                            </ul>
                                        </div>-->
                                        <h4 class="grand-totall-title">Grand Total <span id='totls'><?php echo $total ;?></span><span>&#8377;</span></h4>
                                        <?php // if(!isset($_SESSION['uemail'])){ ?>
										<!--<a href="authentication.php">Proceed to Checkout</a> -->
										<?php // }else{?>
										<!--<a href="order.php">Proceed to Checkout</a> -->
										<?php// }?>
										<a href="checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
			
			
            <!-- cart2 area end -->
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
<script>
function del_from_cart(id){
	var prop ='del';
	$.ajax({
		url:'update_cart.php',
		type:'post',
		data:'id='+id+'&prop='+prop,
		success:function(data){
			location.reload();
		}
		
	});
}

function del_all(){
	var prop ='all';
	$.ajax({
		url:'update_cart.php',
		type:'post',
		data:'prop='+prop,
		success:function(data){
			location.reload();
			//window.location.href="index.php";
		}
		
	});
}



 $(".cart-plus-minus").click(function() { 
  var $button = $(this);
  var qty = $button.parent().find("input").val();
  var cls = $button.parent().find("input").attr('id');
	var prev=$('#s_totls').html();
			//alert(qty);
			
		 
			// var cls=$('#'+a).attr('id');
		
			var item_prc=$('.'+cls).html();
		
			var net_p=prev-item_prc;
			
			 var price=$('#'+cls+'basePrice').val();
			// alert(price);
			 var total_price=qty*price;
			
			$('.'+cls).html(total_price);
			
			 var new_price=net_p+total_price
			
			 $('#s_totls').html(new_price);
			
			 $('#totls').html(new_price);
			 
			var net_qty=$('#'+cls+'kbc').val(qty);
			
			var idss=$('#'+cls+'pid').val();
			
			
			update_cart(idss,qty,total_price);
});

  

function update_cart(idss,qty,total_price){
	var prop ='update';
	$.ajax({
		url:'update_cart.php',
		type:'post',
		data:'id='+idss+'&qt='+qty+'&pr='+total_price+'&prop='+prop,
		success:function(data){
			location.reload();
		}
		
	});
	
	
}
	
/*
   function changes_a(a)
		{    
			var prev=$('#s_totls').html();
			//alert(prev);
			var qty=parseInt($('#'+a).val())+1;
		 
			 var cls=$('#'+a).attr('id');
		
			var item_prc=$('.'+cls).html();
		
			var net_p=prev-item_prc;
			
			 var price=$('#'+cls+'basePrice').val();
			 //alert(price);
			 var total_price=qty*price;
			
			$('.'+cls).html(total_price);
			
			 var new_price=net_p+total_price
			
			 $('#s_totls').html(new_price);
			
			 $('#totls').html(new_price);
			 
			var net_qty=$('#'+cls+'kbc').val(qty);
			
			var idss=$('#'+cls+'pid').val();
			update_cart(idss,qty,total_price);
				
		}
		
		 function changes_m(a)
		{   
			if(parseInt($('#'+a).val())!=0){
			var prev=$('#totls').html();
			//alert(prev);
			var qty=parseInt($('#'+a).val())-1;
		
			 var cls=$('#'+a).attr('id');
		
			var item_prc=$('.'+cls).html();
		
			var net_p=prev-item_prc;
			
			 var price=$('#'+cls+'basePrice').val();
			 var total_price=qty*price;
			
			$('.'+cls).html(total_price);
			
			 var new_price=net_p+total_price
			
			 $('#s_totls').html(new_price);
			
			 $('#totls').html(new_price);
			 
			var net_qty=$('#'+cls+'kbc').val(qty);
			idss=$('#'+cls+'pid').val();
			update_cart(idss,qty,total_price);
			}
				
		}
		
		function update_cart(id,qt,pc){  
			$.ajax({
				 url:'update_cart.php',
				 data:"id="+id+"&qt="+qt+"&pc="+pc,
				 type:'POST',
				 success:function(){
					 location.reload();
				 },
				 error:function(){
					 
				 }
			 
			});
		}
		*/
	
</script>
	  
	  
	  
    </body>

<!-- Mirrored from live.hasthemes.com/html/5/ecolife-preview/ecolife/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 07:35:37 GMT -->
</html>
