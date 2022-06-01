<?php
$cupan=$_POST['cupan'];
include('db.php');
//echo $res="select * from coupon_code_tb where coupon_code='$cupan'";die();
$query=mysqli_query($conn,"select * from coupon_code_tb where coupon_code='$cupan'");
if($row=mysqli_fetch_array($query))
{
    echo $row['coupon_name'];
    
}
else
{
    echo "2";
}

?>