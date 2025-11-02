<?php
			require('menu.php');
	if(isset($_GET['item']))
		{
		 $itname=$_GET['item'];
		 $query="select p_id from product where p_name='$itname'";
		 $res=mysqli_query($conn,$query) or die("wrong query");
		 if($row=mysqli_fetch_assoc($res)==0)
		 {
		 	header("location:search.php?user=1");	
		 }
		 else
		 {
		 	 $query="select p_id from product where p_name='$itname'";
		 $res=mysqli_query($conn,$query) or die("wrong query");
		 $row=mysqli_fetch_assoc($res);
		header("location:product.php?pid=$row[p_id]");	
		 }
		}
	?>
