<?php include("../includes/login-check-admin.php") ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Add Category</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Add Category</h1>
        <br>
        <?php
         if (isset($_SESSION['add-category'])) {
          echo $_SESSION['add-category'];    //Displaying Session Message Add category
          unset($_SESSION['add-category']);  //Removing Session Message Add category
           }
        if (isset($_SESSION['upload'])) {
          echo $_SESSION['upload'];    //Displaying Session Message file uploading to certain destination has ready same file
          unset($_SESSION['upload']);  //Removing Session Message file uploading to certain destination has ready same file
           }

         ?>
<br>
<br>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <table class="table add-admin-table">
            <tr>
              <td>Title : </td>
              <td>
                <input type="text" name="title" placeholder="Enter Title" >
              </td>
            </tr>

            <tr>
              <td>Upload Image : </td>
              <td>
                <input type="file" name="image" placeholder="Enter Title" required>
              </td>
            </tr>

            <tr>
              <td>Featured : </td>
              <td>
                <input type="radio" name="featured" value="Yes">Yes
                <input type="radio" name="featured" value="No">No
              </td>
            </tr>

            <tr>
              <td>Active : </td>
              <td>
                <input type="radio" name="active" value="Yes" required>Yes
                <input type="radio" name="active" value="No" >No
              </td>
            </tr>

            <tr>
              <td>
                <input type="submit" name="submit" value="Add Category" class="btn btn-green">
              </td>
            </tr>
          </table>
        </form>

      </div>

    </section>


    <?php
    //connecting database
    include("../includes/config.php");
    //process the value from Form and Save it in the Database

    // first we check whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {
      //we check that radio button is selected or not
      $title=$_POST['title'];

      if (isset($_POST['featured']))
      {
        $featured=$_POST['featured'];
      }else
      {
        $featured="No";
      }

      //we check that radio button is selected or not
      if (isset($_POST['active']))
      {
        $active=$_POST['active'];
      }else
      {
        $active="No";
      }
      //accessing Image name, path
      $name=$_FILES["image"]["name"];
      $source_path=$_FILES["image"]["tmp_name"];
      //adding destination path for image file to upload there
      $destination_path="../graphics/category-images/".$name;
      //Storing the image file in Permanent Location
      //first checking whether the same file exit in destination path or not
      if (file_exists($destination_path)) {
        $_SESSION['upload']="File name already Exits...";
        header("location: add-category.php");

      }else {
        echo move_uploaded_file($source_path,$destination_path);
      }

    //SQL Query to save data in the database
     $sql="INSERT INTO `order_table` (`food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`)
     VALUES ('pixa', '100', '3', '3345', '2022-07-20 15:21:11.000000', 'orderede', 'fews', 'gsed', 'gsd', 'segd')";

     //Executing Query and Saving data in the database
     $result=$conn->query($sql);

     //Checking (query is executed) data is inserted or not
     if ($result==true)
     {
       // echo "Data inserted successfully";
       session_start();
       $_SESSION['add-category']="Category Added Successfully";
       header("location: manage-category.php");
     }else
     {
       $_SESSION['add-category']="Failed to Add Category...Try Again";
       header("location: add-category.php");
     }

    }


     ?>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
