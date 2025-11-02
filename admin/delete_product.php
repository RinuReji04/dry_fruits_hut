<?php
session_start();
require('dbconnect.php');
if(!empty($_GET['p_id']))
{
	$delfd=$_GET['p_id'];
	//$query="delete from category where ca_id='$delfd'";
	$query="UPDATE product SET p_status='no' WHERE p_id='$delfd'";
	mysqli_query($conn,$query) or die("can't execute");
	header("location:productdetails.php");
}
?>