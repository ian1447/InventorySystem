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
              <span><i class="bi bi-table me-2"></i></span> Returned
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <div class="m-2">
                    <!-- Button HTML (to Trigger Modal) -->
                    <button type="button" id="myBtn" class="btn btn-outline-primary">
                      <span class="me-2"><i class="bi bi-box-arrow-in-down"></i></span>
                      Return Item
                    </button>

                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Recieve Return Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">

                            <form class="needs-validation" method="POST">
                              <div class="form-row">
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom01">Barcode number</label>
                                  <input type="number" class="form-control" id="validationCustom01" name="barcode"
                                    placeholder="Enter Barcode number" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Save</button>
                          </div>
                          </form>
                          <?php
                          if (isset($_POST['barcode'])) {
                            $sql = "SELECT * FROM transactions where date_returned IS NULL and barcode='" . $_POST['barcode'] . "' ;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) === 1) {
                              $sql5 = "SELECT * FROM transactions WHERE barcode='" . $_POST['barcode'] . "';";
                              $actresult = mysqli_query($conn, $sql5);
                              $result = mysqli_fetch_assoc($actresult);
                              $sql1 = "UPDATE transactions t SET t.date_returned=NOW() WHERE t.barcode='" . $_POST['barcode'] . "';";
                              $conn->query($sql1);
                              $sql2 = "UPDATE supplies s SET s.borrowed_quantity = s.borrowed_quantity-" . $result['quantity'] . ", s.transdate=NOW() WHERE s.name='" . $result['supply_name'] . "';";
                              if ($conn->query($sql2) === TRUE) {
                                echo '<script>alert("Return Transaction Successful!") 
                                            window.location.href="Treturned.php"</script>';
                              } else {
                                echo '<script>alert(Return Transaction Failed") 
                                            window.location.href="Treturned.php"</script>';
                              }
                            } else {
                              echo '"<script>alert("Barcode for returning not found!!") 
                                                window.location.href="Treturned.php"</script>"';
                            }
                          }
                          ?>
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
                      <th>Date Returned</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM transactions WHERE date_returned IS NOT NULL;";
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
                        <?php echo $result['date_returned']; ?>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                  <!-- Start of Edit Modal HTML -->
                  <div id="editModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Recieve Return Item</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                          <form class="needs-validation" novalidate>
                            <div class="form-row">
                              <div class="col-md-12 mb-2">
                                <label for="validationCustom01">Barcode number</label>
                                <input type="number" class="form-control" id="validationCustom01"
                                  placeholder="Enter Barcode number" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                <label for="validationCustom04">Quantity</label>
                                <input type="number" class="form-control" id="validationCustom04"
                                  placeholder="Enter Quantity" required>
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
    $(document).ready(function () {
      $("#myBtn").click(function () {
        $("#myModal").modal("toggle");
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $("#editBtn").click(function () {
        $("#editModal").modal("toggle");
      });
    });
  </script>
</body>

</html>