<?php include("includes/config.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
  </head>
  <body>
    <?php include("includes/nav.php") ?>
    <?php
    $food_id=$_GET['food_id'];//food id
    //Query to get admin_table database
    $sql="SELECT * FROM `food_table` WHERE  `id`='$food_id' ";
    $result=$conn->query($sql);
    //Checking query is executed or not
      // counting rows from table
      $count=$result->num_rows;
      //Checking whether there is a data in the database or not
      if ($count==1) {
        while ($row=$result->fetch_assoc()) {
          //Get individual datab
          $id=$row['id'];
          $title=$row['title'];
          $description=$row['description'];
          $price=$row['price'];
          $image_name=$row['image_name'];
        }
      }

     ?>

    <!-- fOOD order Section Starts Here -->
    <section class="ordering">
        <div class="container">

            <h2 class="orderFormHeader">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="post">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="graphics/food-images/<?php echo $image_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title ?>">
                        <p class="food-price"><?php echo $price ?>$</p>
                        <input type="hidden" name="price" value="<?php echo $price ?>">

                        <div class="order-label">Quantity</div>
                        <input class="input-fields" type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input class="input-fields" type="text" name="full_name" placeholder="E.g. Azeem khan" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input class="input-fields" type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input class="input-fields" type="email" name="email" placeholder="E.g. ak@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea class="textArea"  name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
<br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            // first we check whether the submit button is clicked or not
            if (isset($_POST['submit']))
            {
              $food=$_POST['food'];
              $price=$_POST['price'];

              $full_name=$_POST['full_name'];
              $contact=$_POST['contact'];
              $email=$_POST['email'];
              $address=$_POST['address'];
              $qty=$_POST['qty'];

              $total=$price*$qty;
              $order_date=date("Y-m-d h:i:sa");
              $status="Ordered";

              $sql2="INSERT INTO `order_table` (`food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`)
              VALUES ( '$food', '$price', '$qty', '$total', '$order_date', '$status', '$full_name', '$contact', '$email', '$address')";
              $result2=$conn->query($sql2);
              if ($result2==true){
                session_start();
                $_SESSION['order']="Food Ordered Successfully";
                header("location: index.php");
              }else{
                $_SESSION['order']="Food Ordered Failed";
                header("location: index.php");
              }
            }


             ?>

        </div>
    </section>
    <!-- fOOD order Section Ends Here -->

    <?php include("includes/main-footer.php") ?>
  </body>
</html>
