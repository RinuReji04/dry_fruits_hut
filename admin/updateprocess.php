<?php
session_start();
require('dbconnect.php');
$itid=$_SESSION['itid'];

	if(!empty($_POST))
	{	
			$itname=$_POST['p_name'];
			$itdisc=$_POST['disc'];
			$itprice=$_POST['itprice'];
			$img=$_POST['image1'];
			$query="UPDATE product SET p_name='$itname',disc='$itdisc',price='$itprice' WHERE p_id='$itid'";
						
			mysqli_query($conn,$query) or die($query."Can't Connect to Query...");		
			header("location:productdetails.php");
		}
			if(!empty($_POST['image1']))
			{
				$query="UPDATE product SET p_img='$img'WHERE p_id='$itid'";
				mysqli_query($conn,$query) or die($query."Can't Connect to Query...");	
				header("location:productdetails.php");				
			}

?>    