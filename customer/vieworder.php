<html>
<header>
	<title>cart</title>
</header>
<?php
	require('menu.php');
?>
<body>
	<CENTER><br>
		<h1 class="title" align="center">MY ORDER</h1>
				<table cellpadding="10" cellspacing="10" width=100%> 
					<tr>
									<td> <b>No</b></td>
									<td> <b>Item Name</b></td>
									<td> <b>view details</b></td>
								</tr>
							<?php
	require('dbconnect.php');
	if(isset($_SESSION['c_id']))
		{
		 $c_id=$_SESSION['c_id'];
		 	$i = 1;
		 	$query="select * from order_summary,order_master,product where order_master.c_id=$c_id and order_summary.o_id=order_master.o_id and product.p_id=order_summary.p_id";
		 		$result=mysqli_query($conn,$query) or die("wrong query");
					while($col=mysqli_fetch_assoc($result))
					{?>
						<tr>
						<td><?php echo $i; $i++; ?></td>
						<td><?php echo $col['p_name'] ?></td>
						<td><a href="viewdetails.php?oid=<?php echo $col['o_id'] ?>">viewdetails</a></td>
					</tr>
					<?php }
				} 
				if(isset($_GET['o']))
			{
				echo '<font color="red" font face="verdana" size="2">YOU ALREADY SENT RETUEN REQUEST</font>';
				echo '<br><br>';
			}?>
	
</table>
</CENTER>
</body>
</html>
