<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style3.css">
</head>
<?php
require("menu.php");
?>
<body>
	<div class="bgimage">
		<form align="center" action="categoryprocess.php" method="post" class="container">
			<table align="center" cellpadding="10" cellspacing="10">
				<caption>CATEGORY</caption>
				<tr><td>&nbsp;<br></td></tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
					<td><i><b>Category name</b></i></td>
					<td><input type="text" size="30" maxlength="30" name="txtcat" onkeyup="this.value=this.value.toUpperCase()" required></td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
					<td><i><b>CATEGORY IMAGE</b></i></td>
					<td><input type="file" size="30" maxlength="30" name="txtimg" required></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="submit"></td>
				</tr>
			</table>
		</form>
		<?php
		if(isset($_GET['added']))
		{
			echo '<br><br>';
	        echo '<br><br><center>';
			echo '<i><b><font color="red" size="4">added successfully.......</font>';
			echo '<br><br></center>';
		}
			if(isset($_GET['not']))
		{
			echo  '<i><b><font color="indigo" align="center" size="4">please fill up.......</font>';
			echo '<br><br>';
		}
				if(isset($_GET['cat']))
		{
			echo '<br><br>';
	        echo '<br><br><center>';
			echo '<i><b><font color="red" align="center" size="4">CATEGORY ALREADY EXISTING</font>';
			echo '<br><br>';
		}

		?>
	</div>
</body>
</html>