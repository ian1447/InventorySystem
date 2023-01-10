<?php
session_start();
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
        <div class="container text-center">
            <h1 class="fw-bold">About the System</h1>
            <div class="card border-none" style="max-width: 1920px; border-bottom-style: none; padding-top: 5rem;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./images/image.svg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Inventory System Features</h4>
                            <p class="card-text">This inventory management aims to help track easily and efficiently
                                manage the ordering, stocking, storing, and using of inventory. By effectively managing
                                your inventory, you'll always know what items are in stock and how many of them there
                                are available to borrow by the employees.</p>
                            <h5>Features</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Add/Update/Delete Employee Data</li>
                                <li class="list-group-item">Add/Update/Delete Supply</li>
                                <li class="list-group-item">Release/Return Items</li>
                                <li class="list-group-item">Monitor Available Items</li>
                                <li class="list-group-item">Monthly Report of Released Items</li>
                                <li class="list-group-item">Monitoring of Returned Items</li>
                            </ul>
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