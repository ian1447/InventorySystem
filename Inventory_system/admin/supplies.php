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
              <span><i class="bi bi-table me-2"></i></span> Supplies
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <div class="m-2">
                    <!-- Button HTML (to Trigger Modal) -->
                    <button type="button" id="myBtn" class="btn btn-outline-success">
                      <span class="me-2"><i class="bi bi-person-plus-fill"></i></span>
                      Add Supply
                    </button>

                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Add Supply</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">

                            <form class="needs-validation" method="POST">
                              <div class="form-row">
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom01">Item <span class="text-danger">*</span> </label>
                                  <input type="text" class="form-control" id="validationCustom01" name="supname"
                                    placeholder="Enter item name" required>
                                </div>
                                <div class="form-group form-group-md">
                                  <label for="category" class="col-sm-2 control-label">Category</label>
                                  <div class="col-md-12 mb-2">
                                    <select class="form-control" id="category" name="category">
                                      <!-- <option value="sports_equipment">Sports Equipment</option>
                                                <option value="supply">Supply</option> -->
                                      <?php
                                      $sql = "SELECT * FROM categories;";
                                      $actresult = mysqli_query($conn, $sql);

                                      while ($result = mysqli_fetch_assoc($actresult)) { ?>
                                      <option value="<?php echo $result['name']; ?>">
                                        <?php echo $result['name']; ?>
                                      </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-2">
                                    <label for="validationCustom03">Description <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="validationCustom03" name="description"
                                      placeholder="Enter description" required>
                                  </div>
                                  <div class="col-md-12 mb-2">
                                    <label for="validationCustom04">Quantity <span class="text-danger">*</span> </label>
                                    <input type="number" class="form-control" id="validationCustom04" name="quantity"
                                      placeholder="Enter quantity" required>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                  <button class="btn btn-success">Save</button>
                                </div>
                            </form>
                            <?php
                            include "../dbcon.php";
                            if (isset($_POST['supname'])) {
                              $sql = "INSERT INTO `supplies` (`name`,`description`,`category`,quantity)
                                            VALUES ('" . $_POST['supname'] . "','" . $_POST['description'] . "','" . $_POST['category'] . "','" . $_POST['quantity'] . "')";
                              if ($conn->query($sql) === TRUE) {
                                echo '<script>alert("Supplies Addedd Successfully!") 
                                                window.location.href="supplies.php"</script>';
                              } else {
                                echo '<script>alert("Adding Supplies Failed!\n Please Check SQL Connection String!") 
                                                window.location.href="supplies.php"</script>';
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
                      <th>Item #</th>
                      <th>Item Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Action</th>
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
                      <td>
                        <div class="d-grid gap-2 d-md-flex">
                          <a href="#edit<?php echo $result['id']; ?>" data-toggle="modal"
                            class="btn btn-primary btn-sm me-md-2"><span class="me-2"><i
                                class="bi bi-pencil"></i></span> Edit</a> ||
                          <a href="#del<?php echo $result['id']; ?>" data-toggle="modal"
                            class="btn btn-danger btn-sm"><span class="me-2"><i class="bi bi-trash"></i></span>
                            Delete</a>
                        </div>
                      </td>
                    </tr>

                    <!-- Start of Edit Modal -->
                    <!-- Edit Modal HTML -->
                    <div id="edit<?php echo $result['id']; ?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form id="update_form" method="POST">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Employee</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <?php
                      $id = $result['id'];
                      $edit = mysqli_query($conn, "select * from supplies where id='" . $result['id'] . "'");
                      $erow = mysqli_fetch_array($edit);
                              ?>
                              <input type="hidden" id="id_u" name="editid" value="<?php echo $erow['id']; ?>"
                                class="form-control" required>
                              <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" id="name_u" name="editname" value="<?php echo $erow['name']; ?>"
                                  class="form-control" required>
                              </div>
                              <div class="form-group form-group-md">
                                <label for="category" class="col-sm-2 control-label">Category</label>
                                <div class="col-md-12 mb-2">
                                  <select class="form-control" id="category" name="editcategory">

                                    <option selected="selected">
                                      <?php echo $erow['category']; ?>
                                    </option>
                                    <!-- <option value="sports_equipment">Sports Equipment</option>
                                                <option value="supply">Supply</option> -->
                                    <?php
                      $data = "SELECT * FROM categories c WHERE c.name!='" . $erow['category'] . "';";
                      $actresult1 = mysqli_query($conn, $data);

                      while ($result1 = mysqli_fetch_assoc($actresult1)) { ?>
                                    <option value="<?php echo $result1['name']; ?>">
                                      <?php echo $result1['name']; ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Description</label>
                                <input type="college" id="desceiption_u" name="editdescription"
                                  value="<?php echo $erow['description']; ?>" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Quantity</label>
                                <input type="address" id="quantity_u" name="editquantity"
                                  value="<?php echo $erow['quantity']; ?>" class="form-control" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" value="2" name="type">
                              <input type="button" class="btn btn-defaulst" data-dismiss="modal" value="Cancel">
                              <button class="btn btn-info" id="update">Update</button>
                            </div>
                          </form>
                          <?php
                      if (isset($_POST['editid'])) {
                        $sql = "UPDATE supplies s 
                                      SET s.name='" . $_POST['editname'] . "', s.description='" . $_POST['editdescription'] . "', s.category='" . $_POST['editcategory'] . "',
                                      s.quantity='" . $_POST['editquantity'] . "'
                                      WHERE s.id='" . $_POST['editid'] . "'";
                        if ($conn->query($sql) === TRUE) {
                          echo '<script>alert("Supplies Edit Successfully!") 
                                          window.location.href="supplies.php"</script>';
                        } else {
                          echo '<script>alert("Editing Supply Details Failed!\n Please Check SQL Connection String!") 
                                          window.location.href="supplies.php"</script>';
                        }
                      }
                          ?>
                        </div>
                      </div>
                    </div>
                    <!-- End of Edit Modal -->

                    <!-- Delete -->
                    <div class="modal fade" id="del<?php echo $result['id']; ?>" tabindex="-1" role="dialog"
                      aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <center>
                              <h4 class="modal-title" id="myModalLabel">Delete</h4>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          </div>
                          <div class="modal-body">
                            <?php
                      $del = mysqli_query($conn, "select * from supplies where id='" . $result['id'] . "'");
                      $drow = mysqli_fetch_array($del);
                            ?>
                            <div class="container-fluid">
                              <h5>
                                <center>Are you sure to delete <strong>
                                    <?php echo ucwords($drow['name']); ?>
                                  </strong> from Employee list? This method cannot be undone.</center>
                              </h5>
                            </div>
                          </div>
                          <form method="POST">
                            <input type="hidden" id="id_u" name="deleteid" value="<?php echo $drow['id']; ?>"
                              class="form-control" required>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                  class="glyphicon glyphicon-remove"></span> Cancel</button>
                              <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                Delete</button>
                            </div>
                            <?php
                      if (isset($_POST['deleteid'])) {
                        $sql = "DELETE FROM supplies  WHERE id='" . $_POST['deleteid'] . "'";
                        if ($conn->query($sql) === TRUE) {
                          echo '<script>alert("Deleted Successfully!") 
                                                window.location.href="supplies.php"</script>';
                        } else {
                          echo '<script>alert("Deleting Supply Details Failed!\n Please Check SQL Connection String!") 
                                                window.location.href="supplies.php"</script>';
                        }
                      }
                            ?>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- /.modal -->
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

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#myBtn").click(function () {
        $("#myModal").modal("toggle");
      });
    });
  </script>
  </script>
</body>

</html>