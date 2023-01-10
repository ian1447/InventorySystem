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
              <span><i class="bi bi-table me-2"></i></span> Employees
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-hover data-table" style="width: 100%">

                  <div class="m-2">
                    <!-- Button HTML (to Trigger Modal) -->
                    <button type="button" id="myBtn" class="btn btn-outline-success">
                      <span class="me-2"><i class="bi bi-person-plus-fill"></i></span>
                      Add Employee
                    </button>

                    <!-- Add Modal HTML -->
                    <div id="myModal" class="modal fade" data-bs-backdrop="static" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">

                            <form class="needs-validation" method="POST">
                              <div class="form-row">
                                <div class="col-md-12 mb-2">
                                  <label for="id">ID <span class="text-danger">*</span> </label>
                                  <input type="text" class="form-control" id="id" name="id"
                                    placeholder="Enter Employee ID" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom01">Name <span class="text-danger">*</span> </label>
                                  <input type="text" class="form-control" id="validationCustom01" name="name"
                                    placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12 mb-2">
                                    <label for="validationCustom03">College <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="validationCustom03" name="college"
                                      placeholder="Enter College" required>
                                  </div>
                                  <div class="col-md-12 mb-2">
                                    <label for="validationCustom04">Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="validationCustom04" name="address"
                                      placeholder="Enter Address" required>
                                  </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                  <label for="validationCustom05">Position <span class="text-danger">*</span> </label>
                                  <input type="text" class="form-control" id="validationCustom05" name="position"
                                    placeholder="Enter Position" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-success">Save</button>
                              </div>
                            </form>
                            <?php
                            if (isset($_POST['id'])) {
                              $sql = "INSERT INTO `employees` (employee_id,`name`,college,`address`,`position`)
                                            VALUES ('" . $_POST['id'] . "','" . $_POST['name'] . "',UPPER('" . $_POST['college'] . "'),'" . $_POST['address'] . "','" . $_POST['position'] . "')";
                              if ($conn->query($sql) === TRUE) {
                                echo '<script>alert("Employees Addedd Successfully!") 
                                                window.location.href="employees.php"</script>';
                              } else {
                                echo '<script>alert("Adding Employee Failed!\n Please Check SQL Connection String!") 
                                                window.location.href="employees.php"</script>';
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
                      <th>ID</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Address</th>
                      <th>Position</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM employees;";
                    $actresult = mysqli_query($conn, $sql);

                    while ($result = mysqli_fetch_assoc($actresult)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $result['employee_id']; ?>
                      </td>
                      <td>
                        <?php echo $result['name']; ?>
                      </td>
                      <td>
                        <?php echo $result['college']; ?>
                      </td>
                      <td>
                        <?php echo $result['address']; ?>
                      </td>
                      <td>
                        <?php echo $result['position']; ?>
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
                      $edit = mysqli_query($conn, "select * from employees where id='" . $result['id'] . "'");
                      $erow = mysqli_fetch_array($edit);
                              ?>
                              <input type="hidden" id="id_u" name="editid" value="<?php echo $erow['id']; ?>"
                                class="form-control" required>
                              <div class="form-group">
                                <label>Employee ID</label>
                                <input type="text" id="name_u" name="editempid"
                                  value="<?php echo $erow['employee_id']; ?>" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name_u" name="editname" value="<?php echo $erow['name']; ?>"
                                  class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>College</label>
                                <input type="college" id="college_u" name="editcollege"
                                  value="<?php echo $erow['college']; ?>" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="address" id="address_u" name="editaddress"
                                  value="<?php echo $erow['address']; ?>" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Position</label>
                                <input type="position" id="position_u" name="editposition"
                                  value="<?php echo $erow['position']; ?>" class="form-control" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" value="2" name="type">
                              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                              <button class="btn btn-info" id="update">Update</button>
                            </div>
                          </form>
                          <?php
                      if (isset($_POST['editid'])) {
                        $sql = "UPDATE employees e
                              SET e.employee_id = '" . $_POST['editempid'] . "',e.name = '" . $_POST['editname'] . "',e.college = UPPER('" . $_POST['editcollege'] . "'),
                              e.address = '" . $_POST['editaddress'] . "',e.position = '" . $_POST['editposition'] . "'
                              WHERE e.id='" . $_POST['editid'] . "'";
                        if ($conn->query($sql) === TRUE) {
                          echo '<script>alert("Employees Edit Successful!") 
                                  window.location.href="employees.php"</script>';
                        } else {
                          echo '<script>alert("Editing Employee Details Failed!\n Please Check SQL Connection String!") 
                                  window.location.href="employees.php"</script>';
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
                      $del = mysqli_query($conn, "select * from employees where id='" . $result['id'] . "'");
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
                        $sql = "DELETE FROM employees  WHERE id='" . $_POST['deleteid'] . "'";
                        if ($conn->query($sql) === TRUE) {
                          echo '<script>alert("Deleted Successfully!") 
                                        window.location.href="employees.php"</script>';
                        } else {
                          echo '<script>alert("Deleting Employee Details Failed!\n Please Check SQL Connection String!") 
                                        window.location.href="employees.php"</script>';
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

  <!-- <script>
    $(document).on('click', '.update', function (e) {
      var id = $(this).attr("data-id");
      var name = $(this).attr("data-name");
      var college = $(this).attr("data-college");
      var address = $(this).attr("data-address");
      var position = $(this).attr("data-position");
      $('#id_u').val(id);
      $('#name_u').val(name);
      $('#college_u').val(college);
      $('#address_u').val(address);
      $('#position_u').val(position);
    });

    $(document).on('click', '#update', function (e) {
      var data = $("#update_form").serialize();
      $.ajax({
        data: data,
        type: "post",
        url: "backend/save.php",
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $('#editEmployeeModal').modal('hide');
            alert('Data updated successfully !');
            location.reload();
          }
          else if (dataResult.statusCode == 201) {
            alert(dataResult);
          }
        }
      });
    });
  </script>

<script>
    $(document).on("click", ".delete", function () {
      var id = $(this).attr("data-id");
      $('#id_d').val(id);

    });
    $(document).on("click", "#delete", function () {
      $.ajax({
        url: "backend/save.php",
        type: "POST",
        cache: false,
        data: {
          type: 3,
          id: $("#id_d").val()
        },
        success: function (dataResult) {
          $('#deleteEmployeeModal').modal('hide');
          $("#" + dataResult).remove();
        }
      });
    });
  </script> -->


</body>

</html>