<?php
include('connection.php');

    $subcategory=$_POST['subcategory'];
    $cid=$_POST['cid'];
    if($_FILES["subphoto"]["name"]==""){
        $sql="update vendor_sub_category set subcategory_name='$subcategory' where subcategory_id='$cid'";
    }else{
         $image=time().$_FILES["subphoto"]["name"];
		 $tmp_name=$_FILES["subphoto"]["tmp_name"];
		 $photo_type=$_FILES["subphoto"]["type"];
		 $location="subcategory_image/";
        $sql="update vendor_sub_category set subcategory_name='$subcategory',subcategory_image='$image' where subcategory_id='$cid'";
        move_uploaded_file($tmp_name,$location.$image);
    }
    mysqli_query($conn,$sql);
    header('location:showCategory.php');

?>