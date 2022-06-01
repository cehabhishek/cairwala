<?php
error_reporting(0);
$email=base64_decode($_REQUEST['id']);
//echo $email;
$name=$_REQUEST['n'];
?>

<?php include("header.php");?>
<div class="content-wrapper"> 
      
      <div class="content">
          <div class="info-box">
      <h4 class="text-black" style="#254470;">All Orders of <?php echo $name; ?></h4>
      
      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" data-name="cool-table">
											<thead>
												<tr>
										<th>Order ID</th>
                                          <th>Product Name</th>
                                          <th>Base Price</th>
                                          <th>Quntity</th>
                                          <th>Order Date</th>
                                          <th>Payment Method</th>
						      <th>delivery_date</th>
                                          <th>Action</th>
                                          <th>Invoice</th>
                                        </tr>
                                      </thead>
										                                      <tbody>
                            		  <?php
                            		  $a=0;
                            			$res=mysqli_query($conn,"select * from orders where Email='$email'");
                            			while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                            			{
                            			    $a++;
                            		  ?>
                                        <tr>
                                             <td>CHIWLA00<?php echo $a;?></td>
                                          <td><?php $p=$row['ProductID'];
                                          $res1=mysqli_query($conn,"select * from products where ProductID='$p'");
                            			while($row1=mysqli_fetch_array($res1,MYSQLI_BOTH))
                            			{
                            			    echo $row1['Name'];
                            			}
                                          ?></td>
                                          <td><?php echo $row['base_price'];?></td>
                                          <td><?php echo $row['Quantity'];?></td>
                                          <td><?php echo $row['Date'];?></td>
                                          <td><?php echo $row['onlinePayment'];?></td>
                                          <td>	<?php echo $row['delivery_date'];?></td>
                                           
										  <td class="center">
										  <a href="delete_user_order.php?id=<?php echo $row['OrderID'];?>" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a> </td>
                                          <td><a href="generate_invoice.php?id=<?php echo base64_encode($row['OrderID']);?>" class="btn btn-circle btn-info ">Download Invoice</a></td>
                                        </tr>
                            			<?php
                            			}
                            			?>
											</tbody>
										</table>
                  </div>
      </div>
      </div>
  </div>
<?php include("footer.php");?>