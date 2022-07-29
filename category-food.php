<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Food</title>
  </head>
  <body>
    <?php include("includes/nav.php") ?>
    <?php
      $category_id=$_GET['category_id'];//get the search data
      //Query to get admin_table database
      $sql2="SELECT * FROM `category_table` WHERE  `id`='$category_id' ";
      $result=$conn->query($sql2);

      // counting rows from table
      $count=$result->num_rows;
      $sn=1;
      //Checking whether there is a data in the database or not
      if ($count>0) {
        while ($row=$result->fetch_assoc()) {
          //Get individual datab
          $category_title=$row['title'];
        }
      }else {
        echo "No Data Found";
      }
     ?>


    <!-- ------------------Food-search section starts here--------------------------- -->
        <section class="food-search">
          <div class="container">
              <h2>Foods on <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>
          </div>

        </section>
    <!-- --------------------------Food-search section ends here---------------------- -->


    <!-- food-menu section starts here -->
        <section class="food-menu">
          <div class="Parent-categories">

            <?php
            $sql3="SELECT * FROM `food_table` WHERE  `category_id`='$category_id' ";//match with particular category
            $result2=$conn->query($sql3);
            //Checking query is executed or not
              // counting rows from table
              $count2=$result2->num_rows;
              $sn=1;
              //Checking whether there is a data in the database or not
              if ($count2>0) {
                while ($row=$result2->fetch_assoc()) {
                  //Get individual datab
                  $id=$row['id'];
                  $title=$row['title'];
                  $description=$row['description'];
                  $price=$row['price'];
                  $image_name=$row['image_name'];
                  ?>
                  <div class="food-menu-box">
                      <div >
                        <img class="food-menu-img" src="graphics/food-images/<?php echo $image_name ?>" alt="<?php echo $title; ?>">
                      </div>
                      <div class="food-menu-description">
                        <h4 ><?php echo $title ?></h4>
                        <p class="food-price"><?php echo $price ?>$</p>
                        <p class="food-detail">
                          <?php echo $description ?>
                        </p>
                        <a href="order.php?food_id=<?php echo $id; ?>"><input type="submit" name="orderNow" value="Order Now" class="btn btn-primary"></a>
                      </div>
                  </div>
                  <?php

                }
              }else{
                echo "NO Record Found";

              }

             ?>



          </div>

        </section>
    <!--  food-menu section ends here -->



    <?php include("includes/main-footer.php") ?>
  </body>
</html>
