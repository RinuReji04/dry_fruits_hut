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
				<b><h1><font color="white">PRODUCT DETAILS</font></h1></b>
			</caption>
			<tr>
				<th><b>PRODUCT ID</b></th>
				<th><b>PRODUCT NAME</b></th>
				<th><b>PRODUCT PRICE</b></th>
				<th><b>OFFER PRICE</b></th>
				
				<th><b>PRODUCT IMAGE</b></th>
				<th><b>CATEGORY NAME</b></th>
				<th><b>EXPIRY DATE</b></th>
              			<th><b>PRODUCT DISCRIPTION</b></th>
				<th colspan="6"><b>RELEASE</b></th>
			</tr>
			<?php
				include'dbconnect.php';
					$select="SELECT *,ca_name,quantity,exp_date FROM product,category,product_details WHERE product.ca_id=category.ca_id and product.p_status='yes' and product.p_id=product_details.p_id and product_details.exp_date<=NOW()";
							
				$result=mysqli_query($conn,$select);
				while($row=mysqli_fetch_assoc($result)){
				
			?>
		
		<tr>
			<td><?php echo $row['p_id'] ?></td>
			<td><?php echo $row['p_name'] ?></td>
			<td><?php echo $row['price'] ?></td>
			<td><?php echo $row['offer'] ?></td>
				
			<td><img src="img/<?php echo $row['p_img'] ?>" width="100"></td>

			<td><?php echo $row['ca_name'] ?></td>
			<td><?php echo $row['exp_date'] ?></td>
			<td><?php echo $row['disc'] ?></td>
			<td><a href="release.php?p_id=<?php echo $row['p_id'] ?>&& exp=<?php echo $row['exp_date'] ?>">RELEASE</a></td>
	</tr>
		<?php
	}

	?>

		</table>
</form>
</body>
</html>
