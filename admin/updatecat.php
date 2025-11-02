<!DOCTYPE html>
<html>
<head>
	
</head>
<?php
require('menu.php');
?>
<body>
<form action="updatecatprocess.php" method="POST" class="container">
<h1><center>Update category</center></h1><br>
<table align=center cellspacing="10" cellpadding="10">
	<?php
	session_start();
	require('dbconnect.php');
	if(!empty($_GET['ca_id']))
	{
		$itid=$_GET['ca_id'];
		$_SESSION=array();
		$_SESSION['itid']=$itid;
		$query="select * from category where ca_id='$itid'";
				$res=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($res);
				$cat=$row['ca_name'];
				
				echo"<tr><td> NAME :</td>
				<td><input type='text' size='30' maxlength='30' name='ca_name' required onkeyup='this.value=this.value.toUpperCase()' value=".$row['ca_name']."></td></tr>";
					
			
					
					echo"<tr><td>IMAGE:</td>
		            <td><img src='img/". $row['ca_img']."'width='100'></td>
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