<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require('menu.php');
	if(isset($_GET['feedback_id']))
		{
		 $id=$_GET['feedback_id'];
		}
?>
<body bgcolor="grey">
<div class="bg-img">        
<form  align="center" action="replayprocess.php?id=<?php echo $id?>" method="POST">
  <center>
<table align="center" cellpadding="10" cellspacing="10">
<tr>     
<th colspan=2><h2>REPLAY</h2></th>
</tr>
<tr>
     <td><i><b><font color="indigo">REPLAY:</b>&nbsp;&nbsp;</td>
<td><input type='text' size="100" maxlength="500" name="replay"
 required></td></font></tr>

<tr><td align='center'>
<input type="submit" value="SEND"></td> 
<td><a href="feedback-1.php"><input type="button" value="BACK"></a></td>
</tr>
</form>
<?php
if(isset($_GET['yes']))
   {
        echo '<i><b><font color="indigo" size="4">replay successfully...</font>';
         echo '<br><br>';
   }
   if(isset($_GET['not']))
   {
        echo '<font color="indigo" size="4">Please full up...</font>';
         echo '<br><br>';
   }
?>
</div>
</center>
</body>
</html>