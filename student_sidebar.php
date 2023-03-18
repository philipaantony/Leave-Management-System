<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="student_home.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="student_update_profile.php?val= <?php echo $id = $_SESSION['id'];?>">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Edit Profile</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="student_apply_leave.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Apply Leave</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="student_view_leave.php">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">View Applied Leaves</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="student_pending_leave.php">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Pending Applications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="student_approved_leaves.php">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Approved Applications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages/samples/error-404.html">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Feedback</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/documentation/documentation.html">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Documentation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>