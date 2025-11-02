
<?php
	require('menu.php');
		print_r($_SESSION);

	?>
	
<html>
<body>
<form action="deliveryprocess.php" method="GET">
<h1><center>VIEW SHIPPING ADDRESS</center></h1><br>
<table align=center cellspacing="10" cellpadding="10">

	<?php	
	require('dbconnect.php');
	if(isset($_SESSION['c_id']))
		{
		 $c_id=$_SESSION['c_id'];
    $query="select * from shipping where c_id='$c_id'";
				$res=mysqli_query($conn,$query) or die($query."cant connect to query");
				$row=mysqli_fetch_assoc($res);			

				echo"<tr><td>ITEM NAME :</td>
				<td><input type='text' size='30' maxlength='30' name='itname' required onkeyup='this.value=this.value.toUpperCase()' value=".$row['r_fname']."></td></tr>";
				;
					
				echo"<tr><td>RECEIVER LAST NAME:</td>
		            <td><input type='text'name='r_lastname'size='30'required value=".$row['r_lname']."></td></tr>";

		            echo"<tr><td>HOUSE  NO:</td>
		            <td><input type='text'name='h_no'size='30'required value=".$row['h_no']."></td></tr>";
					
					echo"<tr><td>CITY:</td>
		            <td><input type='text' name=city size=30 requred value=". $row['city']."></td></tr>";

		            echo"<tr><td>PINCODE</td>
		            <td><input type='text'name='pin_code'size='6'required value=".$row['pin_code']."></td></tr>";

		            echo"<tr><td>LAND MARK:</td>
		            <td><input type='text'name='l_mark'size='30'required value=".$row['l_mark']."></td></tr>";

		            echo"<tr><td>PHONE NUMBER:</td>
		            <td><input type='text'name='r_ph_no'size='30'required value=".$row['r_ph_no']."></td></tr>";
					
					
					
					echo "<tr><td colspan=2 align=center>
					<input  type='submit' value='CONFIRM'></td></tr>";
			}
		?>	
	</table>
	</form>
    </body>
    </html>

