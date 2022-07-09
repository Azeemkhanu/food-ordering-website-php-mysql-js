<?php include("../includes/login-check-admin.php") ?>
<?php     include("../includes/config.php"); ?>
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
        <h1><strong>Manage Admin</strong></h1>
        <?php
        if (isset($_SESSION['add'])) {
          echo $_SESSION['add'];    //Displaying Session Message Add
          unset($_SESSION['add']);  //Removing Session Message Add
        }

        if (isset($_SESSION['delete'])) {
          echo $_SESSION['delete'];    //Displaying Session Message delete
          unset($_SESSION['delete']);  //Removing Session Message delete
        }

        if (isset($_SESSION['update'])) {
          echo $_SESSION['update'];    //Displaying Session Message update
          unset($_SESSION['update']);  //Removing Session Message update
        }
        if (isset($_SESSION['user_not_exit'])) {
          echo $_SESSION['user_not_exit'];    //Displaying Session Message user_not_exit password update
          unset($_SESSION['user_not_exit']);  //Removing Session Message user_not_exit
        }
         ?>
           <br /><br />

        <a href="add-admin.php"><input type="submit" name="adm-del" value="Add Admin" class="btn btn-blue"></a>

        <table class="table">
          <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>

          <?php
          //Query to get admin_table databas
          $sql="SELECT * FROM `admin_table`";
          //Executing query to display all data from admin_table
          $result=$conn->query($sql);
          //Checking query is executed or not
          if ($result==true) {
            // counting rows from table
            $count=$result->num_rows;

            //Checking whether there is a data in the database or not
            if ($count>0) {
              while ($row=$result->fetch_assoc()) {
                //Get individual datab
                $id=$row['id'];
                $fullname=$row['full_name'];
                $username=$row['username'];

                //Displaying data in our table.
                $count_SNO=1;
                ?>

                <tr>
                  <td><?php echo 1+$count_SNO;?></td>
                  <td><?php echo $fullname; ?></td>
                  <td><?php echo $username; ?></td>
                  <td>
                    <a href="update-admin-password.php?id=<?php echo $id ?>"><input type="submit" name="upd-pass" value="Update Password" class="btn btn-blue "></a>
                    <a href="admin-update.php?id=<?php echo $id ?>"><input type="submit" name="upd-del" value="Update Admin" class="btn btn-green "></a>
                    <a href="delete-admin.php?id=<?php echo $id ?> "><input type="submit" name="adm-del" value="Delete Admin" class="btn btn-primary"></a>
                  </td>
                </tr>

                <?php


              }
            }
          }else{
            //we dont have data in database
            echo "database is empty";

          }

           ?>





        </table>

        </div>

    </section>
    <!--  main content section end here -->

    <?php include("../includes/footer.php") ?>
  </body>
</html>
