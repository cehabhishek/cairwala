<?php
require('connection.php');
$cid=$_POST['datapost'];
$q=mysqli_query($conn,"select * from sub_category where category_id=$cid");
while($row=mysqli_fetch_array($q))
{
    ?>
    <option value="<?php echo $row['subcategory_name'];?>"><?php echo $row['subcategory_name'];?></option>
    <?php
}
?>