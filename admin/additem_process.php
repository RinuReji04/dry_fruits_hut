<?php
session_start();
require('dbconnect.php');

	if(!empty($_POST))
	{
			$cat=$_POST['cat'];
			$itname=$_POST['p_name'];
			$itdisc=$_POST['disc'];
			$itprice=$_POST['price'];
			$itoprice=$_POST['offer'];
			$img=$_POST['txtimg'];
			
			$itmnf=$_POST['mnfdate'];
			$itexp=$_POST['expdate'];
			$itquantity=$_POST['quantity'];
			
			$query="select p_id from product where p_name='$itname'";
			$res=mysqli_query($conn,$query) or die("$query.wrong query");
			$row=mysqli_fetch_assoc($res);
			if(empty($row))
			{
			$query1="insert into product(p_name,p_img,price,disc,offer,ca_id)values
			('$itname','$img','$itprice','$itdisc','$itoprice','$cat')";
			mysqli_query($conn,$query1) or die($query1."can't connect to query1");
			
			
			$query2="select p_id from product where p_name='$itname'";
			$res=mysqli_query($conn,$query2) or die("$query2.wrong query");
			$row=mysqli_fetch_assoc($res);
			$productid=$row['p_id'];
			

			$query3="insert into product_details(p_id,mnf_date,exp_date,quantity)values
			('$productid','$itmnf','$itexp','$itquantity')";


			mysqli_query($conn,$query3) or die($query."Can't Connect to Query...");

			header("location:product.php?yes=1");	

			}
			else
			{
					$query2="select p_id from product where p_name='$itname'";
			$res=mysqli_query($conn,$query2) or die("$query2.wrong query");
			$row=mysqli_fetch_assoc($res);
			$productid=$row['p_id'];
			

			$query3="insert into product_details(p_id,mnf_date,exp_date,quantity)values
			('$productid','$itmnf','$itexp','$itquantity')";
				
				mysqli_query($conn,$query3) or die($query."Can't Connect to Query...");

			header("location:product.php?yes=1");	
			}
	}

			else
			{
			header("location:product.php?no=1");	
			}	
?>    