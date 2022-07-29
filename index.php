<?php include("includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Restaurant</title>
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
  <?php
  if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];    //Displaying Session order Successfull
    unset($_SESSION['order']);  //Removing Session order Successfull or not
  }
  if (isset($_SESSION['user-reg'])) {
    echo $_SESSION['user-reg'];    //Displaying Session User Registered
    unset($_SESSION['user-reg']);  //Removing Session User Registered
  }
  if (isset($_SESSION['user-login'])) {
    echo $_SESSION['user-login'];    //Displaying Session User logged in
    unset($_SESSION['user-login']);  //Removing Session User logged in
  }

   ?>

    <!-- Categories section starts here -->
    <section class="categories">
        <h2>Explore Foods</h2>
      <div class="Parent-categories">
        <?php
        //Query to get admin_table database
        $sql="SELECT * FROM `category_table` WHERE `featured`='YES' AND `active`='YES' LIMIT 3";
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
              <a href="category-food.php?category_id=<?php echo $id; ?>">
                <div class="box-child">
                  <img src="graphics/category-images/<?php echo $image_name; ?>" alt="categories-images">
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
<!-- --------------------Categories section ends here---------------------------- -->



<!-- --------------------food-menu section starts here--------------------------- -->
    <section class="food-menu">
      <h2>Food Menu</h2>
      <div class="Parent-categories">

        <?php
        //Query to get admin_table database
        $sql2="SELECT * FROM `food_table` WHERE `featured`='YES' AND `active`='YES' LIMIT 6";
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
<!-- --------------------- food-menu section ends here---------------------------- -->



<?php include("includes/main-footer.php") ?>


  </body>
</html>
