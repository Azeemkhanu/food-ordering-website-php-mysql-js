<?php include("../includes/login-check-admin.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Update Admin Password</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Update Admin Password</h1>
        <?php
        //Get the admin id which we are going to delete
        $id=$_GET['id'];

         ?>

         <form class="" action="" method="post">
           <table class="table add-admin-table">
             <tr>
                 <td>current Password : </td>
                 <td>
                   <input type="Password" name="current_password" value="" placeholder="Current Password">
                 </td>
             </tr>

             <tr>
                 <td>New Password : </td>
                 <td>
                   <input type="password" name="new_password" value="" placeholder="New Password">
                 </td>
             </tr>

             <tr>
                 <td>Confirm Password : </td>
                 <td>
                   <input type="password" name="conf_password" value="" placeholder="Confirm Password">
                 </td>
             </tr>

             <tr>
               <td colspan="2">
                 <input type="submit" name="submit" value="Update Password" class="btn-green">
               </td>
             </tr>
           </table>

         </form>

         <?php
         if (isset($_POST['submit'])) {
           include("../includes/config.php");
           //get user entered current_password which has to be updated
           $current_password=md5($_POST['current_password']);
           //get user entered new_password which has to be updated
           $new_password=md5($_POST['new_password']);
           //get user entered conf_password which has to be updated
           $conf_password=md5($_POST['conf_password']);
           if($new_password==$conf_password){
             echo "New Password and confirm Password does not match...Try Again";
           }

           //Checking that the current passwors exists in databse or not
           $sql="SELECT * FROM `admin_table` WHERE `id`='$id' AND `password`='$current_password'";
           $result=$conn->query($sql);
           //checking query executed or not
           if ($result==true) {
             // query execute
             $count=$result->num_rows;
             if ($count==1) {
               // Admin exits and can change Password
               $sql="UPDATE `admin_table` SET `password` = '$new_password' WHERE `admin_table`.`id` = $id";
               $res=$conn->query($sql);
               $_SESSION['user_not_exit']="Password Updated Sucessfully";
               header("location: manage-admin.php");

             }else {
               // Admin Not exits and cannot change Password
               session_start();
               $_SESSION['user_not_exit']="User not existed with such Password...";
               header("location: manage-admin.php");

             }

           }


         }

          ?>




      </div>
    </section>




    <?php include("../includes/footer.php") ?>

  </body>
</html>
