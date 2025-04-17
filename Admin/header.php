<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/logotraitron.png" type="/image/x-icon" />
    <title>Admin Trại Cá Giống Ba So</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Admin/css/admin-traica.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="page-top" class="sidebar-toggled">    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="/img/logotraitron.png" style="width: 60px;">
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="quanlyadmin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Quản lý Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Quản lý Cá</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="quanlyca.php?loaica=1"><img src="/img/caphi.png" style="width: 20px;height: 20px;" /> Cá Giống</a>
                        <a class="collapse-item" href="quanlyca.php?loaica=2"><img src="/img/cakoi.png" style="width: 20px;height: 20px;object-fit: contain;" /> Cá Kiểng</a>
                        <a class="collapse-item" href="quanlyca.php?loaica=3"><img src="/img/cabot.png" style="width: 20px;height: 20px;object-fit: contain;" /> Cá Bột</a>
                    </div>
                </div>
            </li>    

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="quanlyhinhanh.php">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Quản lý Hình Ảnh</span>
                </a>                
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="quanlybanner.php">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Quản lý Banner</span>
                </a>
            </li>  

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="quanlytintuc.php">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Quản lý Tin Tức</span>
                </a>
            </li>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>                

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">                                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline title-user small" id="spTitle"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/admin.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown"> 
                                <div>
                                    <img src="img/admin.png" />
                                    <p id="txtTitle"></p>
                                </div>                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>            
                <!-- End of Topbar -->                        
                <?php
                    if (!isset($_COOKIE['BaSo_Login'])) {            
                        echo "<script>
                            window.location.href = '/Admin/dangnhap.php';
                        </script>";
                    } else {            
                        $user_phone = $_COOKIE['BaSo_Login'];
                        require_once '../connect.php';        
                        $db = new Connect();
                        
                        // Thực hiện truy vấn SQL
                        $sql = "SELECT * FROM admin WHERE TenDangNhap = '" . $user_phone . "'";
                        $table = $db->getTable($sql);

                        $row = $table[0];
                    }
                ?>  
<script>
    var userPhone = "<?php echo $row['HoTen']; ?>";
    document.getElementById('txtTitle').innerHTML = userPhone;
    document.getElementById('spTitle').innerHTML = userPhone;    
</script>
