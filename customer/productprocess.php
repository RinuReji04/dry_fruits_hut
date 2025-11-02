<?php
			session_start();
			require('dbconnect.php');
				if(isset($_SESSION['c_id']) and isset($_SESSION['p_id']))
	{
		 $c_id=$_SESSION['c_id'];
		 $p_id=$_SESSION['p_id'];
		 $count=0;
print_r($_SESSION);
$query="select c_id from cartmaster";
$res=mysqli_query($conn,$query);
	$car=mysqli_fetch_assoc($res);
if($car['c_id']!=$c_id)
{
$query1="insert into cartmaster(c_id) values('$c_id')";

			mysqli_query($conn,$query1) or die($query1."can't connect to query1");
	}

	$query2="select cart_id from cartmaster where c_id='$c_id'";
	$res=mysqli_query($conn,$query2) or die($query2."can't connect to query2");
	$row=mysqli_fetch_assoc($res);
	$cart_id=$row['cart_id'];
	if(!empty($_GET))
	{
		$quantity=$_GET["quantity"];
		$query4="select * from cartdetail where cart_id=$cart_id";
		$result=mysqli_query($conn,$query4) or die($query4."cant connect to query4");
		while($row1=mysqli_fetch_assoc($result))
		{
			if($row1['p_id']==$p_id)
			{
				$count=1;
				$qty=$row1[quantity];
			}
		}
		if($count!=1)
		{
				$query3="insert into cartdetail(cart_id,p_id,quantity) values('$cart_id','$p_id','$quantity')";
				mysqli_query($conn,$query3) or die($query3."can't connect to query3");
				header("location:viewcart1.php?c_id=$c_id");
		}
		else
		{
			$q=$quantity+$qty;
			$query5="update cartdetail set quantity=$q where p_id=$p_id";
				mysqli_query($conn,$query5) or die($query5."can't connect to query5");
				header("location:viewcart1.php?c_id=$c_id");
		
			}
}
}

	?>