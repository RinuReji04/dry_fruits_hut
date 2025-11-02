<html>
<head>
	<title>update action</title>
	<?php
require("menu.php");
?>
</head>
<body>
		<form action="updateactionprocess.php" method="get">
		<?php
include 'dbconnect.php';
if(!empty($_GET['o_id']))
	{
	   $oid=$_GET['o_id'];
	   	?>	
	<h1 align="center">UPDATE ITEM	</h1>
	<table cellspacing="10" cellpadding="10" width=100% >
	   	<tr>
	   	<th align="center">ORDER ID</th>
	   	<td><input type="text" name=o_id value=<?php echo "$oid";?>></td>
	   </tr>
	   <tr>
	   	<th align="center">STATUS</th>
	   	<td ><select name="status">
	   		<option value="not packed" selected>Not packed</option>
	   		<option value="out_for_delivery">Out for delivery</option>
	   		<option value="delivered">Delivered</option>
	</select>
</td>
</tr>
</table><center>
<input type="submit" value="save and change">
</center>

	<?php
	
	 } 
	
	?>
	</form>
 
</body>
</html>
