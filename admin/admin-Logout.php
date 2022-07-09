<?php
//Destroy session
session_unset();//unset session for admin login 
session_destroy();
//redirect to login page
header("location: admin-Login.php");

 ?>
