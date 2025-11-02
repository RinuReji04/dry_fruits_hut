<html>
<head>
</head>
<div>
<?php
require('menu.php');
?>
</div>
<body bgcolor="white">

<table border="10" cellpadding="10" cellspacing="10" width="100%" align="center">
<tr>
<th colspan="4">FEEDBACK</th>
</tr>
<tr>
<th>Orderid</th>
<th>User Name</th>
<th>Message</th>
<th>replay</th>
</tr>
<?php
		require('dbconnect.php');
		$query="select review.o_id,review.feedback_disc,review.feedback_id,order_master.c_id,customer_registration.c_fname,customer_registration.c_lname from review,order_master,customer_registration where order_master.o_id=review.o_id and customer_registration.c_id=order_master.c_id" ;
		$result=mysqli_query($conn,$query);
		$i=1;
		while($row=$result->fetch_assoc())
		  {
			?>
			<tr>			
		 <td align="center"><?php echo $row['o_id'] ?></td>	
		 <td align="center"><?php echo $row['c_fname']; echo $row['c_lname'] ?></td>
		 <td align="center"><?php echo $row['feedback_disc'] ?></td>
		 <td align="center"><a href="replay.php?feedback_id=<?php echo $row['feedback_id'] ?>">replay</a></td>
			</tr>
			<?php }?>
			
</table>

</body>
</html>