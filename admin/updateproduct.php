<!DOCTYPE html>
<html>
<head>
	
</head>
<?php
require('menu.php');
?>
<body>
<form action="updateprocess.php" method="POST" class="container">
<h1><center>Update products</center></h1><br>
<table align=center cellspacing="10" cellpadding="10">
	<?php
	session_start();
	require('dbconnect.php');
	if(!empty($_GET['p_id']))
	{
		$itid=$_GET['p_id'];
		$_SESSION=array();
		$_SESSION['itid']=$itid;
		$query="select * from product where p_id='$itid'";
				$res=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($res);
				$cat=$row['ca_id'];
				
				echo"<tr><td>ITEM NAME :</td>
				<td><input type='text' size='30' maxlength='30' name='p_name' required onkeyup='this.value=this.value.toUpperCase()' value=".$row['p_name']."></td></tr>";
					
				echo"<tr><td>PRICE:</td>
		            <td><input type='text'name='itprice'size='30'required value=".$row['price']."></td></tr>";
		            echo"<tr><td>DISCRIPTION:</td>
		            <td><input type='text'name='disc'size='30'required value=".$row['disc']."></td></tr>";
					
					echo"<tr><td>IMAGE:</td>
		            <td><img src='img/". $row['p_img']."'width='100'></td>
		            <td>NEW IMAGE:</td>
		            <td><input type='file' name='image1' ></td>
		            </tr>";
					echo "<tr><td colspan=2 align=center>
					<input  type='submit' value='SAVE CHANGES'></td></tr>";
			}
		?>	
	
</table>
</form>
</body>
</html>