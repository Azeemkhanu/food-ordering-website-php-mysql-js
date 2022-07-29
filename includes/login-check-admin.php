<?php

//if user session is not set it means admin has to login first
session_start();
if (!isset( $_SESSION['user'])) {
  //admin is not logged in
  $_SESSION['not-logged-in']="Please login first to access admin Panel";
  //redirect to login page for admin login
  header("location: admin-Login.php");

}

 ?>
