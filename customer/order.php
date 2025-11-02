<html>
<?php
	require('menu.php');
?>
<body>
<h1 class="title">Shipping</h1>
<?php
$total=$_GET['t'];
$cart_id=$_GET['c'];
 $c_id=$_SESSION['c_id'];
 $date=date("y/m/d");
  $q3="select s_id from shipping where c_id='$c_id'";
			$res=mysqli_query($conn,$q3) or die($q3."can't connect to query3");
	$r=mysqli_fetch_assoc($res);
    $s_id=$r[s_id];

if(empty($r))
{

header("location:shipping.php");
}
else
{
	echo "<script type=text/javascript>
	if(confirm('do you want to deliver the item to previous adddress'))
	      window.location.href='viewshippingaddress.php';
	      else
	      window.location.href='shipping.php';

     
</script>";
}
	$q="insert into order_master(c_id,date,t_price) values('$c_id','$date','$total')";
	mysqli_query($conn,$q) or die($q."can't connect to q");
echo"$date";
$q1="select max(o_id) as o_id from order_master where date='$date' and c_id='$c_id'";
$res1=mysqli_query($conn,$q1) or die($q1."cant connect to query");
$row1=mysqli_fetch_assoc($res1);
$o_id=$row1['o_id'];
$q2="select p_id,quantity from cartdetail where cart_id='$cart_id'";
$res2=mysqli_query($conn,$q2) or die($q2."cant connect to query");
	while($row2=mysqli_fetch_assoc($res2))
{
	$p_id=$row2['p_id'];
	$quantity=$row2['quantity'];
	$query1="insert into order_summary (o_id,p_id,quantity)values('$o_id','$p_id','$quantity') ";
	mysqli_query($conn,$query1) or die($query1."wrong query1");
	$qs="select max(exp_date) as exp_date from  product_details where p_id='$p_id'";
		$r=mysqli_query($conn,$qs) or die($qs."wrong query1");
		      $rs1=mysqli_fetch_assoc($r);
		      $da=$rs1['exp_date'];
               
echo "$da";
$que="SELECT quantity from product_details where p_id='$p_id' and exp_date='$da'";

	$res=mysqli_query($conn,$que) or die($que."cant connect to query");
      $rs=mysqli_fetch_assoc($res);
      $q=$rs['quantity']-$quantity;

	$qu="update product_details set quantity='$q' where p_id='$p_id' and exp_date='$da'";

      $res3=mysqli_query($conn,$qu) or die($qu."cant connect to query");

}  
	?>
</body>
</html>
	