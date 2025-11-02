<html>
<head>
	<title>product notification</title>
	<?php
require("menu.php");
?>
</head>
<body>
	<center>
		<table cellspacing="10" cellpadding="10" width=100%>
			<tr>
				<th>sl number</th>
				<th>order id</th>
				<th>item name</th>
				<th>order date</th>
				<th>reciver's name</th>
				<th>shipping address</th>
				<th>action</th>
			</tr>
<?php
include'dbconnect.php';
$i=1;
$query=" SELECT o_id,p_id from order_summary";
$res=mysqli_query($conn,$query) or die("wrong query");
  while($row=mysqli_fetch_assoc($res))
	   	{
	   		$o_id=$row['o_id'];
	   		$p_id=$row['p_id'];
	   	$q1="select * from order_master,delivery,shipping,product where order_master.o_id=$o_id and delivery.o_id=$o_id and delivery.s_id=shipping.s_id and product.p_id=$p_id"; 
	   	$result=mysqli_query($conn,$q1) or die("wrong query1");
	   	while($row2=mysqli_fetch_assoc($result))
	   		{
	   			?>
	<tr>
		<td align="center"><?php echo $i;?></td>
		<td align="center"><?php echo $row['o_id'] ?></td>
		<td align="center"><?php echo $row2['p_name'] ?></td>
		<td align="center"><?php echo $row2['date'] ?></td>
		<td align="center"><?php echo "$row2[r_fname] $row2[r_lname]";?>
		<td align="center"><?php echo "$row2[h_no]
									  $row2[city] 
									  $row2[l_mark] 
									  $row2[pin_code]";
									  ?></td>
		<td align="center"><a href="orderaction.php?o_id=<?php echo $row['o_id']?>"><?php echo "product action"; $i++; ?></a></td>
	</tr>
	<?php	
	   		}
	   
	   }

?>
</table>
</center>
</body>
</html>