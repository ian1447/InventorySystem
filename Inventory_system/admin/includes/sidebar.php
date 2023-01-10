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
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="./index.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#view"
              >
                <span class="me-2"><i class="bi bi-eye-fill"></i></span>
                <span>View</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="view">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="./employees.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-people-fill"></i
                      ></span>
                      <span>Employees</span>
                    </a>
                  </li>
                  <li>
                    <a href="./supplies.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-stack"></i
                      ></span>
                      <span>Supplies</span>
                    </a>
                  </li>
                  <li>
                    <a href="./categories.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-ui-checks"></i
                      ></span>
                      <span>Categories</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#transactions"
              >
                <span class="me-2"><i class="bi bi-folder-symlink-fill"></i></span>
                <span>Transactions</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="transactions">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="./Treleased.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-box-arrow-up"></i
                      ></span>
                      <span>Released</span>
                    </a>
                  </li>
                  <li>
                    <a href="./Treturned.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-box-arrow-down"></i
                      ></span>
                      <span>Returned</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#monitoring"
              >
                <span class="me-2"><i class="bi bi-folder-check"></i></span>
                <span>Monitoring</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="monitoring">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="./available.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-check2-square"></i
                      ></span>
                      <span>Available</span>
                    </a>
                  </li>
                  <li>
                    <a href="./Mreleased.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-box-arrow-up"></i
                      ></span>
                      <span>Released</span>
                    </a>
                  </li>
                  <li>
                    <a href="./Mreturned.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-box-arrow-down"></i
                      ></span>
                      <span>Returned</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#report"
              >
                <span class="me-2"><i class="bi bi-card-checklist"></i></span>
                <span>Report</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="report">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="./monthlyreport.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-calendar-event-fill"></i
                      ></span>
                      <span>Monthly Report</span>
                    </a>
                  </li>
                  <li>
                    <a href="./monthlyinventory.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-calendar-check-fill"></i
                      ></span>
                      <span>Monthly Inventory</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#about"
              >
                <span class="me-2"><i class="bi bi-person-check-fill"></i></span>
                <span>About</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="about">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="./system.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-code-slash"></i
                      ></span>
                      <span>System</span>
                    </a>
                  </li>
                  <li>
                    <a href="./developer.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person"></i
                      ></span>
                      <span>Developer</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Others
              </div>
            </li>
            <li>
              <a href="./users.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-person-plus-fill"></i></span>
                <span>Users</span>
              </a>
            </li>
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