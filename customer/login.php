<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>customer login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<section>
		<div class="form-container">
		<h1>login</h1>
		<form action="loginprocess.php" class="cotainer" method="post">
			<div class="control">
				<label>Username</label>	
				<input type="text" name="username" required>
			</div>
			<div class="control">
				<label>password</label>
				<input type="password" name="password" required>
			</div>
			<div>
				<button type="submit" value="login">LOGIN<span></span></button><BR>
				NEW USER?<a href="registration.php">REGISTRATION</a>
			</div>
			<?php
			if(isset($_GET['usr']))
			{
				echo '<font color="red" font face="verdana" size="2">incorrect user name</font>';
				echo '<br><br>';
			}
			if(isset($_GET['pwd']))
			{
				echo'<font color="red" font face="verdana" size="2">incorrect password</font>';
				echo '<br><br>';
			}
			?>
		</form>
		</div>
	</section>
</body>
</html>