<?php
session_start();
include "../dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="fixed-left">

  <!-- Top Bar Start -->
  <?php include('includes/navbar.php'); ?>
  <!-- ========== Left Sidebar Start ========== -->
  <?php include('includes/sidebar.php'); ?>
  <!-- Left Sidebar End -->

  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Items Available
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <thead class>
                    <tr>
                      <th>Item #</th>
                      <th>Item Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT s.`id`,s.`name`,s.`quantity`,s.`description`,s.`category`,(s.`quantity`-s.`borrowed_quantity`) AS remaining FROM `supplies` s;";
                    $actresult = mysqli_query($conn, $sql);

                    while ($result = mysqli_fetch_assoc($actresult)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $result['id']; ?>
                      </td>
                      <td>
                        <?php echo $result['name']; ?>
                      </td>
                      <td>
                        <?php echo $result['category']; ?>
                      </td>
                      <td>
                        <?php echo $result['description']; ?>
                      </td>
                      <td>
                        <?php echo $result['quantity']; ?>
                      </td>
                      <td>
                        <?php if ($result['remaining'] != '0') { ?>
                        <button class="btn btn-success btn-sm me-md-2" type="button">
                          <span class="badge badge-secondary">
                            <?php echo $result['remaining']; ?>
                          </span>
                          Available
                        </button>
                        <?php } else { ?>
                        <button class="btn btn-danger btn-sm me-md-2" type="button">
                          <span class="badge badge-secondary"></span>
                          Unavailable
                        </button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                    }
                            ?>
                  </tbody>
                  <tfoot></tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>

</body>

</html>