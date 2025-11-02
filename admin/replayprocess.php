<?php
session_start();
require('dbconnect.php');
   
   if(isset($_GET['id']))
   {
	if(!empty($_POST))
	{
			$id=$_GET['id'];
			$g=$_POST['replay'];
		     $query="insert into replay(feedback_id,r_message)values('$id','$g')";
			mysqli_query($conn,$query) or die($query."Can't Connect to Query...");
			header("location:replay.php?yes=1");
			}
			else
			{
			header("location:replay.php?no=1");	
			}
	}
?>    