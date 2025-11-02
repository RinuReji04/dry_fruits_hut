<?php
			require('menu.php');
	if(isset($_SESSION['c_id']))
		{
		 $c_id=$_SESSION['c_id'];
		 	$firstname=$_POST['s_fname'];
	$lastname=$_POST['s_lname'];
	$hno=$_POST['h_no'];
	$city=$_POST['city'];
	$pin=$_POST['pin_code'];
	$lmark=$_POST['l_mark'];
	$phno=$_POST['ph_no'];
	$query1="insert into shipping(c_id,r_fname,r_lname,h_no,city,pin_code,l_mark,r_ph_no)values('$c_id','$firstname','$lastname','$hno','$city','$pin','$lmark','$phno')";
	mysqli_query($conn,$query1) or die($query1."can't connect to query1");
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