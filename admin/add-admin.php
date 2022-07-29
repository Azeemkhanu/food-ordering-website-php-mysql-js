<?php include("../includes/login-check-admin.php") ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Add Admin</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Add Admin</h1>
<br>
        <form class="" action="" method="post">
          <table class="table add-admin-table">
            <tr>
              <td>Full Name : </td>
              <td>
                <input type="text" name="full_name" placeholder="Enter Your Full Name" >
              </td>
            </tr>

            <tr>
              <td>Username : </td>
              <td>
                <input type="text" name="username" placeholder="Enter Your Username" >
              </td>
            </tr>

            <tr>
              <td>Password : </td>
              <td>
                <input type="password" name="password" placeholder="Enter Your password" >
              </td>
            </tr>

            <tr>
              <td>
                <input type="submit" name="submit" value="Add Admin" class="btn btn-green">
              </td>
            </tr>
          </table>
        </form>

      </div>

    </section>


    <?php
    //connecting database
    include("../includes/config.php");
    //process the value from Form and Save it in the Database

    //first we check whether the submit button is clicked or not?
    if (isset($_POST['submit'])) {
      //get the data from form
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      $password=md5($_POST['password']);//password encryptd using md5
    //  echo $full_name;          for checking

    //SQL Query to save data in the database
     $sql="INSERT INTO `admin_table` (`full_name`, `username`, `password`) VALUES ('$full_name',' $username', '$password')";

     //Executing Query and Saving data in the database
     $result=$conn->query($sql);

     //Checking (query is executed) data is inserted or not
     if ($result==true) {
       // echo "Data inserted successfully";
       session_start();
       $_SESSION['add']="Admin Added Successfully";
       header("location: manage-admin.php");
     }else{
       $_SESSION['add']="Failed to Add Admin...Try Again";
       header("location: manage-admin.php");
     }

    }


     ?>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
