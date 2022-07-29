<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
  </head>
  <body>
    <?php include("includes/nav.php") ?>


    <!-- ------------------Food-search section starts here--------------------------- -->
        <section class="food-search">
          <div class="container">
            <form action="food-search.php" method="post">
              <input type="search" name="search" placeholder="Search for the Food..">
              <input type="submit" name="submit" value="Search" class="btn btn-primary">

            </form>
          </div>

        </section>
    <!-- --------------------------Food-search section ends here---------------------- -->


    <!-- food-menu section starts here -->
        <section class="food-menu">
          <h2>Food Menu</h2>
          <div class="Parent-categories">

            <?php
            //Query to get admin_table database
            $sql2="SELECT * FROM `food_table` WHERE  `active`='YES' ";
            $result=$conn->query($sql2);
            //Checking query is executed or not
              // counting rows from table
              $count2=$result->num_rows;
              $sn=1;
              //Checking whether there is a data in the database or not
              if ($count2>0) {
                while ($row=$result->fetch_assoc()) {
                  //Get individual datab
                  $id=$row['id'];
                  $title=$row['title'];
                  $description=$row['description'];
                  $price=$row['price'];
                  $image_name=$row['image_name'];
                  ?>
                  <div class="food-menu-box">
                      <div >
                        <img class="food-menu-img" src="graphics/food-images/<?php echo $image_name ?>" alt="Chicken Huwain Pizza">
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
