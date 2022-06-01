<?php
ob_start();
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);
$file=date("d/m/yy");
 $id=base64_decode($_REQUEST['id']); 
  $ord_id=$id;
include("db.php");

$c_name = '';
$p_name = '';
$mobile = '';
$p_id ='';
$qty ='';
$tot_price = '';
$address='';
$order_date = '';
$delivery_date = '';
$email='';
$pay_type='';
$pay_id='';
$query="select * from orders where OrderID='$id'"; 
$res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res))
{
 $c_name = $row['Name'];
 $address = $row['Address'];
 $mobile = $row['Mobile'];
 $qty = $row['Quantity'];
 $tot_price = $row['TotalCharge'];
 $p_id=$row['ProductID'];
 $order_date= $row['Date'];
 $email=$row['Email'];
 $delivery_date=date('d-m-Y',strtotime($row['delivery_date']));
 $pay_type=$row['onlinePayment'];
 $pay_id=$row['onlinePaymentId'];
}
$paymentId='';
if($pay_type=='not paid'){
	$pay_type='COD';
}
if($pay_type=='Paid Online'){
	$pay_type='Prepaid';
}
if($pay_id!=''){
	$paymentId="<p><b>Payment Id :</b> .$pay_id</p></div>";
}
$query1="select * from products where ProductID='$p_id'"; 
$res1=mysqli_query($conn,$query1);
while($row=mysqli_fetch_assoc($res1))
{
 $p_name = $row['Name'];
}
 $html=
"<div style='font-family:Arial;width:100%;'>
<div style='height:150px;width:100%;'>
<div style='width:300px; height:150px;float:right;margin-right:50px;margin-top:30px;'><img src='admin/images/THE CHAIR WALA LOGO.png' style='height:110px;width:200px;'/>
<p style='width:250%;'><b>PAYMENT INVOICE NO</b> - CHIWLA00$ord_id</p>
<p><b>INVOICE DATE:</b>$delivery_date</p></div>
<div><p><b>From</b></p><p><b>The Sarthak Enterprises</b></p>

<P>S-14/84-G-I-M. .NEAR PATEL ,</p>
<p>DHARSALA TELIABAGH ,</p>
<p>Varanasi Uttar Pradesh,India 221002</p>
</div>

</div>

<p><b>To,</b></p><p><b>$c_name</b></p>
<p>$mobile</p>
<p>$address</p>
<div>

<table   width='100%' cellpadding='0'cellspacing='0' border='1' style='border-collapse: collapse;' > 

 
    <tr>
      <th height='2'>SR.NO</th>
      <th height='20'>Product Name</th>
      <th height='20'>Product Quantity</th>
      <th height='20'>Billed Amount</th>
    </tr>

  
    <tr>
      <td height='50'>1</td>
      <td height='50'> &nbsp; $p_name</td>
      <td height='50'> &nbsp; $qty /- </td>
      <td height='50'> &nbsp; $tot_price /- </td>
    </tr>
  
    <tr>
      <td height='50'></td>
      <td height='50' align='right'><b>Total Amount</b> &nbsp;</td>
      <td height='50'>&nbsp; $tot_price /- </td>
      <td height='50'></b>  $pay_type</p></td>
    </tr>

</table> 
 </div>
$paymentId

<div style='width:300px; height:60px;float:right;margin-right:-80px;'>
 
 
 
</div>
<div style='width:200px; height:110px;'>
</div>
<div style='margin-left:40px;'>
<h4><a style='color:black' href='mailto:Info@chairwala.com'>0522-4026921 | Info@chairwala.com |www.chairwala.com</a></h4>
</div>
 </div>"
; 




$op='Invoice Of '.$c_name; 


include("vendor/autoload.php");
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("$op.pdf",'D');


?>