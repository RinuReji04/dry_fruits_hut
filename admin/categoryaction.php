<html>
<?php
require("menu.php");
?>
<head>
	<script type="text/javascript">
		function sureToApprove(ca_id)
		{
			if(confirm("Are you sure you want to discontinue this category?"))
			{
				window.location.href='delete_category.php?ca_id='+ca_id;
			}
		}
	</script>
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
				<th colspan="6"><b>ACTION</b></th>
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
			<td><a href="updatecat.php?ca_id=<?php echo $row['ca_id'];?>">update</a></td>
			<td><a href="javascript:sureToApprove(<?php echo $row['ca_id'];?>)">DISCONTINUE</a></td>
		</tr>
		<?php
	}
	?>

		</table>
</form>
</body>
</html>