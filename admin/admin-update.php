<?php include("../includes/login-check-admin.php") ?>
<?php     include("../includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Update Admin</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Update Admin</h1>
        <?php
        //Get the admin id which we are going to delete
        $id=$_GET['id'];

         ?>

         <form class="" action="" method="post">
           <table class="table add-admin-table">
             <tr>
                 <td>Full Name: </td>
                 <td>
                   <input type="text" name="fullname" value="" placeholder="Enter full Name">
                 </td>
             </tr>

             <tr>
                 <td>Username: </td>
                 <td>
                   <input type="text" name="username" value="" placeholder="Enter Username">
                 </td>
             </tr>

             <tr>
               <td colspan="2">
                 <input type="submit" name="submit" value="Update Admin" class="btn btn-green">
               </td>
             </tr>
           </table>

         </form>

         <?php
         if (isset($_POST['submit'])) {

           //get user entered fullname which has to be updated
           $fullname=$_POST['fullname'];
           //get user entered fullname which has to be updated
           $username=$_POST['username'];
           //Writing Qurey to delete data from Database
            $sql="UPDATE `admin_table` SET `full_name` = '$fullname', `username` = '$username' WHERE `admin_table`.`id` = $id";
            $result=$conn->query($sql);
            //checking query executed or not
            if ($result==true) {
              // query execute
              session_start();
              $_SESSION['update']="Admin Updated Successfully";
              header("location: manage-admin.php");
            }else {
              // query not executed.
              $_SESSION['update']="Failed to Update Admin..try again";
              header("location: manage-admin.php");
            }

         }

          ?>


      </div>
    </section>




    <?php include("../includes/footer.php") ?>

  </body>
</html>
