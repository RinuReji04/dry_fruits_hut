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
<center>
<form action="productprocess.php" class="cotainer" method="get">

<?php

require('dbconnect.php');
	if(!empty($_GET['pid']))
	{
	   $id=$_GET['pid'];
	   
		$q="select * from product where p_id=$id";
		$res=mysqli_query($conn,$q) or die("wrong query");
		while($row=mysqli_fetch_assoc($res))
			{
				?>
				<img src="img/<?php echo $row['p_img'] ?>" width="300" height="300"><br>
			<?php echo $row['p_name']?><br>
			<?php echo "PRICE:  "; echo $row['price']?><br>
			<?php if($row['offer']!=0)
					{
						echo "OFFER PRICE:  ";
						echo  $row['offer'];
					}
					else{
						{
						echo "OFFER PRICE:  ";
						echo  "NILL";
					} 
					} ?><br>
			<?php echo "DISCRIPTION:  ";echo $row['disc']?><br>
			QUANTITY<input type="text" name="quantity"><BR>
			<?php
 			if(isset($_SESSION['c_id']))
				{
					$p_id= $row['p_id'];
					$_SESSION['p_id']=$p_id;
		
					?>
					<input type="submit"  value="add to cart">
					<?php
				}
				else
				{
					echo"please login";

				}
			}
			
		}
	?>
	</form>
	</center>
	</body>
	</html>
