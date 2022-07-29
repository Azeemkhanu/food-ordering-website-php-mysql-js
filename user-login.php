<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>User Login</title>
  </head>
  <body>
    <div class="admin-login">
      <h1>User Login</h1>
      <br>
      <?php
      echo "<br />";
      session_start();
      if (isset($_SESSION['user-login'])) {
        echo $_SESSION['user-login'];    //Displaying Session Message Add
        unset($_SESSION['user-login']);  //Removing Session Message Add
      }

       ?>
       <br><br>

      <!-- login form starts here -->
      <form class="" action="" method="post">
        <label for="">Enter Username : </label>
        <input class="input-fields" type="text" name="username"  placeholder="Enter Username" required>
        <br><br>

        <label for="">Enter Password : </label>
        <input class="input-fields" type="password" name="password"  placeholder="Enter Password" required>
        <br><br>

        <input type="submit" name="submit" value=" User Login" class="btn btn-green">
         <br><br>
      </form>
      <!-- login form ends here -->


      <p>Created by -AzeemKhan</p>

    </div>
    <?php
    if (isset($_POST['submit'])) {

      //get user entered username which has to be check from Database
      $username=$_POST['username'];
      //get user entered username which has to be check from Database
      $password=md5($_POST['password']);

      //Writing Qurey to check user exists or not  from Database
      $sql="SELECT * FROM `user_table` WHERE `customer_name`='$username' AND `password`='$password'";
      // echo $sql;
      $result=$conn->query($sql);
      $count=$result->num_rows;
       echo $count;
       if ($count==1) {
         // Admin found in database
         session_start();
         $_SESSION['user-login']="User Login Successfully";
         header("location: index.php");

       }else {
         // Admin not found in database
         $_SESSION['user-login']="User Not Logged in Successfully";
         header("location: user-login.php");
       }
    }


     ?>

  </body>
</html>
