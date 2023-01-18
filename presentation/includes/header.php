<?php
include_once('../../dataAccess/connection.php');
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$logged_in_id = $_SESSION['logged_in_id'];
if(isset($_POST['logged_out'])){
    echo 
    $query_2 = "UPDATE users_logged_in_time SET logged_out = CURRENT_TIMESTAMP WHERE logged_in_id = '{$logged_in_id}' LIMIT 1";
    $result_set = mysqli_query($connection, $query_2);
    if($result_set){
        header('Location: ../../logout.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Al Sakb | Computers</title>
    <link rel="icon" type="image/x-icon" href="../../static/dist/img/alsakb logo.png">

    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../static/dist/fonts/Poppins-Regular.ttf">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../static/plugins/fontawesome-pro/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../static/dist/css/adminlte.css">
    <!-- overlayScrollbars Side Navbar -->
    <link rel="stylesheet" href="../../static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Customer CSS -->
    <link rel="stylesheet" href="../../static/dist/css/style.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!--  -->
    <link rel="stylesheet" href="../../static/plugins/select2/css/select2.min.css">


</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <div id="loader"></div>
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
                        <form action="" method="POST">
                            <button class="dropdown-item" name="logged_out" type="submit"><i
                                    class="fas fa-power-off mr-2"></i>Logout</a>
                        </form>
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

                        <!-- Warehouse Team Leader -->
                        <?php if($role_id == 4 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../inventory/warehouse_dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Warehouse Member -->
                        <?php } if($role_id == 10 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../inventory/warehouse_member_sales_order.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Production Team Leader -->
                        <?php } if($role_id == 4 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../production/production_team_leader_dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Production Technician -->
                        <?php } if($role_id == 6 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../production/production_technician_dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Part  -->
                        <?php } if($role_id == 4 && $department == 20) { ?>
                        <li class="nav-item menu-open">
                            <a href="../part/part_warehouse_leader_dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- QC  -->
                        <?php } if($role_id == 4 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../qc/create_mfg.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Packing  -->
                        <?php } if($role_id == 4 && $department == 11) { ?>
                        <li class="nav-item menu-open">
                            <a href="../packing/packing.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home Page </p>
                            </a>
                        </li>

                        <!-- Admin  -->
                        <?php } if($role_id == 1 && $department == 11) { ?>

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

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) ) { ?>

                        <!-- HR -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> HR <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../employee/employee_dashboard.php" class="nav-link">
                                        <i class="fa fa-user nav-icon" style="font-size: 12px;"></i>
                                        <p> HR </i>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-comment-dollar nav-icon" style="font-size: 12px;"></i>
                                        <p> Payroll</i>
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($department == 5)) { ?>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-receipt"></i>
                                <p> Sales <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-landmark nav-icon" style="font-size: 12px;"></i>
                                        <p>
                                            Sales
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <!-- <li class="nav-item">
                                            <a href="../sales/quatations.php" class="nav-link">
                                                <i class="fa-solid fa-receipt nav-icon" style="font-size: 12px;"></i>
                                                <p>Quataions</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fa-solid fa-files nav-icon" style="font-size: 12px;"></i>
                                                <p>Sales Order</p>
                                            </a>
                                        </li> -->
                                        <?php if($department == 5 && $role_id == 5) { ?>
                                        <li class="nav-item">
                                            <a href="../sales/orders.php" class="nav-link">
                                                <i class="fa-solid fa-files nav-icon" style="font-size: 12px;"></i>
                                                <p>Orders</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="../sales/customers.php" class="nav-link">
                                                <i class="fa-solid fa-people nav-icon" style="font-size: 12px;"></i>
                                                <p>Customers</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../sales/create_post.php" class="nav-link">
                                                <i class="fa-solid fa-universal-access nav-icon"
                                                    style="font-size: 12px;"></i>
                                                <p>Daily Task</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../sales/sales_dashboard.php" class="nav-link">
                                                <i class="fa-solid fa-universal-access nav-icon"
                                                    style="font-size: 12px;"></i>
                                                <p>Sales Dashboard</p>
                                            </a>
                                        </li>
                                        <?php } if($department == 5 && $role_id == 8) { ?>
                                        <li class="nav-item">
                                            <a href="../sales/sales_team_leader_dashboard.php" class="nav-link">
                                                <i class="fa-solid fa-user-group nav-icon" style="font-size: 12px;"></i>
                                                <p>Team Leader</p>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php if($department == 16) { ?>
                                <li class="nav-item">
                                    <a href="../e-commerce/e_commerce_dashboard.php" class="nav-link">
                                        <i class="fa-brands fa-amazon nav-icon" style="font-size: 12px;"></i>
                                        <p>E-Commerce </p>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>


                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Accounts -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <p> Finance <i class="right fas fa-angle-left"></i> </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../accounts/accounts_dashboard.php" class="nav-link">
                                        <i class="fa fa-coins nav-icon" style="font-size: 12px;"></i>
                                        <p> Accounts </p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) ) { ?>

                        <!-- Inventory -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-warehouse"></i>
                                <p> Warehouse <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../inventory/warehouse_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-people-line nav-icon" style="font-size: 12px;"></i>
                                        <p>Warehouse Dashboard</p>
                                    </a>
                                </li>

                                <!-- Part -->
                                <li class="nav-item">
                                    <a href="../inventory/warehouse_member_sales_order.php" class="nav-link">
                                        <i class="fa fa-chalkboard-user nav-icon" style="font-size: 12px;"></i>
                                        <p>Team Member </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 20) ) { ?>

                        <!-- Part -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-gears"></i>
                                <p> Part Warehouse <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../part/part_warehouse_leader_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-people-line nav-icon" style="font-size: 12px;"></i>
                                        <p>Leader Dashboard</p>
                                    </a>
                                </li>

                                <!-- Part -->
                                <li class="nav-item">
                                    <a href="../part/part_stock_dashboard.php" class="nav-link">
                                        <i class="fa fa-cubes nav-icon" style="font-size: 12px;"></i>
                                        <p>Part Stock Report</p>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) ||($role_id == 2 && $department == 18)) { ?>

                        <!-- Production -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p> Production <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../production/production_team_leader_dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-people-group nav-icon" style="font-size: 12px;"></i>
                                        <p> Team Leader </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../production/production_technician_dashboard.php" class="nav-link">
                                        <i class="fa fa-chalkboard-user nav-icon" style="font-size: 12px;"></i>
                                        <p> Technician </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Motherboard -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-keyboard"></i>
                                <p> Motherboard <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_dashboard.php" class="nav-link">
                                        <i class="fa fa-people-line nav-icon" style="font-size: 12px;"></i>
                                        <p> Team Leader</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_technician.php" class="nav-link">
                                        <i class="fa fa-chalkboard-user nav-icon" style="font-size: 12px;"></i>
                                        <p> Motherboard Technician </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../motherboard/motherboard_technician.php" class="nav-link">
                                        <i class="fa fa-laptop nav-icon" style="font-size: 12px;"></i>
                                        <p> Laptop Technician </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>


                        <!-- Performance -->
                        <?php if(($department == 5 && $role_id == 5) || ($department == 5 && $role_id == 8) || ($department == 16)){ ?>
                        <li class="nav-item d-none">
                            <a href="../performance/performance_record.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-display"></i>
                                <p> Performance <i class="right fas fa-angle-left"></i> </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($department == 19){ ?>
                        <li class="nav-item">
                            <a href="../performance/qc_performance_record.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-display"></i>
                                <p> Performance <i class="right fas fa-angle-left"></i> </p>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Battery -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-battery"></i>
                                <p> Battery <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-battery nav-icon" style="font-size: 12px;"></i>
                                        <p> Battery </p>
                                    </a>

                                </li>
                            </ul>
                        </li>


                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Bodywork -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p> Bodywork <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-laptop nav-icon" style="font-size: 12px;"></i>
                                        <p> Bodywork </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Sanding -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-soap"></i>
                                <p> Sanding <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-soap nav-icon" style="font-size: 12px;"></i>
                                        <p> Sanding </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- Painting -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-spray-can"></i>
                                <p> Painting <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-spray-can nav-icon" style="font-size: 12px;"></i>
                                        <p> Painting </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18)) { ?>

                        <!-- QC -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p> QC <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../qc/new_create_mfg.php" class="nav-link">
                                        <i class="fa fa-stethoscope nav-icon" style="font-size: 12px;"></i>
                                        <p> QC </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 13)) { ?>


                        <!-- Packing -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p> Packing <i class="right fas fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="../packing/packing_dashboard.php" class="nav-link">
                                        <i class="fa fa-boxes nav-icon" style="font-size: 12px;"></i>
                                        <p> Packing </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>


                        <li class="nav-header text-capitalize">Inventory</li>

                        <?php if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1) || ($role_id == 4 && $department == 1) ) { ?>

                        <li class="nav-item">
                            <a href="../search/search_inventory_id.php" class="nav-link">
                                <i class="fa fa-search nav-icon" style="font-size: 12px;"></i>
                                <p> Search Device</p>
                            </a>
                        </li>

                        <?php } if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) ) { ?>

                        <li class="nav-item">
                            <a href="../search/search_sales_order.php" class="nav-link">
                                <i class="fa fa-folder-open nav-icon" style="font-size: 12px;"></i>
                                <p> Search Sales Order </p>
                            </a>
                        </li>

                        <?php } if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 2) || ($role_id == 10 && $department == 2) || ($role_id == 5 && $department == 5) || ($role_id == 8 && $department == 5) || ($role_id == 5 && $department == 19)) { ?>

                        <li class="nav-item">
                            <a href="../inventory/warehouse_stock_report.php" class="nav-link">
                                <i class="fa fa-cubes-stacked nav-icon" style="font-size: 12px;"></i>
                                <p> Laptop Inventory </p>
                            </a>
                        </li>

                        <?php } if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 20) || ($role_id == 6 && $department == 1) ) { ?>

                        <li class="nav-item">
                            <a href="../part/part_stock_dashboard.php" class="nav-link">
                                <i class="fa fa-cubes nav-icon" style="font-size: 12px;"></i>
                                <p>Part Stock Report</p>
                            </a>
                        </li>

                        <?php } ?>

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