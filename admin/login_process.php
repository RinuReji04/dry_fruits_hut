<?php
	session_start();
	require('dbconnect.php');
	if(!empty($_POST))
	{
			$username=$_POST['username'];
			$q="select * from admin_login where user_name='$username'";
			$res=mysqli_query($conn,$q) or die("wrong query");
			$row=mysqli_fetch_assoc($res);
			if(!empty($row))
			{
					if($_POST['password']!=$row['password'])
					{
						header("location:adminlogin.php?pwd=1");
					}
					else
					{
						$_SESSION=array();
						$_SESSION['username']=$row['user_name'];
						header('location:home.php');
					}
			}
			else
			{
				header("location:adminlogin.php?usr=1");
			}
	}
?>