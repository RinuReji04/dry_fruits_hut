<?php
session_start();
require('dbconnect.php');
$itid=$_SESSION['itid'];

	if(!empty($_POST))
	{	
			$itname=$_POST['ca_name'];
		
			$img=$_POST['image1'];
			$query="UPDATE category SET ca_name='$itname' WHERE ca_id='$itid'";
						
			mysqli_query($conn,$query) or die($query."Can't Connect to Query...");		
			header("location:categorydetails.php");
		}
			if(!empty($_POST['image1']))
			{
				$query="UPDATE category SET ca_img='$img'WHERE ca_id='$itid'";
				mysqli_query($conn,$query) or die($query."Can't Connect to Query...");	
				header("location:categorydetails.php");				
			}

?>    