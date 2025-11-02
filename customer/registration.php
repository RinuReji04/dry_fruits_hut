<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<section>
		<div class="form-container">
		<h1>REGISTRATION</h1>
		<form action="regprocess.php" class="cotainer" method="post">
		<br><label>FIRST NAME:</label>	
				<input type="text" name="c_fname"  onkeyup="this.value=this.value.toUpperCase()"required>
			<br><label>LAST NAME:</label>	
				<input type="text" name="c_lname"  onkeyup="this.value=this.value.toUpperCase()" required>
				<br><label>PHONE NUMBER:</label>	
				<input type="text" name="ph_no" required>
					<br><label>EMAIL ID</label>	
				<input type="email" name="email" required>
						<br><label>USER NAME:</label>	
						<input type="text" name="user_name" required>
							<br><label>PASSWORD</label>	
								<input type="text" name="password" required><br>
			<input type="submit" value="submit">
			<input type="reset" value="reset">
			<h2>ALREADY REGISTRED CLICK LOGIN</h2><a href="login.php">LOGIN</a>
	<?php
	if(isset($_GET['user']))
	{
		echo'<font color="red" font face="verdana" size="2">try another user name</font>';
	}
	if(isset($_GET['no']))
	{
		echo'<font color="red" font face="verdana" size="2">PLEASE fill up</font>';
	}
	?>
</div>
</form>
</section>
</body>
</html>