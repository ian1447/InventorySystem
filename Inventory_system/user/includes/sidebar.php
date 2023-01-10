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

<!-- offcanvas -->
<div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
                <li>
                  <a href="./available.php" class="nav-link px-3">
                    <span class="me-2"
                      ><i class="bi bi-check2-square"></i
                    ></span>
                    <span>Available</span>
                  </a>
                </li>
                <li>
                  <a href="./borrowed.php" class="nav-link px-3">
                    <span class="me-2"
                      ><i class="bi bi-box-seam"></i
                    ></span>
                     <span>Items Borrowed</span>
                   </a>
                </li>
              </ul>
            </div>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
    
</body>
</html>