<html>
<header>
	<title>cart</title>
</header>
<?php
	require('menu.php');
?>
<body><br>
		<h1 class="title" align="center">Viewcart</h1>
				<table cellpadding="10" cellspacing="10" width=100%> 
					<tr>
									<td> <b>No
									<td> <b>Item Name
									<td> <b>Qty
									<td> <b>Price
									<td> <b>Delete
								</tr>
							<?php
	require('dbconnect.php');
	if(isset($_SESSION['c_id']))
		{
		 $c_id=$_SESSION['c_id'];

				$tot = 0;
									$i = 1;
					$query="select * from cartmaster,cartdetail,product where cartmaster.c_id='$c_id' and cartdetail.cart_id=cartmaster.cart_id and product.p_id=cartdetail.p_id";
					$result=mysqli_query($conn,$query) or die("wrong query");
					while($col=mysqli_fetch_assoc($result))
					{

								
									$cart=$col['cart_id'];
										?>
												<tr>
											<td> <?php echo $i ?></td>
											<td> <?php echo $col['p_name']?></td>
										
											<td> <?php echo $col['quantity']?></td>
											
											<td> <?php if($col['offer']==0)//check whether there is offer price for that product
		 									{
		 										echo $col['quantity']*$col['price'];
		 										$tot = $tot + ($col['quantity']*$col['price']);
											} else
											{
												echo $col['quantity']*$col['offer'];
												$tot = $tot + ($col['quantity']*$col['offer']);
											}?>
							<td> <a href="process_cart.php?caid=<?php echo $col['cart_id']; ?>&& q=<?php echo $col['quantity']; ?> && pid=<?php echo $col['p_id']; ?>">Delete</a></td>
										</tr>									
										<?php $i++;	
									}								
								?>								
							<tr>
							<td colspan="4" align="center">
							<h4>Total:</h4>
							
							</td>
							<td> <h4><?php echo $tot; ?> </h4></td>
							</tr>

							<br>
								</table>						

								<br>
							<center>
							<!--<input type="submit" value="Re-Calculate">-->
							<?php
							if(!empty($cart))
                                echo '<a href="order.php?t='.$tot.'&c='.$cart.'">CONFIRM & PROCEED</a>';
                            }
                        
                            ?>
                      
							</center>				
</body>
</html>
