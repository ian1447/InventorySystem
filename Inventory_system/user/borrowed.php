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
              <span><i class="bi bi-table me-2"></i></span> Items Borrowed
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <div class="m-2">
                    <!-- Button HTML (to Trigger Modal) -->
                    <button type="button" id="myBtn" class="btn btn-outline-primary" onclick="functionPrint()">
                      <span class="me-2"><i class="bi bi-printer"></i></span>
                      Print Report
                    </button>
                  </div>

                  <thead class>
                    <tr>
                      <th>Barcode Number</th>
                      <th>Supply Name</th>
                      <th>Quantity</th>
                      <th>Date Borrowed</th>
                      <th>Date Returned</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM transactions where borrower_name='" . $_SESSION['useridname'] . "';";
                    $actresult = mysqli_query($conn, $sql);

                    while ($result = mysqli_fetch_assoc($actresult)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $result['barcode']; ?>
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
                      <td>
                        <?php echo $result['date_returned']; ?>
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
  <script>
    $(document).ready(function () {
      $("#myBtn").click(function () {
        $("#myModal").modal("toggle");
      });
    });
  </script>
  <script>
    function functionPrint() {
      var print = document.getElementById('example');
      var wme = window.open("", "", "width=900,height=700");
      wme.document.write(print.outerHTML);
      wme.document.close();
      wme.focus();
      wme.print();
      wme.close();
    }
  </script>

</body>

</html>