<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin-Login</title>
  </head>
  <body>

    <div class="admin-login">
      <h1>Admin Login</h1>
      <?php
      echo "<br />";
      session_start();
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];    //Displaying Session Message Add
        unset($_SESSION['login']);  //Removing Session Message Add


        if (isset($_SESSION['not-logged-in'])) {
          echo $_SESSION['not-logged-in'];    //Displaying Session Message Add
          unset($_SESSION['not-logged-in']);
        } //Removing Session Message Add
      }

       ?>
       <br>

      <!-- login form starts here -->
      <form class="" action="" method="post">
        <label for="">Enter Username : </label>
        <input class="input-fields" type="text" name="username"  placeholder="Enter Username" required>
        <br><br>

        <label for="">Enter Password : </label>
        <input class="input-fields" type="password" name="password"  placeholder="Enter Password" required>
        <br><br>

        <input type="submit" name="submit" value="Login" class="btn btn-green">
         <br><br>
      </form>
      <!-- login form ends here -->


      <p>Created by -AzeemKhan</p>

    </div>

  </body>
</html>

<?php
include("../includes/config.php");
if (isset($_POST['submit'])) {

  //get user entered username which has to be check from Database
  $username=$_POST['username'];
  //get user entered username which has to be check from Database
  $password=md5($_POST['password']);

  //Writing Qurey to check user exists or not  from Database
  $sql="SELECT * FROM `admin_table` WHERE `username`=' $username' AND `password`='$password'";
  // echo $sql;
  $result=$conn->query($sql);
  $count=$result->num_rows;
  // echo $count;
   if ($count==1) {
     // Admin found in database
     session_start();
     $_SESSION['login']="Admin Login Successfully";
     $_SESSION['user']="$username"; //To check whether admin is login or not and logout will unset it

     header("location: admin-home.php");

   }else {
     // Admin not found in database
     $_SESSION['login']=false;
     header("location: admin-Login.php");
   }
}


 ?>
