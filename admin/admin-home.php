<?php include("../includes/login-check-admin.php") ?>
<?php include("../includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Food Order Wesite - Home Page</title>
  </head>
  <body>
    <?php include("../includes\admin-nav.php") ?>
    <!-- main content section starts from here -->
    <section class="admin-main-content">
      <div class="container">
        <strong>DASHBOARD</strong>
        <br><br>
        <?php

        if (isset($_SESSION['login'])) {
          echo $_SESSION['login'];    //Displaying Session Message Add
          unset($_SESSION['login']);  //Removing Session Message Add
        }
         ?>

        <div class="admin-main-content-parent">

          <div class="admin-main-content-child">
            <?php
            //Query to get admin_table database
            $sql="SELECT * FROM `category_table`";
            $result=$conn->query($sql);
            //number of rows equals to data entered how many times
            $count=$result->num_rows;

             ?>
            <h1><?php echo $count ?></h1>
            <p>categories</p>
          </div>
          <div class="admin-main-content-child">
            <?php
            //Query to get admin_table database
            $sql2="SELECT * FROM `food_table`";
            $result2=$conn->query($sql2);
            //number of rows equals to data entered how many times
            $count2=$result2->num_rows;

             ?>
            <h1><?php echo $count2 ?></h1>
            <p>Foods</p>
          </div>
          <div class="admin-main-content-child">
            <?php
            //Query to get admin_table database
            $sql3="SELECT * FROM `order_table`";
            $result3=$conn->query($sql3);
            //number of rows equals to data entered how many times
            $count3=$result3->num_rows;

             ?>
            <h1><?php echo $count3 ?></h1>
            <p>Total Orders</p>
          </div>
          <div class="admin-main-content-child">
            <?php
            //Query to get admin_table database
            $sql4="SELECT SUM(total) AS Total FROM `order_table`";
            $result4=$conn->query($sql4);
            //number of rows equals to data entered how many times
            $row=$result4->fetch_assoc();
            $total_revenue=$row['Total'];

             ?>
            <h1><?php echo $total_revenue ?></h1>
            <p>Revenue Generated</p>
          </div>

        </div>
        </div>


    </section>
<!--  -----------------------main content section end here----------------------------------- -->
}
<?php include("../includes/footer.php") ?>
  </body>
</html>
