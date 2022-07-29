<?php include("../includes/login-check-admin.php") ?>
<?php include("../includes/config.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Manage Category</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Manage Category</h1>
        <br>
        <?php
         if (isset($_SESSION['delete-category'])) {
          echo $_SESSION['delete-category'];    //Displaying Session Message delete category
          unset($_SESSION['delete-category']);  //Removing Session Message delete category
          }

         if (isset($_SESSION['add-category'])) {
           echo $_SESSION['add-category'];    //Displaying Session Message Add category
           unset($_SESSION['add-category']);  //Removing Session Message Add category
           }

         if (isset($_SESSION['remove-image'])) {
            echo $_SESSION['remove-image'];    //Displaying Session Message remove image failure
            unset($_SESSION['remove-image']);  //Removing Session Message remove image failure
            }

         if (isset($_SESSION['no-category-found'])) {
             echo $_SESSION['no-category-found'];    //Displaying Session Message no category found while updating
             unset($_SESSION['no-category-found']);  //Displaying Session Message no category found while updating
             }
        
         if (isset($_SESSION['category-updated'])) {
               echo $_SESSION['category-updated'];    //Displaying Session Message Category Updated Successfully
               unset($_SESSION['category-updated']);  //Displaying Session Message Category Updated Successfully
             }
         if (isset($_SESSION['category-failed'])) {
               echo $_SESSION['category-failed'];    //Displaying Session Message Failed to Update Category
               unset($_SESSION['category-failed']);  //Displaying Session Failed to Update Category
             }

         ?>
         <br><br>
        <a href="add-category.php"><input type="submit" name="add-catg" value="Add Category" class="btn btn-blue"></a>

        <table class="table">
          <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image Name</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>

          <?php
          //Query to get admin_table database
          $sql="SELECT * FROM `category_table`";
          $result=$conn->query($sql);
          //Checking query is executed or not
          if ($result==true) {
            // counting rows from table
            $count=$result->num_rows;
            $sn=1;

            //Checking whether there is a data in the database or not
            if ($count>0) {
              while ($row=$result->fetch_assoc()) {
                //Get individual datab
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];

                $path="../graphics/category-images/".$image_name;
                ?>

                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><img src="<?php echo $path; ?>" width="100px"> </td>
                  <td><?php echo $featured; ?></td>
                  <td><?php echo $active; ?></td>
                  <td>
                    <a href="update-category.php?id=<?php echo $id ?>"><input type="submit" name="upd-del" value="Update Category" class="btn btn-green "></a>
                    <a href="delete-category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?> "><input type="submit" name="adm-del" value="Delete Category" class="btn btn-primary"></a>
                  </td>
                </tr>
                <?php


              }



            }else {
              //database is empty
              echo "database is empty";
            }


            }else{
              //Query does not run
              echo "Query does not run";
            }


           ?>

        </table>


      </div>

    </section>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
