<?php include("../includes/login-check-admin.php") ?>
<?php include("../includes/config.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Manage Order</title>
  </head>
  <body>
    <?php include("../includes/admin-nav.php") ?>

    <section class="admin-main-content">
      <div class="container">
        <h1>Manage Order</h1>

        <table class="table">
          <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>price </th>
            <th>quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Customer Contact</th>
            <th>Customer Email</th>
            <th>Customer Address</th>

          </tr>

          <?php
          //Query to get admin_table database
          $sql="SELECT * FROM `order_table`";
          $result=$conn->query($sql);
          //Checking query is executed or not
          if ($result==true) {
            // counting rows from table
            $count=$result->num_rows;
            $sn=1;

            //Checking whether there is a data in the database or not
            if ($count>0) {
              while ($row=$result->fetch_assoc()) {
                //Get individual datab
                $id=$row['id'];
                $food=$row['food'];
                $price=$row['price'];

                $full_name=$row['customer_name'];
                $contact=$row['customer_contact'];
                $email=$row['customer_email'];
                $address=$row['customer_address'];
                $qty=$row['quantity'];

                $total=$row['total'];
                $order_date=$row['order_date'];
                $status=$row['status'];
                ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $food; ?></td>
                  <td><?php echo $price; ?> </td>
                  <td><?php echo $qty; ?></td>
                  <td><?php echo $total; ?></td>
                  <td><?php echo $order_date; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $full_name; ?></td>
                  <td><?php echo $contact; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $address; ?></td>



                </tr>
                <?php

              }
            }else{
              echo "No DATA FOUND";


            }
}

?>






        </table>

      </div>

      </div>

    </section>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
