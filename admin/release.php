<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>menu</title>
<?php
require("menu.php");
require('dbconnect.php');
?>
</head>
<body>
<br><br><center><table cellspacing="20">

	<?php
	if(!empty($_GET['p_id']) & !empty($_GET['exp']))
	{
	   $id=$_GET['p_id'];
	   $exp=$_GET['exp'];
	   $query="delete  from product_details where p_id='$id' and exp_date='$exp'";
	   mysqli_query($conn,$query) or die("wrong query");
	   header("location:productdetails.php?");	
	}
	?>
</table>
</center>
</body>
</html>
