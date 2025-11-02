<html>
<?php
require("menu.php");
?>
<head>
	<style>
		table,th,td{
			border: 1px solid #fff;
			font-family: "Trebuchet MS";
			width: 15%;
			color: black;
		}
		th,td{
			padding: 6px;
			text-align: center;
			text-color: violet;
		}

	</style>
</head>
<body bgcolor="pink">
	<form>
		<br>
		<table style="width:100%" id="fb" font color="white">
			<caption align="center">
				<b><h1><font color="white">CATEGORY DETAILS</font></h1></b>
			</caption>
			<tr>
				<th><b>CATEGORY ID</b></th>
				<th><b>CATEGORY NAME</b></th>
				<th><b>CATEGORY IMAGE</b></th>
			</tr>
			<?php
				include'dbconnect.php';
				$select="SELECT * FROM category WHERE category.available=1";
				$result=mysqli_query($conn,$select);
				while($row=mysqli_fetch_assoc($result)){
			?>
		
		<tr>
			<td><?php echo $row['ca_id'] ?></td>
			<td><?php echo $row['ca_name'] ?></td>
			<td><img src="img/<?php echo $row['ca_img'] ?>" width="100"></td>
		</tr>
		<?php
	}
	?>

		</table>
</form>
</body>
</html>