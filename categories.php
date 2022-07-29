<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
  </head>
  <body>
    <?php include("includes/nav.php") ?>


    <!-- Categories section starts here -->
    <section class="categories">
        <h2>Explore Foods</h2>
      <div class="Parent-categories">


        <?php
        //Query to get admin_table database
        $sql="SELECT * FROM `category_table` WHERE `active`='YES' LIMIT 3";
        $result=$conn->query($sql);
        //Checking query is executed or not
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
              ?>
              <a href="category-food.php?category_id= <?php echo $id; ?>">
                <div class="box-child">
                  <img src="graphics/category-images/<?php echo $image_name; ?>" alt="momo">
                  <h3 class="postion-text"><?php echo $title; ?></h3>
                </div>
              </a>
              <?php

            }
          }else{
            echo "NO Record Found";

          }

         ?>


      </div>
    </section>
  <!--  Categories section ends here  -->


    <?php include("includes/main-footer.php") ?>
  </body>
</html>
