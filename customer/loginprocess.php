<?php
	session_start();
	require('dbconnect.php');
	if(!empty($_POST))
	{
			$username=$_POST['username'];
			$q="select * from customer_registration where c_user_name='$username'";
			$res=mysqli_query($conn,$q) or die("wrong query");
			$row=mysqli_fetch_assoc($res);
			if(!empty($row))
			{
					if($_POST['password']!=$row['c_password'])
					{
						header("location:login.php?pwd=1");
					}
					else
					{
						header('location:menu.php');
					}
			}
			else
			{
				header("location:login.php?usr=1");
			}
	}
?>