<?php include("../includes/login-check-admin.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Delete Category</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Delete Category</h1>

        <?php
         include("../includes/config.php");
        //Get the admin id and image name which we are going to delete
         $id=$_GET['id'];
         $image_name=$_GET['image_name'];

         //removing image from our permanent location storage
         $path="../graphics/category-images/".$image_name;
         echo "$path";
         $remove=unlink($path);//remove image
         echo $remove;

         if ($remove==false) {
           $_SESSION["remove-image"]="Failed to remove image from permanent location...";
           header("location: manage-category.php");
           die();
         }

        //Writing Qurey to delete data from Database
        $sql="DELETE FROM `category_table` WHERE `category_table`.`id` = $id";
        //Executing Query to delete data from Database
        $result=$conn->query($sql);
        //Checking whether query is executed or not
        if($result==true){
          //query is executed...Admin is deleted
          session_start();
          $_SESSION['delete-category']="Category data is deleted Successfully...";
          header("location: manage-category.php");

        }else{
          //query is not executed
          $_SESSION['delete-category']="Failed to Delete Category data...";
          header("location: manage-category.php");
        }
         ?>

      </div>
    </section>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
