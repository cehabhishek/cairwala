<?php
session_start();
include("db.php");
 $id=$_REQUEST['id'];
 $qt=$_REQUEST['qt'];
 $pc=$_REQUEST['pr']; 

 $cur=$_SESSION["SystemID"];
 $chk="select * from cart where ProductID=$id and SystemID='$cur'";
$res=mysqli_query($conn,$chk);
if(mysqli_num_rows($res)>0){
	 $sql="update cart set Quantity=Quantity+$qt,Price=Price+$pc  where ProductID=$id and SystemID='$cur'";
	mysqli_query($conn,$sql);
}
else{

 $query=mysqli_query($conn,"insert into cart(ProductID,Quantity,base_price,Price,BuyStatus,Date,SystemID) values('$id',$qt,$pc,$pc,'false',now(),'$cur')");

}

	$query1=mysqli_query($conn,"select count(CartID) as abc from cart where SystemID='$cur'");
										
			if($row1=mysqli_fetch_array($query1))
			{
			 $p=$row1['abc'];
			}



// cart
   $qe="select * from cart where SystemID='$cur'";
  $query2=mysqli_query($conn,$qe);
    $html="";
	$html="<ul>";
   while($row2=mysqli_fetch_array($query2)) {
	 $pid=$row2['ProductID'];
	 $sqla="select p.Image1,p.ProductID,p.Name,c.CartID,c.Price,c.Quantity from  cart c join products p on c.ProductID=p.ProductID where p.ProductID='$pid' and c.SystemID='$cur'";
	 $query3=mysqli_query($conn,$sqla);
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