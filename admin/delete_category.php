<?php
session_start();
require('dbconnect.php');
if(!empty($_GET['ca_id']))
{
	$delfd=$_GET['ca_id'];
	//$query="delete from category where ca_id='$delfd'";
	$query="UPDATE category SET available='0' WHERE ca_id='$delfd'";
	mysqli_query($conn,$query) or die("can't execute");
	header("location:categorydetails.php");
}
?>