<?php include("../includes/login-check-admin.php") ?>
<?php     include("../includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Update Food</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Update Food</h1>
        <br>
        <?php
        if (isset($_SESSION['food-img-exist'])) {
         echo $_SESSION['food-img-exist'];    //Displaying Session Message food img exist cant update
         unset($_SESSION['food-img-exist']);  //Removing Session Message  food img exist cant update
         }

        //Get the admin id which we are going to delete
        //id is set or not
          $id=$_GET['id'];

          $sql="SELECT * FROM `food_table` WHERE id=$id ";
          $result=$conn->query($sql);
          $count=$result->num_rows;

          if ($count==1) {
            $row=$result->fetch_assoc();
            //Get individual data
            $title=$row['title'];
            $image_name=$row['image_name'];
            $featured=$row['featured'];
            $active=$row['active'];

          }else {
            $_SESSION['no-food-found']="Food data not Found...";
            header("location: manage-food.php");
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
                 <td>Description: </td>
                 <td>
                   <input type="text" name="description" placeholder="Enter Text For Food" required>
                 </td>
             </tr>

             <tr>
               <td>Price : </td>
               <td>
                 <input type="number" name="price" placeholder="Enter Price for Food" required>
               </td>
             </tr>

             <tr>
                 <td>Current Image: </td>
                 <td>
                   <?php
                      $path="../graphics/food-images/".$image_name;//old img which is not updated yet
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
               <td>Category : </td>
               <td>
                 <?php
                 $sql="SELECT * FROM `category_table` WHERE `active`='YES' ";
                 $result2=$conn->query($sql);
                 $count=$result2->num_rows;

                  ?>
                 <select name="category">
                   <?php
                   if ($count>0) {
                     while ($row=$result2->fetch_assoc()) {
                       $ids=$row['id'];
                       $title=$row['title'];
                    ?>

                   <option value="<?php echo $ids ; ?>"><?php echo $title; ?></option>
                   <?php
                         }
                       }else {
                         echo "No Category Found";
                       }
                    ?>
                 </select>
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
           $up_description=$_POST['description'];
           $up_price=$_POST['price'];
           $up_category=$_POST['category'];
           $up_featured=$_POST['featured'];
           $up_active=$_POST['active'];

           //accessing Image name, path
           $updt_name=$_FILES["image"]["name"];
           $source_path=$_FILES["image"]["tmp_name"];
           //adding destination path for image file to upload there
           $destination_path="../graphics/food-images/".$updt_name;
           //Storing the image file in Permanent Location
           //first checking whether the same file exit in destination path or not
           if (file_exists($destination_path)) {
             $_SESSION['food-img-exist']="File name already Exits...";
             header("location: update-food.php");
             die();
           }else {
             echo move_uploaded_file($source_path,$destination_path);//store image on Permanent address
             unlink($path);//remove previous image from Permanent Address
           }


           $sql2="UPDATE `food_table` SET
            `title` = '$up_title',
            `description` = '$up_description',
             `price` = '$up_price',
             `image_name`='$updt_name',
              `category_id` = '$up_category',
               `featured` = '$up_featured',
                `active` = '$up_active'
                WHERE `id` = $id";
            $result2=$conn->query($sql2);
            //checking query executed or not
            if ($result2==true) {
              // query execute
              session_start();
              $_SESSION['food-updated']="Food Updated Successfully";
              header("location: manage-food.php");
            }else {
              // query not executed.
              $_SESSION['food-updated']="Failed to Update Food Data...try again";
              header("location: manage-food.php");
            }

         }

          ?>


      </div>
    </section>




    <?php include("../includes/footer.php") ?>

  </body>
</html>
