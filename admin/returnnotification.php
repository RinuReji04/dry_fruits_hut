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
				<b><h1><font color="white">RETURN</font></h1></b>
			</caption>
			<tr>
				<th><b>RECIVER NAME</b></th>
				<th><b>ADDRESS</b></th>
				<th><b>PRODUCT NAME</b></th>
				<th><b>PRODUCT PRICE</b></th>
				<th><b>DATE</b></th>
				<th><b>QUANTITY</b></th>
				<th><b>EXPIRY DATE</b></th>
				<th><b>STATUS</b></th>
				<th colspan="6"><b>ACTION</b></th>
			</tr>
			<?php
				include'dbconnect.php';
					$query1="SELECT * from return_item";
				$result=mysqli_query($conn,$query1);
				while($row=mysqli_fetch_assoc($result)){
				$query2="select * from delivery,shipping,order_master,order_summary where delivery.o_id=$row[o_id] and shipping.s_id=delivery.s_id and order_master.o_id=$row[o_id] and order_summary.o_id=$row[o_id] and order_summary.p_id=$row[p_id]";
				$result1=mysqli_query($conn,$query2);
				$row2=mysqli_fetch_assoc($result1);	
					$query3="select * from product,product_details where product.p_id=$row[p_id] and product_details.p_id=$row[p_id]";
					$result2=mysqli_query($conn,$query3);
					$row3=mysqli_fetch_assoc($result2);
			?>
		<tr>
			<td align="center"><?php echo "$row2[r_fname] $row2[r_lname]";?>
		<td align="center"><?php echo "$row2[h_no]
									  $row2[city] 
									  $row2[l_mark] 
									  $row2[pin_code]";
									  ?></td>
			<td><?php echo $row3['p_name'] ?></td>
			<td><?php echo $row3['price'] ?></td>
			<td><?php echo $row2['date'] ?></td>
			<td><?php echo $row2['quantity'] ?></td>
			<td><?php echo $row3['exp_date'] ?></td>
			<td><?php echo $row['apv'] ?></td>
			<td><a href="returnaction.php?id=<?php echo $row['re_id'];?>&& pid=<?php echo $row['p_id'];?>&& oid=<?php echo $row['o_id'];?> && r">approve</a></td>
			<td><a href="returnaction.php?id=<?php echo $row['re_id'];?>&& t">reject</a></td>
	</tr>
		<?php
}
	?>
		</table>
</form>
</body>
</html>
