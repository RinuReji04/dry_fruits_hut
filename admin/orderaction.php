<html>
<head>
	<title>order action</title>
	<?php
require("menu.php");
?>
</head>
<body>
	<center>
		<table cellspacing="10" cellpadding="10" width=100%>
			<tr>
				<th>sl number</th>
				<th>product id</th>
				<th>item name</th>
				<th>quantity</th>
				<th>price</th>
				<th>status</th>
				<th>action</th>
			</tr>
<?php
include 'dbconnect.php';
$i=1;
	if(!empty($_GET['o_id']))
	{
	   $oid=$_GET['o_id'];
	   
	   $query="select * from order_master,order_summary,product where order_master.o_id=$oid and order_summary.o_id=order_master.o_id and product.p_id=order_summary.p_id";
	   $res=mysqli_query($conn,$query) or die("wrong query");
	   while($row=mysqli_fetch_assoc($res))
	   { ?>
	<tr>
		<td align="center"><?php echo $i; ?></td>
		<td align="center"><?php echo $row['p_id'] ?></td>
		<td align="center"><?php echo $row['p_name'] ?></td>
		<td align="center"><?php echo $row['quantity'] ?></td>
		<td align="center"><?php echo $row['price'] ?></td>
		<td align="center"><?php echo $row['status'] ?></td>

	   <?php
	}?>
			<td align="center"><a href="updateaction.php?o_id=<?php echo $oid ?>"><?php echo "product action"; $i++; ?></a></td>
</tr>
<?php
}
	   
?>
</table>
</center>
</body>
</html>