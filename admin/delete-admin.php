<?php include("../includes/login-check-admin.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Delete Admin</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Delete Admin</h1>

        <?php
         include("../includes/config.php");
        //Get the admin id which we are going to delete
        echo $id=$_GET['id'];
        //Writing Qurey to delete data from Database
        $sql="DELETE FROM `admin_table` WHERE `admin_table`.`id` = $id";
        //Executing Query to delete data from Database
        $result=$conn->query($sql);
        //Checking whether query is executed or not
        if($result==true){
          //query is executed...Admin is deleted
          session_start();
          $_SESSION['delete']="Admin data is deleted Successfully...";
          header("location: manage-admin.php");

        }else{
          //query is not executed
          $_SESSION['delete']="Failed to Delete Admin data...";
          header("location: manage-admin.php");
        }
         ?>

      </div>
    </section>




    <?php include("../includes/footer.php") ?>

  </body>
</html>
