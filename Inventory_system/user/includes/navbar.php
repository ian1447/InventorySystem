<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>

<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >Inventory System</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
          </form>
          <span class="text-white fw-bold"><?php echo $_SESSION['username'];?></span>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-circle"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li class = "dropdown-header">
                  <span class="me-2"><i class="bi bi-person-circle"></i></span>
                  Welcome <?php echo $_SESSION['username'];?>!
                </li>
                  <a class="dropdown-item nav-item" data-toggle="modal" data-target="#settings" href="./update_acc.php">
                  <span class="me-2"><i class="bi bi-gear-fill"></i></span>
                  Account Settings
                </a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="../logout.php">
                  <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
                    Logout</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="modal fade" id="settings" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1>Account Settings</h1>
                </div>
                <form id="" class="form" autocomplete="off">
                  <div class="modal-body">
                    <div class="form-group">
                      <div>
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" require>
                      </div>
                      <div>
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" require>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" clas="btn btn-success">Update</button>
                    <button type="submit" clas="btn btn-danger">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal("toggle");
        });
    });
    </script>
</body>
</html>