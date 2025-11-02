<?php
session_start();
require('dbconnect.php');
if(!empty($_GET['ca_id']))
{
	$delfd=$_GET['ca_id'];//get pid from productaction
	$query="UPDATE category SET available='1' WHERE ca_id='$delfd'";//set status=yes
	mysqli_query($conn,$query) or die("can't execute");
	header("location:categorydetails.php");
}
?>