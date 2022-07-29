<?php include("../includes/login-check-admin.php") ?>
<?php     include("../includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Update Category</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Update Category</h1>
        <br>
        <?php
        if (isset($_SESSION['file-exist'])) {
              echo $_SESSION['file-exist'];    //Displaying Session Message File name already Exits while updating
              unset($_SESSION['file-exist']);  //Displaying Session Message File name already Exits while updating
            }
        //Get the admin id which we are going to delete
        //id is set or not
          $id=$_GET['id'];

          $sql="SELECT * FROM `category_table` WHERE `id` = '$id' ";

          $result=$conn->query($sql);
          $count=$result->num_rows;
echo $count;
          if ($count==1) {
            $row=$result->fetch_assoc();
            //Get individual data
            $id=$row['id'];
            $title=$row['title'];
            $image_name=$row['image_name'];
            $featured=$row['featured'];
            $active=$row['active'];

          }


        // echo $id;

         ?>

         <form class="" action="" method="post" enctype="multipart/form-data">
           <table class="table add-admin-table">
             <tr>
                 <td>Title: </td>
                 <td>
                   <input type="text" name="title" value="<?php echo $title; ?>" required>
                 </td>
             </tr>

             <tr>
                 <td>Current Image: </td>
                 <td>
                   <?php
                      $path="../graphics/category-images/".$image_name;
                    ?>
                  <img src="<?php echo $path; ?>" width="100px">
                 </td>
             </tr>

             <tr>
                 <td>New Image: </td>
                 <td>
                   <input type="file" name="image" required>
                 </td>
             </tr>

             <tr>
               <td>Featured : </td>
               <td>
                 <input type="radio" name="featured" value="Yes" required>Yes
                 <input type="radio" name="featured" value="No">No
               </td>
             </tr>

             <tr>
               <td>Active : </td>
               <td>
                 <input type="radio" name="active" value="Yes" required>Yes
                 <input type="radio" name="active" value="No" >No
               </td>
             </tr>

             <tr>
               <td colspan="2">
                 <input type="submit" name="submit" value="Update Category" class="btn btn-green">
               </td>
             </tr>
           </table>

         </form>


         <?php
         //Saving the Updated data in the database
         if (isset($_POST['submit'])) {

           $up_title=$_POST['title'];
           $up_featured=$_POST['featured'];
           $up_active=$_POST['active'];

           //accessing Image name, path
           $updt_name=$_FILES["image"]["name"];
           $source_path=$_FILES["image"]["tmp_name"];
           //adding destination path for image file to upload there
           $destination_path="../graphics/category-images/".$updt_name;
           //Storing the image file in Permanent Location
           //first checking whether the same file exit in destination path or not
           if (file_exists($destination_path)) {
             $_SESSION['file-exist']="File name already Exits...";
             header("location: update-category.php");
           }else {
             echo move_uploaded_file($source_path,$destination_path);//store image on Permanent address
             unlink($path);//remove previous image from Permanent Address
           }


           $sql2="UPDATE `category_table` SET `title` = '$up_title', `image_name` = '$updt_name', `featured` = '$up_featured', `active` = '$up_active' WHERE `category_table`.`id` = $id";
            $result2=$conn->query($sql2);
            //checking query executed or not
            if ($result2==true) {
              // query execute
              session_start();
              $_SESSION['category-updated']="Category Updated Successfully";
              header("location: manage-category.php");
            }else {
              // query not executed.
              $_SESSION['category-failed']="Failed to Update Category...try again";
              header("location: manage-category.php");
            }

         }

          ?>


      </div>
    </section>




    <?php include("../includes/footer.php") ?>

  </body>
</html>
