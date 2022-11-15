<?php
include_once('../../dataAccess/connection.php');
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al Sakb | Computers</title>
    <link rel="icon" type="image/x-icon" href="../../static/dist/img/alsakb logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../static/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../static/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../static/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../static/plugins/summernote/summernote-bs4.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Customer CSS -->
    <link rel="stylesheet" href="../../static/dist/css/style.css">

</head>

<style>
.dropdown-menu {
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
}
</style>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../../static/dist/img/alsakb logo.png" width="25%">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img src="../../static/dist/img/avatar4.png" alt=""
                            class="user-avatar-md rounded-circle" width="30px"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info bg-info">
                            <h5 class="mb-0 text-white nav-user-name p-3 text-center text-capitalize">
                                <?php echo $_SESSION['username']; ?>!</h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href=""><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item" href="../../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../includes/main.php" class="brand-link text-center mx-auto d-flex justify-content-center">
                <img src="../../static/dist/img/alsakb logo1.jpg" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>

                        </li>

                        <!-- Admin  -->
                        <?php if($role_id == 1 && $department == 11) { ?>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-lock"></i>
                                <p> Users <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../users/users_dashboard.php" class="nav-link">
                                        <i class="fa fa-user-circle nav-icon" style="font-size: 12px;"></i>
                                        <p> Admin </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 8 && $department == 4 )) { ?>

                        <!-- HR -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> HR <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../employee/employee_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-person nav-icon" style="font-size: 12px;"></i>
                                        <p> HR </i>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-comment-dollar nav-icon" style="font-size: 12px;"></i>
                                        <p> Payroll</i>
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($department == 5 )) { ?>

                        <!-- Sales -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-receipt"></i>
                                <p> Sales <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../sales/sales_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-landmark nav-icon" style="font-size: 12px;"></i>
                                        <p> Sales </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../e-commerce/e-commerce_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-earth-americas fa-user nav-icon"
                                            style="font-size: 12px;"></i>
                                        <p>E-Commerce </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($department == 5 )) { ?>

                        <!-- Accounts -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <p> Finance <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../accounts/accounts_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-coins nav-icon" style="font-size: 12px;"></i>
                                        <p> Accounts </p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2)) { ?>

                        <!-- Inventory -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-warehouse"></i>
                                <p> Warehouse <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-warehouse nav-icon" style="font-size: 12px;"></i>
                                        <p> Inventory <i class="right fas fa-angle-left"></i> </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../inventory/warehouse_dashboard.php" class="nav-link">
                                                <i class="fa-solid fa-people-line nav-icon"
                                                    style="font-size: 12px;"></i>
                                                <p>Team Leader</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../inventory/warehouse_member_sales_order.php" class="nav-link">
                                                <i class="fa-sharp fa-solid fa-chalkboard-user nav-icon"
                                                    style="font-size: 12px;"></i>
                                                <p>Team Member </p>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <?php if(($role_id == 1 && $department == 11) || ($role_id == 4 || $department == 2)) { ?>

                                <li class="nav-item">
                                    <a href="../inventory/warehouse_stock_report.php" class="nav-link">
                                        <i class="fa-solid fa-cubes-stacked nav-icon" style="font-size: 12px;"></i>
                                        <p> Stock Report </p>
                                    </a>
                                </li>

                                <?php } ?>

                                <?php if(($role_id == 1 && $department == 11) || ($role_id == 4 || $department == 22) || ($role_id == 11 && $department == 22))  { ?>
                                <!-- Part -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-screwdriver-wrench nav-icon" style="font-size: 12px;"></i>
                                        <p> Part <i class="right fas fa-angle-left"></i> </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../part/part_warehouse_leader_dashboard.php" class="nav-link">
                                                <i class="fa-solid fa-people-line nav-icon"
                                                    style="font-size: 12px;"></i>
                                                <p>Leader Dashboard</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../part/part_create_form.php" class="nav-link">
                                                <i class="fa-solid fa-plus nav-icon" style="font-size: 12px;"></i>
                                                <p>Add Part</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../part/part_stock_dashboard.php" class="nav-link">
                                                <i class="fa-solid fa-cubes nav-icon" style="font-size: 12px;"></i>
                                                <p>Part Stock Report</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <?php } ?>

                            </ul>
                        </li>
                        <?php } ?>


                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 1) ) { ?>

                        <!-- Production -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p> Production <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../production/production_team_leader_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-people-line nav-icon" style="font-size: 12px;"></i>
                                        <p> Team Leader </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../production/production_technician_dashboard.php" class="nav-link">
                                        <i class="fa-sharp fa-solid fa-chalkboard-user nav-icon"
                                            style="font-size: 12px;"></i>
                                        <p> Technician </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Motherboard -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-keyboard"></i>
                                <p> Motherboard <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-people-line nav-icon" style="font-size: 12px;"></i>
                                        <p> Team Leader</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_technician.php" class="nav-link">
                                        <i class="fa-sharp fa-solid fa-chalkboard-user nav-icon"
                                            style="font-size: 12px;"></i>
                                        <p> Motherboard Technician </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_technician.php" class="nav-link">
                                        <i class="fa-sharp fa-solid fa-laptop nav-icon" style="font-size: 12px;"></i>
                                        <p> Laptop Technician </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- LCD -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-display"></i>
                                <p> LCD <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-display nav-icon" style="font-size: 12px;"></i>
                                        <p> LCD </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Battery -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-battery"></i>
                                <p> Battery <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-battery nav-icon" style="font-size: 12px;"></i>
                                        <p> Battery </p>
                                    </a>

                                </li>
                            </ul>
                        </li>


                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Bodywork -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-laptop"></i>
                                <p> Bodywork <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-laptop nav-icon" style="font-size: 12px;"></i>
                                        <p> Bodywork </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Sanding -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-soap"></i>
                                <p> Sanding <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-soap nav-icon" style="font-size: 12px;"></i>
                                        <p> Sanding </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Painting -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-spray-can"></i>
                                <p> Painting <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-spray-can nav-icon" style="font-size: 12px;"></i>
                                        <p> Painting </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- QC -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p> QC <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-stethoscope nav-icon" style="font-size: 12px;"></i>
                                        <p> QC </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if($role_id == 1 && $department == 11) { ?>


                        <!-- Packing -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p> Packing <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-boxes nav-icon" style="font-size: 12px;"></i>
                                        <p> Packing </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>


                        <li class="nav-header text-uppercase">Other</li>

                        <?php if($role_id == 1 && $department == 11) { ?>

                        <!-- Email -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p> Mailbox <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/mailbox/read-mail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon" style="font-size: 12px;"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->

                        <?php } ?>


                        <!-- Search -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p> Search <i class="fas fa-angle-left right"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../search/general_search.php" class="nav-link">
                                        <i class="fa-solid fa-search nav-icon" style="font-size: 12px;"></i>
                                        <p> Search </p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                    <?php include('footer.php') ?>