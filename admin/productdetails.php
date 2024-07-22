<html>
<?php
require("menu.php");
?>
<head>
	<script type="text/javascript">
		function sureToApprove(p_id)
		{
			if(confirm("Are you sure you want to discontinue this product?"))
			{
				window.location.href='delete_product.php?p_id='+p_id;
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
				<b><h1><font color="white">PRODUCT DETAILS</font></h1></b>
			</caption>
			<tr>
				<th><b>PRODUCT ID</b></th>
				<th><b>PRODUCT NAME</b></th>
				<th><b>PRODUCT PRICE</b></th>
				<th><b>OFFER PRICE</b></th>
				<th><b>QUANTITY</b></th>

				<th><b>EXPIRY DATE</b></th>
				<th><b>PRODUCT IMAGE</b></th>
				<th><b>CATEGORY NAME</b></th>
                <th><b>PRODUCT DISCRIPTION</b></th>
				<th colspan="6"><b>ACTION</b></th>
			</tr>
			<?php
				include'dbconnect.php';
				$select="SELECT *,ca_name,quantity,exp_date FROM product,category,product_details WHERE product.ca_id=category.ca_id and product.p_status='yes' and product.p_id=product_details.p_id ";
								//$select="SELECT  *,ca_name,quantity,exp_date FROM product,category,product_details WHERE product.ca_id=category.ca_id and product.p_status='yes' and product.p_id=product_details.p_id  and product_details.exp_datemax(exp_date)";

				//$select=(SELECT *,ca_name FROM product,category WHERE product.ca_id=category.ca_id and product.p_status='yes') union (select quantity,exp_date from product_details where product.p_id=product_details.p_id and product_details.exp_date=("select max(product_details.exp_date"))";
				$result=mysqli_query($conn,$select);
				while($row=mysqli_fetch_assoc($result)){
				//$pro="SELECT exp_date,quantity from product_details WHERE product_details.exp_date=(select max(exp_date) WHERE  product_details.p_id=$row[p_id] ) ";	
				//$ds=mysqli_query($conn,$pro);
				//while($col=mysqli_fetch_assoc($ds)){
			?>
		
		<tr>
			<td><?php echo $row['p_id'] ?></td>
			<td><?php echo $row['p_name'] ?></td>
			<td><?php echo $row['price'] ?></td>
			<td><?php echo $row['offer'] ?></td>
						<td><?php echo $row['quantity'] ?></td>

			<td><?php echo $row['exp_date'] ?></td>
			<td><img src="/img/<?php echo $row['p_img'] ?>" width="100"></td>

			<td><?php echo $row['ca_name'] ?></td>
		
			<td><?php echo $row['disc'] ?></td>
			<td><a href="updateproduct.php?p_id=<?php echo $row['p_id'];?>">UPDATE</a></td>
			<td><a href="javascript:sureToApprove(<?php echo $row['p_id'];?>)">DISCONTINUE</a></td>
		</tr>
		<?php
	}

	?>

		</table>
</form>
</body>
</html>
