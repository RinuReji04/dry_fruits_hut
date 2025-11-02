<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>menu</title>
<?php
require("menu.php");
?>
<link rel="stylesheet" href="style3.css">
<?php
	//session_start();
	require('dbconnect.php');
	?>
</head>
<body>
<br><br><center><table cellspacing="20">
	<?php
		$q="select * from category where available='1'";
			$res=mysqli_query($conn,$q) or die("wrong query");
			$count=0;
			while($row=mysqli_fetch_assoc($res))
			{
				if($count==0)
				{
					echo"<tr>";
				}
				echo "<td>
			<a href=categoryproduct.php?id=".$row['ca_id']."> <img src=img/".$row['ca_img']." width=200 height=200> 

			</a><br>
			<a href=categoryproduct.php?id='".$row['ca_id']."'>".$row['ca_name']."</a>
			</td>";
			$count++;
			if($count==3)
			{
				echo"</tr>";
				$count++;
			}
		}
		?>
	</table>
		</center>
		</body>
		</html>