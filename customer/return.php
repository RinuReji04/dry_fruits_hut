<?php
require('menu.php');
require('dbconnect.php');
	if(isset($_GET['p_id'])&&($_GET['oid']))
		{
		 $pid=$_GET['p_id'];
		 $oid=$_GET['oid'];
		 $q="select * from return_item ";
		 $res=mysqli_query($conn,$q) or die("wrong query");
		 $row=mysqli_fetch_assoc($res);
		 	echo"$pid";
		 	if($row['o_id']==$oid && $row['p_id']==$pid)
		 	{
		 		echo"you already send th request";
		 		header("location:vieworder.php?o");
		 	}
			else{		
		 			$query="insert into return_item(o_id,p_id)values($oid,$pid)";
		 			mysqli_query($conn,$query) or die("wrong query");
		 			echo "please wait for confirmation from admin side";
		 		}
		}

?>
