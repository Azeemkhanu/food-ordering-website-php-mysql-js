<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>User Registration</title>
  </head>
  <body>


    <section class="user-registration">
      <h1>User Registration</h1>

      <?php
      if (isset($_SESSION['user-reg'])) {
        echo $_SESSION['user-reg'];    //Displaying Session User Registered  not
        unset($_SESSION['user-reg']);  //Removing Session User Registered  not
      }

       ?>

      <form class="" action="" method="post">
        <label>Full Name : </label>
        <input class="input-fields" type="text" name="full_name" placeholder="E.g. Azeem khan" class="input-responsive" required>
<br><br>
        <label>Phone Number : </label>
        <input class="input-fields" type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
<br><br>
        <label>Email : </label>
        <input class="input-fields" type="email" name="email" placeholder="E.g. ak@gmail.com" class="input-responsive" required>

<br><br>
        <label>Address : </label>
        <textarea class="textArea"  name="address" rows="5" cols="30" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
<br><br>
      <label>Password : </label>
      <input class="input-fields" type="password" name="password" placeholder="Enter Your password" >
<br><br>
        <input type="submit" name="submit" value="Register" class="btn btn-green">

      </form>

      <?php
      if (isset($_POST['submit']))
      {
        $full_name=$_POST['full_name'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $password=md5($_POST['password']);

        $sql2="INSERT INTO `user_table` (`customer_name`, `customer_contact`, `customer_email`, `customer_address`,`password`) VALUES ('$full_name', '$contact', '$email', '$address','$password')";
        $result2=$conn->query($sql2);
        if ($result2==true){
          session_start();
          $_SESSION['user-reg']="User Registered Successfully";
          header("location: index.php");
        }else{
          $_SESSION['user-reg']="User Failed To Registered";
          header("location: user-registration.php");
        }
      }


       ?>

    </section>



  </body>
</html>
