<?php
	session_start();
	require('dbconnect.php');
	if(!empty($_POST))
	{
	$firstname=$_POST['c_fname'];
	$lastname=$_POST['c_lname'];
	$phonenumber=$_POST['ph_no'];
	$email=$_POST['email'];
	$username=$_POST['user_name'];
	$password=$_POST['password'];
				$query="select c_user_name from customer_registration where c_user_name='$username'";
			$res=mysqli_query($conn,$query) or die("$query.wrong query");
			$row=mysqli_fetch_assoc($res);
			if(empty($row))
			{
			$query1="insert into customer_registration (c_fname,c_lname,ph_no,email,c_user_name,c_password) values ('$firstname','$lastname','$phonenumber','$email','$username','$password')
			";
			mysqli_query($conn,$query1) or die($query1."can't connect to query1");

			header("location:login.php?");	
			}
			else
			{
				header("location:registration.php?user=1");	
			}
		}
		else
		{
			header("location:product.php?no=1");	

		}
?>