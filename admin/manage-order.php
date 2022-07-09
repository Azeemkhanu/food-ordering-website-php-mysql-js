<?php include("../includes/login-check-admin.php") ?>
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
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>

          <tr>
            <td>1</td>
            <td>azeem khan</td>
            <td>khanu</td>
            <td>
              <a href="#"><input type="submit" name="upd-del" value="Update Admin" class="btn btn-green "></a>
              <a href="#"><input type="submit" name="adm-del" value="Delete Admin" class="btn btn-primary"></a>
            </td>
          </tr>

          <tr>
            <td>1</td>
            <td>azeem khan</td>
            <td>khanu</td>
            <td>
              <a href="#"><input type="submit" name="upd-del" value="Update Admin" class="btn btn-green "></a>
              <a href="#"><input type="submit" name="adm-del" value="Delete Admin" class="btn btn-primary"></a>
            </td>
          </tr>

          <tr>
            <td>1</td>
            <td>azeem khan</td>
            <td>khanu</td>
            <td>
                <a href="#"><input type="submit" name="upd-del" value="Update Admin" class="btn btn-green "></a>
                <a href="#"><input type="submit" name="adm-del" value="Delete Admin" class="btn btn-primary"></a>
            </td>
          </tr>
        </table>

      </div>

      </div>

    </section>


    <?php include("../includes/footer.php") ?>

  </body>
</html>
