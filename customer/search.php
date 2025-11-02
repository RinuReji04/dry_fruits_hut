<html>
<head>
<title>about us</title>
<?php 
require("menu.php");
?><br>
</head>
<body>
	<form method="get" action="searchprocess.php">
		<center>
	<table align="center">
		<tr>
		<th><input type="text" name="item" onkeyup="this.value=this.value.toUpperCase()"></th>
		</tr>
		<tr>
			<th><input type="submit" value="search"></th>
		</tr>
	</table>

</form>
	<?php
	if(isset($_GET['user']))
	{
		echo'<font color="red" font face="verdana" size="2">product is not available</font>';
	}
	?>
	</center>
</body>
</html>
