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
              <span><i class="bi bi-table me-2"></i></span> Released
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <div class="m-2">
                    <!-- Button HTML (to Trigger Modal) -->
                    <button type="button" id="myBtn" class="btn btn-outline-primary">
                      <span class="me-2"><i class="bi bi-box-arrow-in-up"></i></span>
                      Release Item
                    </button>

                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Release Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">

                            <form class="needs-validation" method="POST">
                              <div class="form-row">
                                <?php
                                $barcode = "SELECT barcode+1 as barcode FROM `transactions` ORDER BY barcode DESC LIMIT 1;";
                                $barcoderesult = mysqli_query($conn, $barcode);
                                $barresult = mysqli_fetch_assoc($barcoderesult);
                                ?>
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom01">Barcode Number</label>
                                  <input type="number" class="form-control" id="validationCustom01" name="barcode" value="<?php echo $barresult['barcode']; ?>" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                    <label for="validationCustom03">Quantity</label>
                                    <input type="number" class="form-control" id="validationCustom04" name="quantity" placeholder="Enter Quantity" required>
                                    <div class="invalid-feedback">
                                      Please provide a valid quantity.
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                    <label for="disabledSelect" class="form-label">Supply</label>
                                    <select id="disabledSelect" name="supplyname" class="form-select">
                                      <?php
                                      $sql = "SELECT `name` FROM supplies;";
                                      $actresult = mysqli_query($conn, $sql);
                                      while ($result = mysqli_fetch_assoc($actresult)) {
                                        echo "<option>" . $result['name'] . "</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                    <label for="disabledSelect" class="form-label">Borrower</label>
                                    <select id="disabledSelect" name="borrowername" class="form-select">
                                      <?php
                                      $sql = "SELECT `name` FROM employees;";
                                      $actresult = mysqli_query($conn, $sql);
                                      while ($result = mysqli_fetch_assoc($actresult)) {
                                        echo "<option>" . $result['name'] . "</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary">Save</button>
                                  </div>
                            </form>
                            <?php
                            if (isset($_POST['borrowername'])) {
                              $sql = "SELECT * FROM supplies s where s.name = '" . $_POST['supplyname'] . "' and s.quantity-s.borrowed_quantity >= '" . $_POST['quantity'] . "';";
                              $result = mysqli_query($conn, $sql);
                              print_r($result);
                              if (mysqli_num_rows($result) === 1) {
                                $sql1 = "SELECT * FROM employees e where e.name='" . $_POST['borrowername'] . "';";
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1) === 1) {
                                  $sql2 = "INSERT INTO `transactions` (barcode,`quantity`,date_released,`borrower_name`,supply_name)
                                                VALUES('" . $_POST['barcode'] . "','" . $_POST['quantity'] . "',NOW(),'" . $_POST['borrowername'] . "','" . $_POST['supplyname'] . "')";

                                  if ($conn->query($sql2) === TRUE) {
                                    $sql3 = "UPDATE supplies SET borrowed_quantity = borrowed_quantity+" . $_POST['quantity'] . ",transdate = NOW() WHERE `name` = '" . $_POST['supplyname'] . "';";
                                    $conn->query($sql3);
                                    echo '<script>alert("Supply Released!") 
                                                  window.location.href="Treleased.php"</script>';
                                  } else {
                                    echo '<script>alert("Supply Release Error!") 
                                                  window.location.href="Treleased.php"</script>';
                                  }
                                } else {
                                  echo '<script>alert("Employee ID not found on database!") 
                                                window.location.href="Treleased.php"</script>';
                                }
                              } else {
                                echo '<script>alert("No available Supply!") 
                                                window.location.href="Treleased.php"</script>';
                              }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <thead class>
                    <tr>
                      <th>Barcode Number</th>
                      <th>Borrower Name</th>
                      <th>Supply Name</th>
                      <th>Quantity</th>
                      <th>Date Borrowed</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM transactions WHERE date_released IS NOT NULL;";
                    $actresult = mysqli_query($conn, $sql);

                    while ($result = mysqli_fetch_assoc($actresult)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $result['barcode']; ?>
                        </td>
                        <td>
                          <?php echo $result['borrower_name']; ?>
                        </td>
                        <td>
                          <?php echo $result['supply_name']; ?>
                        </td>
                        <td>
                          <?php echo $result['quantity']; ?>
                        </td>
                        <td>
                          <?php echo $result['date_released']; ?>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                  <!--Start of Edit Modal HTML -->
                  <div id="editModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Released Item</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                          <form class="needs-validation" novalidate>
                            <div class="form-row">
                              <div class="col-md-12 mb-2">
                                <label for="validationCustom01">Barcode Number</label>
                                <input type="number" class="form-control" id="validationCustom01" placeholder="Enter Barcode number" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom03">Quantity</label>
                                  <input type="number" class="form-control" id="validationCustom04" placeholder="Enter Quantity" required>
                                  <div class="invalid-feedback">
                                    Please provide a valid quantity.
                                  </div>
                                </div>
                              </div>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Edit Modal -->
                  <!--Start of Delete Modal HTML -->
                  <div id="delModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Released Item</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Delete Modal -->
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
  <script>
    $(document).ready(function() {
      $("#myBtn").click(function() {
        $("#myModal").modal("toggle");
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#editBtn").click(function() {
        $("#editModal").modal("toggle");
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#delBtn").click(function() {
        $("#delModal").modal("toggle");
      });
    });
  </script>
</body>

</html>