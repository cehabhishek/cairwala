<?php
session_start();
include("db.php");

 $cur=$_SESSION["SystemID"];
 $id=$_REQUEST['id'];

$p=0;

$query=mysqli_query($conn,"delete from cart where CartID='$id'");


$query1=mysqli_query($conn,"select count(CartID) as abc from cart where SystemID='$cur'");
  if($row1=mysqli_fetch_array($query1))
		{
		 $p=$row1['abc'];
		}


 $qe="select * from cart where SystemID='$cur'";
  $query2=mysqli_query($conn,$qe);
    $html="";
	$html="<ul>";
   while($row2=mysqli_fetch_array($query2)) {
	 $pid=$row2['ProductID'];
	 $sql="select p.Image1,p.ProductID,p.Name,c.CartID,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
	 $query3=mysqli_query($conn,$sql);
	 while($row3=mysqli_fetch_array($query3)) {
		 $url=base64_encode($row3['ProductID']);
		 $img="admin/product_image/".$row3['Image1'];
		$html.=" <li class='single-shopping-cart'>
			<div class='shopping-cart-img'>
				<a href='#'><img alt='' src='$img' /></a>
				<span class='product-quantity'>$row3[Quantity]</span>
			</div>
			<div class='shopping-cart-title'>
				<h4><a href='single_product.php?product=$url'> $row3[Name]</a></h4>
				<span>&#8377; $row3[Price]</span>
				<div class='shopping-cart-delete'>
					<a href='#'onclick='del_cart($row3[CartID])'><i class='ion-android-cancel'></i></a>
				</div>
			</div>
		</li>";
		 
		  
      }
   }
	 $html.="</ul>";
	 if($p!=0){
	 $html.="<div class='shopping-cart-btn text-center'>
                       <a class='default-btn' href='cart.php'>View Cart</a>
                     </div>";	
			}else{$html.= "<p><center><h5>Empty Cart</h5></center></p>";}
 echo $html;			
 
 
 ?>