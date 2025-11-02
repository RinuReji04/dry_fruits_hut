<?php
 require('menu.php');
require('dbconnect.php');
//approve or reject return request
	if(isset($_GET['id']))
		{	
		$re_id=$_GET['id'];
		if(isset($_GET['r']))
		{
		$query="update return_item set apv='approve' where re_id=$re_id";
		$result=mysqli_query($conn,$query) or die("wrong query");
		if(isset($_GET['pid'])&& isset($_GET['oid']))
		{
			$p_id=$_GET['pid'];
			$o_id=$_GET['oid'];
			$query1="select * from order_summary where o_id=$o_id";
			$result1=mysqli_query($conn,$query1) or die("wrong query1");
		 	if($row=mysqli_fetch_assoc($result1)>1)//check whether more than one item order at a time
		 	{
				$query2="delete from order_summary where o_id=$o_id and p_id=$p_id";
				$result2=mysqli_query($conn,$query2) or die("wrong query2");
				$query3="select offer from product where p_id=$p_id";
					$result3=mysqli_query($conn,$query3) or die("wrong query3");
					$row3=mysqli_fetch_assoc($result3);
		 			if($row3['offer']==0)//check whether there is offer price for that product
		 			{
					$query4="select quantity,price from order_summary,product where order_summary.o_id='$o_id' and order_summary.p_id='$p_id' and product.p_id='$p_id'";
					$result4=mysqli_query($conn,$query4) or die("wrong query4");
					$row4=mysqli_fetch_assoc($result4);
					$priced=$row4['quantity']*$row4['price'];
					$query5="UPDATE order_master SET t_price='t_price-$priced' WHERE o_id=$o_id";
					mysqli_query($conn,$query4) or die("wrong query5");
						header("location:returnnotification.php?");
					}
					else
					{
						$query6="select quantity,offer from order_summary,product where order_summary.o_id=$o_id and order_summary.p_id=$p_id and product.p_id=$p_id";
						$result6=mysqli_query($conn,$query6) or die("wrong query6");
					$row6=mysqli_fetch_assoc($result6);
					$priced=$row6['quantity']*$row6['offer'];
					
					$query7="UPDATE order_master SET t_price='t_price-$priced' WHERE o_id=$o_id";
					mysqli_query($conn,$query7) or die("wrong query7");
						header("location:returnnotification.php?$priced");
					}
			}
			else
			{
				$query8="delete from order_summary,order_master where order_summary.o_id=$o_id and order_master.o_id=$o_id ";
				mysqli_query($conn,$query8) or die("wrong query8");
				header("location:returnnotification.php?");
			}
		}
		}
		else
		 if(isset($_GET['t']))
			{
		$q="update return_item set apv='reject' where re_id=$re_id";
		$res=mysqli_query($conn,$q) or die("wrong query");
		header("location:returnnotification.php");
			}
}
?>