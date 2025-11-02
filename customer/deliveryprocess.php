<?php
			require('menu.php');
	if(isset($_SESSION['c_id']))
		{
		 $c_id=$_SESSION['c_id'];

$query2="select s_id from shipping where c_id='$c_id'";
	$res=mysqli_query($conn,$query2) or die($query2."cant connect to query2");
	$row=mysqli_fetch_assoc($res);
	$s_id=$row['s_id'];
$q3="select max(o_id) as o_id from order_master where  c_id='$c_id'";
$res=mysqli_query($conn,$q3) or die($q1."cant connect to query3");
$row1=mysqli_fetch_assoc($res);
$o_id=$row1['o_id'];


		$q3="insert into delivery(o_id,s_id)values('$o_id','$s_id')";
	$res=mysqli_query($conn,$q3) or die($q3."cant connect to query3");
	echo"deliver the item with in one week";
}
	?>