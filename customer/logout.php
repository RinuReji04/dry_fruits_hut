 <?php
 session_start();
 unset($_SESSION['c_user_name']);
 session_destroy();
 header('Location:login.php');
 exit;
 ?>