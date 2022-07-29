<?php include("../includes/login-check-admin.php") ?>
<?php include("../includes/config.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Manage Food</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Manage Food</h1>
        <br>
        <?php
          if (isset($_SESSION['add-food'])) {
           echo $_SESSION['add-food'];    //Displaying Session Message food added or not
           unset($_SESSION['add-food']);  //Removing Session Message  food added or not
           }

         if (isset($_SESSION['remove-image-food'])) {
          echo $_SESSION['remove-image-food'];    //Displaying Session Message food img not deleted
          unset($_SESSION['remove-image-food']);  //Removing Session Message  food img not deleted
          }

          if (isset($_SESSION['delete-food'])) {
            echo $_SESSION['delete-food'];    //Displaying Session Message food  deleted or not
            unset($_SESSION['delete-food']);  //Removing Session Message  food  deleted or not
           }

        if (isset($_SESSION['food-img'])) {
          echo $_SESSION['food-img'];    //Displaying Session Message food img exists or not
          unset($_SESSION['food-img']);  //Removing Session Message  food img exists or not
          }

          if (isset($_SESSION['no-food-found'])) {
            echo $_SESSION['no-food-found'];    //Displaying Session Message food data not found while updating
            unset($_SESSION['no-food-found']);  //Removing Session Message food data not found while updating
            }
          if (isset($_SESSION['food-updated'])) {
            echo $_SESSION['food-updated'];    //Displaying Session Message food  Updated or not
            unset($_SESSION['food-updated']);  //Removing Session Message  food  Updated or not
           }

         ?>
         <br>
        <a href="add-food.php"><input type="submit" name="add-food" value="Add Food" class="btn btn-blue"></a>

        <table class="table">
          <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image Name</th>
            <th>Category Id</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>

          <?php
          //Query to get admin_table database
          $sql2="SELECT * FROM `food_table`";
          $result=$conn->query($sql2);
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
                $description=$row['description'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $category_id=$row['category_id'];
                $featured=$row['featured'];
                $active=$row['active'];

                $path="../graphics/food-images/".$image_name;
                ?>

                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $description; ?></td>
                  <td><?php echo $price; ?></td>
                  <td><img src="<?php echo $path; ?>" width="100px"> </td>
                  <td><?php echo $category_id; ?></td>
                  <td><?php echo $featured; ?></td>
                  <td><?php echo $active; ?></td>
                  <td>
                    <a href="update-food.php?id=<?php echo $id ?>"><input type="submit" name="upd-del" value="Update Food" class="btn btn-green "></a>
                    <a href="delete-food.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?> "><input type="submit" name="food-del" value="Delete Food" class="btn btn-primary"></a>
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
