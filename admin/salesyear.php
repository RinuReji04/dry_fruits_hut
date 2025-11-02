<html>
<?php
require("menu.php");
require('dbconnect.php');
?>
<head>
	<meta charset="UTF-8">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
table,th,td {
    border: 1px solid #fff;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 15%;
}
th,td {
    padding: 6 px;
    text-align: center;
    text-color: violet;
}
#fb tr:nth-child(even){background-color: #f2f2f2;}

#fb tr:hover {background-color: #ddd;}

th {
  background-color: black;
  color: white;
 }
 .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
 

</style>
</head>

<body bgcolor="grey" >
    <form >
        
            
        <br>
                        
                     <table style="width:100%" id="fb">
                        <caption align="center">
                         <div class="title">AVAILABLE YEAR</div>
                       </caption>
                       <?php
                       $query="select distinct year(date)as yr from order_master where status='delivered'";
                       $result =mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            
    ?>
    <tr><td><a href="salesreport.php?yr=<?php echo $row['yr'];?>"><?php echo $row['yr']?></a></td></tr>
  <?php 
   }
    ?>
                     </table>
                   </form>

</body>
</html>