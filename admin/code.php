<?php
require ("connection.php");
ob_start();
 $val=$_REQUEST['val'];
 
  
 switch($val)
 {
	 case 1:
	 if(isset($_POST['add_category']))
	 {
		$category=$_POST['category'];
		 $image=time().$_FILES["banner"]["name"];
		 $tmp_name=$_FILES["banner"]["tmp_name"];
		 $photo_type=$_FILES["banner"]["type"];
		$location="subcategory_image/";
		move_uploaded_file($tmp_name,$location.$image);
    	$query="insert into category (category_name,banner) value('$category','$image')";
		$res=mysqli_query($conn,$query);
		if($res>0)
		{
			echo "<script>
			window.location='add_category.php?msg=1'</script>";
		}
		else
		{
			echo "<script>
			window.location='add_category.php?msg=2'</script>";
		}
	 }
	 break;
	  CASE 2:
	 if(isset($_POST['add_subcategory']))
	 {
		 $category_id=$_POST['category'];
		 $subcategory=$_POST['subcategory'];
		 $image=time().$_FILES["subphoto"]["name"];
		 $tmp_name=$_FILES["subphoto"]["tmp_name"];
		 $photo_type=$_FILES["subphoto"]["type"];
		$location="subcategory_image/";
		//move in file
		move_uploaded_file($tmp_name,$location.$image);
		$res1=mysqli_query($conn,"insert into sub_category (category_id,subcategory_name,subcategory_image) value($category_id,'$subcategory','$image')");
		if($res1>0)
		{
			echo "<script>
			window.location='add_subcategory.php?msg=1'</script>";
		}
		else
		{
			echo "<script>
			window.location='add_subcategory.php?msg=2'
			</script>";
		}
	 }
	 break;
		case 3:
	 $category_id=$_POST['category'];
	 $subcategory=$_POST['subCategory'];
	 $productname=$_POST['productname'];
	 $producttitle=$_POST['producttitle'];
	 $productprice=$_POST['productprice'];
	 $discount=$_POST['discount'];
	 $is_coupon=$_POST['is_coupon'];
	 $is_best_seller=$_POST['is_best_seller'];
	 $hot_deal=$_POST['hot_deal'];
	 $quntity=$_POST['quntity'];
	 $profit=$_POST['profit'];
	 $product_delivery=$_POST['product_delivery'];
	 $product_s_descri=$_POST['product_s_descri'];
	 $product_descri=$_POST['product_descri'];
	 $location="product_image/";
	 $image1=time().$_FILES['product_image1']['name'];
	 $tmp_name=$_FILES['product_image1']['tmp_name'];
     $productprice_strike=$_POST['productprice_strike'];         	
	// $image1;
	 
		//move in file
		move_uploaded_file($tmp_name,$location.$image1);
	 $image2=time().$_FILES['product_image2']['name'];
	 $tmp_name=$_FILES['product_image2']['tmp_name'];
	 
		//move in file
		move_uploaded_file($tmp_name,$location.$image2);
	 $image3=time().$_FILES['product_image3']['name'];
	 $tmp_name=$_FILES['product_image3']['tmp_name'];
	 
		//move in file
		move_uploaded_file($tmp_name,$location.$image3);
	
	 $image4=time().$_FILES['product_image4']['name'];
	 $tmp_name=$_FILES['product_image4']['tmp_name'];
	 //move in file
	 move_uploaded_file($tmp_name,$location.$image4);
	 
	 $image5=time().$_FILES['product_image5']['name'];
	 $tmp_name=$_FILES['product_image5']['tmp_name'];
	 //move in file
	 move_uploaded_file($tmp_name,$location.$image5);
	 
	 /*
	 $image6=time().$_FILES['product_image6']['name'];
	 $tmp_name=$_FILES['product_image6']['tmp_name'];
	 //move in file
	 move_uploaded_file($tmp_name,$location.$image6);
	 
	 $image7=time().$_FILES['product_image7']['name'];
	 $tmp_name=$_FILES['product_image7']['tmp_name'];
	 //move in file
	 move_uploaded_file($tmp_name,$location.$image7);
	 
	 $image8=time().$_FILES['product_image8']['name'];
	 $tmp_name=$_FILES['product_image8']['tmp_name'];
	 //move in file
	 move_uploaded_file($tmp_name,$location.$image8);
	 
	 $image9=time().$_FILES['product_image9']['name'];
	 $tmp_name=$_FILES['product_image9']['tmp_name'];
	*/ 
	 //move in file
	 //move_uploaded_file($tmp_name,$location.$image9);
	 
	
		$res2=mysqli_query($conn,"insert into products (Name,SubName,Category,Title,Price,profit,DeliveryTime,discount,is_coupon,is_best_seller,hot_deal,short_description,Description,Image1,Image2,Image3,Image4,Image5,quantitys,strike_price) values('$productname','$subcategory',$category_id,'$producttitle','$productprice','$profit','$product_delivery','$discount','$is_coupon','$is_best_seller','$hot_deal','$product_s_descri','$product_descri','$image1','$image2','$image3','$image4','$image5','$quntity','$productprice_strike')");
		$resi=mysqli_query($conn,"insert into offer (Name,offer_check) values('$productname','$discount')");
		if($res2>0)
		{
			echo "<script>
			window.location='add_product.php?msg=1';</script>";
		}
		else
		{
			echo "<script>
			window.location='add_product.php?msg=2';
			</script>";
		}
		break;
		case 4:
		$ename=$_POST['ename'];
		$egender=$_POST['egender'];
		$eemail=$_POST['eemail'];
		$emobile=$_POST['emobile'];
		$eaddress=$_POST['eaddress'];
		$ecity=$_POST['ecity'];
		$epassword=$_POST['epassword'];
		$management=$_POST['management'];
		$edoc=time().$_FILES['edoc']['name'];
		$tmp_name=$_FILES['edoc']['tmp_name'];
		$location="employee_image/";
		//move in file
		move_uploaded_file($tmp_name,$location.$edoc);
		$ephoto=time().$_FILES['ephoto']['name'];
		$tmp_name1=$_FILES['ephoto']['tmp_name'];
		$location="employee_image/";
		//move in file
	// $sqli="insert into employee (name,gender,email,mobile,address,city,document,photo,password) values('$ename','$egender','$eemail','$emobile','$eaddress','$ecity','$edoc','$ephoto','$epassword')";
		
		move_uploaded_file($tmp_name1,$location.$ephoto);
		 $res3=mysqli_query($conn,"insert into employee (name,gender,email,mobile,address,city,document,photo,password,management) value('$ename','$egender','$eemail','$emobile','$eaddress','$ecity','$edoc','$ephoto','$epassword','$management')");
		
		
		if($res3>0)
		{
			echo "<script>alert('Add Employee Successfully ');
			window.location='add_employee.php'
			</script>";
		}
		else
		{
			echo "<script>alert('Add Employee Faied ! ');
			window.location='add_employee.php'
			</script>";
		}
		break;
		case 5:
		    $id=$_REQUEST['id'];
		    $sql=mysqli_query($conn,"delete from category where category_id=$id");
		    $sql1=mysqli_query($conn,"delete from sub_category where category_id=$id");
		    	if($sql>0)
		{
			echo "<script>
			window.location='show_category.php?msg=8';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='show_category.php?msg=9';
			</script>";
		}
		break;
		case 6:
		    $id=$_REQUEST['id'];
		    $sql1=mysqli_query($conn,"delete from sub_category where subcategory_id=$id");
		    	if($sql1>0)
		{
			echo "<script>
			window.location='show_category.php?msg=10';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='show_category.php?msg=11';
			</script>";
		}
		break;
		case 7:
				//echo 	$query="insert into user_register(name,mobile,email,password,cpassword,date) values('sajid','8127237766','sajid@gmail.com','asd123','asd123',curdate())";
		 
		    $sql1=mysqli_query($conn,"insert into user_register(name,mobile,email,password,cpassword,date) values('sajid','8127237766','sajid@gmail.com','asd123','asd123',now())");
		    	if($sql1>0)
		{
			echo "<script>alert(' Successfully ');
			window.location='all_user_register.php'
			</script>";
		}
		else
		{
			echo "<script>alert('  Faied ! ');
			window.location='all_user_register.php'
			</script>";
			
		}
		break;
		case 8:
		     $datas='';
		     $pid=$_POST['pid'];
		     $category_id=$_POST['category'];
			 $subcategory=$_POST['subCategory'];
			 $productname=$_POST['productname'];
			 $producttitle=$_POST['producttitle'];
			 $productprice=$_POST['productprice'];
			 $discount=$_POST['discount'];
			 $is_coupon=$_POST['is_coupon'];
			 $is_best_seller=$_POST['is_best_seller'];
			 $quntity=$_POST['quntity'];
			 $profit=$_POST['profit'];
			 $product_delivery=$_POST['product_delivery'];
			 $product_s_descri=$_POST['product_s_descri'];
			 $product_descri=$_POST['product_descri'];
			  $productprice_strike=$_POST['productprice_strike'];         	  
			   $datas="Name='$productname'";
			 
			  $location="product_image/";
			  if($_FILES['product_image1']['name']!=NULL){
				 $image1=time().$_FILES['product_image1']['name'];
				 $tmp_name=$_FILES['product_image1']['tmp_name'];
				 
				 move_uploaded_file($tmp_name,$location.$image1);
				 $datas.=",Image1='$image1'";
			  }
			   if($_FILES['product_image2']['name']!=NULL){
				 $image2=time().$_FILES['product_image2']['name'];
				 $tmp_name=$_FILES['product_image2']['tmp_name'];
				 //move in file
				move_uploaded_file($tmp_name,$location.$image2);
				 $datas.=",Image2='$image2'";
			   }
			     if($_FILES['product_image3']['name']!=NULL){
				 $image3=time().$_FILES['product_image3']['name'];
				 $tmp_name=$_FILES['product_image3']['tmp_name'];
				 //move in file
				move_uploaded_file($tmp_name,$location.$image3);
				 $datas.=",Image3='$image3'";
				 }
			if($_FILES['product_image4']['name']!=NULL){
					 $image4=time().$_FILES['product_image4']['name'];
					 $tmp_name=$_FILES['product_image4']['tmp_name'];
					 //move in file
					 move_uploaded_file($tmp_name,$location.$image4);
					  $datas.=",Image4='$image4'";
				   }
				   
			 if($_FILES['product_image5']['name']!=NULL){
				 $image5=time().$_FILES['product_image5']['name'];
				 $tmp_name=$_FILES['product_image5']['tmp_name'];
				 //move in file
				 move_uploaded_file($tmp_name,$location.$image5);
				  $datas.=",Image5='$image5'";
			 }	 
		
			 #print_r( $datas);
			 
		$sql="update products set Category='$category_id',SubName='$subcategory',Title='$producttitle',Price='$productprice',discount='$discount',is_coupon='$is_coupon',is_best_seller='$is_best_seller',quantitys='$quntity',profit='$profit',DeliveryTime='$product_delivery',short_description='$product_s_descri',strike_price='$productprice_strike',Description='$product_descri',$datas where ProductID='$pid'";
			$ex=mysqli_query($conn,$sql);
			if($ex>0)
		{
			echo "<script>
			window.location='view_product.php?msg=1';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='view_product.php?msg=2';
			</script>";
			
		}
	break;
	
	    case 9:
		
		if(isset($_POST['add_coupon']))
		{
			$coupon=$_POST['coupon'];
			$title=$_POST['title'];
			$discount=$_POST['discount'];
			$amount=$_POST['amount'];
			
			$res6=mysqli_query($conn,"insert into coupon(coupon_name,coupon_title,coupon_discount,coupon_amount,coupon_date)values('$coupon','$title','$discount','$amount',curdate())");
			
			if($res6>0)
			{
				echo "<script>
                      window.location='add_coupon.php?msg=1';</script>";
			}
			else
			{
				echo "<script> 
                      window.location='add_coupon.php?msg=2';</script>";
			}
			
		}
        break;	
	
		case 10:
		
		if(isset($_POST['add_patner']))
		{
			$name=$_POST['patner'];
			$url=$_POST['url'];
			$email=$_POST['email'];
			$customer_no=$_POST['customer_no'];
			$res5=mysqli_query($conn,"insert into patner(name,website,email,customer_no)values('$name','$url','$email','$customer_no')");
			
			if($res5>0)
			{
				echo "<script> alert('add patner succsessful');
                      window.location='add_quary_patner.php'</script>";
			}
			else
			{
				echo "<script> alert('add patner faild');
                      window.location='add_quary_patner.php'</script>";
			}
			
		}
		break;
		


         case 11:
		   if(isset($_POST['add_pin'])){
         //  $place=$_POST['place'];		
          // $pincode=$_POST['pincode'];		
           $city=$_POST['city'];		
           $state=$_POST['state'];
	     //  $sql="insert into product_location (place,pincode,city,state) values('$place','$pincode','$city','$state')";
	       $sql="insert into product_location (city,state) values('$city','$state')";
		   $res=mysqli_query($conn,$sql);
		     if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='add_location_product.php?msg=1'</script>";
			 }else{
				  echo "<script> 
                      window.location='add_location_product.php?msg=2'</script>";
			 }
					  
					  
		   }
		   break;
		   case 12:
		   $id=$_REQUEST['id'];
		   //$place=$_POST['place'];		
          // $pincode=$_POST['pincode'];		
           $city=$_POST['city'];		
           $state=$_POST['state'];
		  // $sql="update product_location set place='$place',pincode='$pincode',city='$city',state='$state' where id='$id'";
		   $sql="update product_location set city='$city',state='$state' where id='$id'";
		   $res=mysqli_query($conn,$sql); 
							  
			if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='show_location_product.php?msg=1'</script>";
			 }else{
				  echo "<script> 
                      window.location='show_location_product.php?msg=2'</script>";
			 }		  
					  
					  
			break;

            case 13 :
            $id=$_REQUEST['id'];
			 $sql="delete from product_location where id='$id'";
		   $res=mysqli_query($conn,$sql); 
		   
		   if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='show_location_product.php?msg=4'</script>";
			 }else{
				  echo "<script> 
                      window.location='show_location_product.php?msg=5'</script>";
			 }	
		   break;  

		
		
		case 15:
		$category=$_POST['category'];
		$b_title=$_POST['b_title'];
		$blog_desc=htmlentities($_POST['blog_desc']);
		$author='Admin';
		
		$b_img=time().$_FILES['blog_image']['name'];
		$tmp_name=$_FILES['blog_image']['tmp_name'];
		$location="blog/";
		//move in file
		move_uploaded_file($tmp_name,$location.$b_img);
		
		//move in file
	// $sqli="insert into employee (name,gender,email,mobile,address,city,document,photo,password) values('$ename','$egender','$eemail','$emobile','$eaddress','$ecity','$edoc','$ephoto','$epassword')";
	
		 $res3=mysqli_query($conn,"insert into blog_data (author,related_to,topic,content,photo,published_on) value('$author','$category','$b_title','$blog_desc','$b_img',curdate())");
		
		
		if(mysqli_affected_rows($conn)>0)
		{
			echo "<script>
			window.location='add_blog.php?msg=1';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='add_blog.php?msg=2';
			</script>";
		}
		break;
		case 16:
		$id=$_REQUEST['id'];
		
		 $res3=mysqli_query($conn,"delete from blog_data where id='$id'"); 
		
		
		if(mysqli_affected_rows($conn)>0)
		{
			echo "<script>
			window.location='view_blog.php?msg=3';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='view_blog.php?msg=4';
			</script>";
		}
		break;
		
		case 17:
		$id=$_POST['id'];
		$category=$_POST['category'];
		$b_title=$_POST['b_title'];
		$blog_desc=htmlentities($_POST['blog_desc']);
		$author='Admin';
		$sql='';
		if(!empty($_FILES['blog_image']['name'])){
		$b_img=time().$_FILES['blog_image']['name'];
		$tmp_name=$_FILES['blog_image']['tmp_name'];
		$location="blog/";
		//move in file
		move_uploaded_file($tmp_name,$location.$b_img);
		 $sql="update blog_data set author='$author',related_to='$category',topic='$b_title',content='$blog_desc',photo='$b_img',published_on=curdate() where id='$id'";
		}
		else{
		 $sql="update blog_data set author='$author',related_to='$category',topic='$b_title',content='$blog_desc',published_on=curdate() where id='$id'";	
		}
		//move in file
	// $sqli="insert into employee (name,gender,email,mobile,address,city,document,photo,password) values('$ename','$egender','$eemail','$emobile','$eaddress','$ecity','$edoc','$ephoto','$epassword')";
	
		 $res3=mysqli_query($conn,$sql);
		
		
		if(mysqli_affected_rows($conn)>0)
		{
			echo "<script>
			window.location='view_blog.php?msg=1';
			</script>";
		}
		else
		{
			echo "<script>
			window.location='view_blog.php?msg=2';
			</script>";
		}
		break;
		case 18:
		
           $coupon_code=$_POST['coupon_code'];		
           $coupon_name=$_POST['coupon_name'];		
           $dis_per=$_POST['dis_per'];		
           $exp_date=$_POST['exp_date'];
           $no_of_time=$_POST['no_of_time'];
	       $sql="insert into coupon_code_tb (coupon_name,coupon_code,dis_per,no_of_time,exp_date) values('$coupon_name','$coupon_code','$dis_per','$no_of_time','$exp_date')";
	      
		   $res=mysqli_query($conn,$sql);
		     if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='add_coupon_code.php?msg=1'</script>";
			 }else{
				  echo "<script> 
                      window.location='add_coupon_code.php?msg=2'</script>";
			 }
		break;	

        	case 19:
		
           $coupon_code=$_POST['coupon_code'];		
           $coupon_name=$_POST['coupon_name'];		
           $dis_per=$_POST['dis_per'];		
           $no_of_time=$_POST['no_of_time'];		
           $exp_date=$_POST['exp_date'];
	       $sql="update coupon_code_tb set coupon_name='$coupon_name',coupon_code='$coupon_code',dis_per='$dis_per',exp_date='$exp_date',no_of_time='$no_of_time'";
	      
		   $res=mysqli_query($conn,$sql);
		    if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='show_coupon_code.php?msg=3'</script>";
			 }else{
		  	  echo "<script> 
                      window.location='show_coupon_code.php?msg=4'</script>";
			 } 
		break;	 		
		 case 20:
         $id=$_REQUEST['id'];		 
		 $del_chrg=$_REQUEST['delivery_charges'];
		 $sql="update delivery_charge_tbl set delivery_charges='$del_chrg' where id='$id'";
         
          $res=mysqli_query($conn,$sql);
           if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='show_delivery_charge.php?msg=3'</script>";
			 }else{
		  	  echo "<script> 
                      window.location='show_delivery_charge.php?msg=4'</script>";
			 } 
			 break;	 		
		 case 21:
         $id=$_REQUEST['id'];		 
		 $gst_per=$_REQUEST['gst_percentage'];
		 $sql="update gst set gst_percentage='$gst_per' where id='$id'";
         
          $res=mysqli_query($conn,$sql);
           if(mysqli_affected_rows($conn)>0){
		   echo "<script>
                      window.location='show_gst.php?msg=3'</script>";
			 }else{
		  	  echo "<script> 
                      window.location='show_gst.php?msg=4'</script>";
			 } 
		break;		  
		    
 }
?>