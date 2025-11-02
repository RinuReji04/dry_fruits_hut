<html>
<?php
	require('menu.php');
?>
<body>
<h1 class="title">Shipping</h1>

<form action="shipprocess.php?" class="cotainer" method="post">
	<br><label>FIRST NAME:</label>	
				<input type="text" name="s_fname"  onkeyup="this.value=this.value.toUpperCase()" required>
					<br><label>LAST NAME:</label>	
						<input type="text" name="s_lname"  onkeyup="this.value=this.value.toUpperCase()" required>
							<br><label>HOUSE NUMBER:</label>	
								<input type="number" name="h_no" required>
									<br><label>CITY:</label>	
										<input type="text" name="city" onkeyup="this.value=this.value.toUpperCase() "required>
											<br><label>PIN CODE:</label>	
												<input type="number" name="pin_code" required>
														<br><label>LAND MARK:</label>	
															<input type="text" name="l_mark" required>
																<br><label>PHONE NUMBER:</label>	
																	<input type="number" name="ph_no" required>
			<br><input type="submit" value="submit">
			<input type="reset" value="reset">
			</body>		
</html>