<?php include("../includes/login-check-admin.php") ?>
<?php include("../includes/config.php") ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Add Food</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Add Food</h1>
        <br>
         <br>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <table class="table add-admin-table">
            <tr>
              <td>Title : </td>
              <td>
                <input type="text" name="title" placeholder="Enter Title for Food" required>
              </td>
            </tr>


            <tr>
              <td>Description : </td>
              <td>
                <textarea name="description" rows="5" cols="30" placeholder="Enter Desciption for Food" required></textarea>
              </td>
            </tr>

            <tr>
              <td>Price : </td>
              <td>
                <input type="number" name="price" placeholder="Enter Price for Food" required>
              </td>
            </tr>

            <tr>
              <td>Select Image : </td>
              <td>
                <input type="file" name="image" required>
              </td>
            </tr>

            <tr>
              <td>Category : </td>
              <td>
                <?php
                $sql="SELECT * FROM `category_table` WHERE `active`='YES' ";
                $result2=$conn->query($sql);
                $count=$result2->num_rows;


                 ?>
                <select name="category">
                  <?php
                  if ($count>0) {
                    while ($row=$result2->fetch_assoc()) {
                      $id=$row['id'];
                      $title=$row['title'];
                   ?>

                  <option value="<?php echo $id ; ?>"><?php echo $title; ?></option>
                  <?php
                        }
                      }else {
                        echo "No Category Found";
                      }
                   ?>


                </select>
              </td>
            </tr>

            <tr>
              <td>Featured : </td>
              <td>
                <input type="radio" name="featured" value="Yes" required>Yes
                <input type="radio" name="featured" value="No" required>No
              </td>
            </tr>

            <tr>
              <td>Active : </td>
              <td>
                <input type="radio" name="active" value="Yes" required>Yes
                <input type="radio" name="active" value="No" required>No
              </td>
            </tr>

            <tr>
              <td>
                <input type="submit" name="submit" value="Add Food" class="btn btn-green">
              </td>
            </tr>
          </table>
        </form>

      </div>

    </section>


    <?php
    //connecting database
    //process the value from Form and Save it in the Database

    // first we check whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {

      $title=$_POST['title'];
      $description=$_POST['description'];
      $price=$_POST['price'];
      $category=$_POST['category'];
      $featured=$_POST['featured'];
      $active=$_POST['active'];

      //accessing Image name, path
      $name=$_FILES["image"]["name"];
      $source_path=$_FILES["image"]["tmp_name"];
      //adding destination path for image file to upload there
      $destination_path="../graphics/food-images/".$name;
      //Storing the image file in Permanent Location
      //first checking whether the same file exit in destination path or not
      if (file_exists($destination_path)) {
        $_SESSION['food-img']="File name already Exits...";
        header("location: manage-food.php");
        die();

      }else {
        echo move_uploaded_file($source_path,$destination_path);
      }

    //SQL Query to save data in the database
     $sql="INSERT INTO `food_table`(`title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES ('$title','$description',$price,'$name',$category,'$featured','$active')";

     //Executing Query and Saving data in the database
     $result=$conn->query($sql);

     //Checking (query is executed) data is inserted or not
     if ($result==true)
     {
       // echo "Data inserted successfully";
       session_start();
       $_SESSION['add-food']="Food Added Successfully";
       header("location: manage-food.php");
     }else
     {
       $_SESSION['add-food']="Failed to Add Category...Try Again";
       header("location: manage-food.php");
     }

    }


     ?>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
