<?php
require("menu.php");
include 'dbconnect.php';
if(!empty($_GET['o_id']) && !empty($_GET['status']))
	{
$o_id=$_GET['o_id'];
$status=$_GET['status'];
echo "$o_id $status";
$q="UPDATE order_master SET status='$status' WHERE o_id='$o_id'";
$res=mysqli_query($conn,$q) or die("wrong query");
if($status=='delivered')
{
	$q1="select * from order_master,cartmaster,cartdetail where order_master.o_id=$o_id and cartmaster.c_id=order_master.c_id and cartmaster.cart_id=cartdetail.cart_id";
	$result=mysqli_query($conn,$q1) or die("wrong q1");
	while($row=mysqli_fetch_assoc($result))
	{
	$query="delete from cartdetail where cart_id=$row[cart_id]";
	mysqli_query($conn,$query) or die("wrong query");
	}
}
header("location:orderdetails.php?");	
}
?>