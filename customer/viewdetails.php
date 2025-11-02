<html>
<header>
	<title>cart</title>
</header>
<?php
	require('menu.php');
?>
<body><br>
		<h1 class="title" align="center">MY ORDER</h1>
				<table cellpadding="5" cellspacing="5" width=50%> 
							<?php
	require('dbconnect.php');
	if(isset($_GET['oid']))
		{
		 $oid=$_GET['oid'];
		 	$i = 1;
		 	$query="select * from order_master,order_summary,product where order_master.o_id=$oid and order_summary.o_id=$oid and product.p_id=order_summary.p_id";
		 		$result=mysqli_query($conn,$query) or die("wrong query");
					while($col=mysqli_fetch_assoc($result))
					{?>
						<tr> <td><b></b></td><td align="center"><?php echo $col['p_name'] ?></td></tr>
						<tr> <td><b></b></td><td align="center"><img src="img/<?php echo $col['p_img'] ?>" width="150" height="150"><td></tr>
						<tr> <td align="center"><b>PRICE:</b></td><td align="center"><?php echo $col['price'] ?></td></tr>
						<tr> <td align="center"><b>QUANTITY:</b></td><td align="center"><?php echo $col['quantity'] ?></td></tr>
						<tr> <td align="center"><b>CURRENT STATUS:</b></td><td align="center"><?php echo $col['status'] ?></td></tr>
						<?php
						if($col['status']=='delivered')
						{ ?>
						<tr><td><b></b></td><td align="center"><a href="return.php?oid=<?php echo $col['o_id'] ?>&&p_id=<?php echo $col['p_id'] ?>">RETURN ITEM</a></td></tr>
						<tr><td><b></b></td><td align="center"><a href="feedback.php?oid=<?php echo $col['o_id'] ?>">FEEDBACK</a></td></tr>
						<?PHP }
					}
				}
				?>
			</table>
		</body>
		</html>