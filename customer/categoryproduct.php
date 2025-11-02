<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>menu</title>
<?php
require("menu.php");
?>
<link rel="stylesheet" href="style3.css">

</head>
<body>
<br><br><center><table cellspacing="20">

	<?php
	if(!empty($_GET['id']))
	{
	   $id=$_GET['id'];
		$q="select * from product where p_status='yes'and ca_id='$id'";//view product in ca_id category
		$res=mysqli_query($conn,$q) or die("wrong query");
		$count=0;
			while($row=mysqli_fetch_assoc($res))
			{
				if($count==0)
				{
					echo"<tr>";
				}
				echo "<td><a href=product.php?pid=$row[p_id]>"
				?>
			<img src="img/<?php echo $row['p_img'] ?>" width="400" height="400"><br>
			<?php echo $row['p_name']?><br>
			<?php echo $row['price']?><br>
			<?php echo $row['disc']?><br>
			
			<?php
			echo"</a></td>";
			$count++;
			if($count==2)
			{
				echo"</tr>";
				$count++;
			}
		}
	}
		?>
	</table>
		</center>
		</body>
		</html>