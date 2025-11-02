<?php
session_start();
require('dbconnect.php');
if(!empty($_GET['p_id']))
{
	$delfd=$_GET['p_id'];//get pid from productaction
	$query="UPDATE product SET p_status='yes' WHERE p_id='$delfd'";//set status=yes
	mysqli_query($conn,$query) or die("can't execute");
	header("location:productdetails.php");
}
?>