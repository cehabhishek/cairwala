<?php 
include("db.php");
         $response = array();
    
         if(isset($_REQUEST['search']) ){
			 $ser=$_REQUEST['search'];
			 
           // Select record
            $query="select * from products where (Name like '%$ser%' OR Title like '%$ser%' OR SubName like '%$ser%') and status='1'";
               $res=mysqli_query($conn,$query);
			 if(mysqli_num_rows($res)>0){
			 while($row=mysqli_fetch_array($res)){
				 $response[] = array("value"=>$row['Name'],"label"=>$row['Name']);
				 $response[] = array("value"=>$row['Title'],"label"=>$row['Title']);
				 $response[] = array("value"=>$row['SubName'],"label"=>$row['SubName']);
			  }
            
			 }else{
				 $response=array("value"=>'',"label"=>'Sorry,No such product is available');
			 }

    
         }
    
         echo json_encode($response);




?>