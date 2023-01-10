<?php
session_start();
include "../dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Inventory System</title>
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
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card border-warning h-100">
            <div class="card-header py-3">
              <span class="me-2"><i class="bi bi-box-arrow-in-up"></i></span>
              Released
            </div>
            <div class="card-body d-flex">
              <h1 class="fw-bold text-warning">
                <?php
                $sql = "SELECT count(*) as count FROM transactions WHERE date_released IS NOT NULL;";
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo $result['count'];
                ?>
              </h1>
              <span class="ms-auto">
                <a class="btn" href="./Mreleased.php">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card border-success h-100">
            <div class="card-header py-3">
              <span class="me-2"><i class="bi bi-box-arrow-in-down"></i></span>
              Returned
            </div>
            <div class="card-body d-flex">
              <h1 class="fw-bold text-success">
                <?php
                $sql = "SELECT count(*) as count FROM transactions WHERE date_returned IS NOT NULL;";
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo $result['count'];
                ?>
              </h1>
              <span class="ms-auto">
                <a class="btn" href="./Mreturned.php">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-header py-3">
              <span class="me-2"><i class="bi bi-person-lines-fill"></i></span>
              Employees
            </div>
            <div class="card-body d-flex">
              <h1 class="fw-bold">
                <?php
                $sql = "SELECT COUNT(*) as count FROM employees;";
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo $result['count'];
                ?>
              </h1>
              <span class="ms-auto">
                <a class="btn" href="./employees.php">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-header py-3">
              <span class="me-2"><i class="bi bi-stack"></i></span>
              Supplies
            </div>
            <div class="card-body d-flex">
              <h1 class="fw-bold">
                <?php
                $sql = "SELECT sum(quantity) as sum FROM supplies;";
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo $result['sum'];
                ?>
              </h1>
              <span class="ms-auto">
                <a class="btn" href="./supplies.php">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-header py-3">
              <span class="me-2"><i class="bi bi-folder-symlink-fill"></i></span>
              Transactions
            </div>
            <div class="card-body d-flex">
              <h1 class="fw-bold">
                <?php
                $sql = "SELECT count(*) as count FROM transactions;";
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                echo $result['count'];
                ?>
              </h1>
              <span class="ms-auto">
                <a class="btn" href="./Treleased.php">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </span>
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