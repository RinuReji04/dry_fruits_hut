<?php
 session_start();
require('dbconnect.php');

//del a item
if(isset($_GET['caid']) and isset($_GET['q']) and isset($_GET['pid']))
	{
		
		$cart_id=$_GET['caid'];
		$quantity=$_GET['q'];
		$p_id=$_GET['pid'];
		$q="delete from cartdetail where cart_id='$cart_id' and quantity='$quantity' and p_id='$p_id'";
		$res=mysqli_query($conn,$q) or die("wrong query");
		header("location: viewcart1.php");
		
	}
?>