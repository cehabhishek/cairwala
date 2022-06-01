<?php 
ob_start();

$d=$_POST['id'];


	   
		  include('db.php');
		  
		     
		  
		     $query="select * from register where id='$d'";
			 $res=mysqli_query($conn,$query);
		      if($row=mysqli_fetch_array($res))
				  
				  {
            
			  echo "<div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>Name</label>
              <input type='text' name='name' class='form-control' id='name'value='$row[name]' required>
              </div>
              </div>
			 
			  <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>Mobile No</label>
              <input type='text' name='mobile' class='form-control' id='mob' value='$row[mobile]' required>
              </div>
              </div>
			   <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'> Address</label>
              <textarea cols='10' rows='5' name='address' class='form-control' id='address' required>$row[address]</textarea>
              </div>
              </div>
			 
			  <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>Landmark</label>
              <input type='text' name='landmark' class='form-control' id='landmark' value='$row[landmark]' required>
              </div>
              </div>
			  <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>City</label>
              <input type='text' name='city' class='form-control' id='city' value='$row[city]' required>
              </div>
              </div>
			  <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>State</label>
              <input type='text' name='state' class='form-control' id='state' value='$row[state]'>
              </div>
              </div>
			  <div class='col-md-12'>
              <div class='form-group'>
              <label for='name'>Pincode</label>
              <input type='text' name='zip' class='form-control' id='zip' value='$row[zip]' required>
              </div>
              </div>
			  <input type='hidden' name='id' class='form-control' id='' value='$row[id]'>
			  ";
				  }


?>