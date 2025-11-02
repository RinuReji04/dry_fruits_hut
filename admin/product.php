<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style4.css">
</head>
<?php
require("menu.php");
?>
<body>
	<div class="bgimage"></div>
		<form align="center" action="additem_process.php" method="post" class="container">
			<table align="center" cellpadding="10" cellspacing="10">
					<caption>PRODUCT</caption>
				<tr>
					<td>product name</td><td><input type="text" name=p_name onkeyup="this.value=this.value.toUpperCase()"></td>
			
					<td>PHOTO</td><td><input type="file" size="30" maxlength="30" name="txtimg"></td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
					<td>category</td><td>
								<select name="cat" >
						<?php
									
						require('dbconnect.php');									
			
							$query="select * from category ";
			
							$res=mysqli_query($conn,$query);
											
						while($row=mysqli_fetch_assoc($res))
											
							{
								echo "<option value='".$row['ca_id']."'>".$row['ca_name'];												
											
							}
						?>
					</td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
					<td>price</td><td><input type="text" name="price"></td>
				
					<td>OFFER PRICE</td><td><input type="text" name="offer"></td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
					<tr>
					<td>MANUFACTURING DATE</td><td><input type="DATE" name="mnfdate"></td>
					<td>EXPIRY DATE</td><td><input type="DATE" name="expdate"></td>
				</tr>
				
				<tr><td>&nbsp;<br></td></tr>
					<tr>
					<td>QUANTITY</td><td><input type="text" name="quantity"></td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
		 			<td>Description</td><td><input type="text" name="disc"></td>
				</tr>
				<tr><td>&nbsp;<br></td></tr>
				<tr>
					<td><input type="submit" value="submit"></td>
					<td><input type="reset" value="reset"></td>
				</tr>
				<?php


if(isset($_GET['yes']))
	{

echo '<th><i><b><font  color="indigo" size="4">added successfully.....</font></th>';
			echo '<br><br>';
}
if(isset($_GET['no']))
	{
echo '<th><font color="indigo" size="4">please fill up.....</font></th>';
			echo '<br><br>';
        


}
?>

			</table>
		</form>
	</body>
	</html>
