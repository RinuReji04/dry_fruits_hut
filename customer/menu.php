<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>menu</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
	<nav>
	<form method="get" action="categoryproduct.php">
			<div>
					<?php
			session_start();
			require('dbconnect.php');
			if(isset($_SESSION['c_id']))
			{
				?><a href="logout.php">logout</a>
				<?php
			}
			else
			{
				?>
				<a href="login.php">login</a>||<a href="registration.php">signup</a><br>
			<?php
			}
			?>
			<select name="id" >
					<?php
									
						require('dbconnect.php');									
			
							$query="select * from category ";
			
							$res=mysqli_query($conn,$query);
											
						while($row=mysqli_fetch_assoc($res))
											
							{
								echo "<option value='".$row['ca_id']."'>".$row['ca_name'];												
											
							}
						?>
						<input type="submit"  value="search">
			
			</div>
			</select>
			</div>
			</form>

				<label class="logo">Dry Fruits Cart</label>
		<ul>
			<li><a href="aboutus.php">about us</a></li>
			<li><a href="home.php">home</a></li>
			<li><a href="vieworder.php">my order</a></li>
			<li><a href="viewcart1.php">my cart</a></li>
			<!--<li><a href="#">notification</a>
			<ul>
					<li><a href="#">review</a></li><br>
					<li><a href="#">return</a></li><br>
				</ul>
			</li>-->
			<li><a href="search.php">search</a></li>
		</ul>
	
	</nav>
</body>
</html>
