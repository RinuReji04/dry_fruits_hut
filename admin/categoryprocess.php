<?php
session_start();
require('dbconnect.php');
if(!empty($_POST))
{
	$cat=$_POST['txtcat'];
	$img=$_POST['txtimg'];
	$query="select ca_name from category WHERE ca_name='$cat'";
	$res=mysqli_query($conn,$query) or die("$query.wrong query");
	$row=mysqli_fetch_assoc($res);
		if(empty($row)) 
		{ 
			$q="insert into category(ca_name,ca_img)values('$cat','$img')";
			mysqli_query($conn,$q)or die("wrong query");
			header("location:category.php?added=1");
		}
		else
		{
			header("location:category.php?cat=1");
		}

}
else
{
	header("location:category.php?not=1");
}
?>