<?php include("../includes/login-check-admin.php") ?>
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
            <h1>5</h1>
            <p>categories</p>
          </div>
          <div class="admin-main-content-child">
            <h1>5</h1>
            <p>categories</p>
          </div>
          <div class="admin-main-content-child">
            <h1>5</h1>
            <p>categories</p>
          </div>
          <div class="admin-main-content-child">
            <h1>5</h1>
            <p>categories</p>
          </div>

        </div>
        </div>


    </section>
<!--  -----------------------main content section end here----------------------------------- -->

<?php include("../includes/footer.php") ?>
  </body>
</html>
