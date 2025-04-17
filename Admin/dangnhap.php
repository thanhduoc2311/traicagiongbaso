<!DOCTYPE html>
<html lang="en">

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
    <link href="css/admin-traica.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gradient-primary">
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../connect.php';                            
    // Lấy giá trị tài khoản và mật khẩu từ form
    $user_phone = trim($_POST['user_phone']);
    $user_password = trim($_POST['user_password']);
    
    // Kiểm tra trống ở phía server
    if (empty($user_phone) || empty($user_password)) {
        echo "<script>
            Swal.fire({
                title: 'Thông báo',
                text: 'Tài khoản và Mật khẩu không được để trống',
                icon: 'error'
            });
        </script>";
    } else {
        $db = new Connect();
        $connect = $db->getConnection();
        // Thực hiện truy vấn kiểm tra tài khoản
        $stmt = $connect->prepare("SELECT * FROM admin WHERE TenDangNhap = ? AND MatKhau = ?");
        $stmt->bind_param("ss", $user_phone, $user_password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Kiểm tra kết quả
        if ($result->num_rows > 0) {
            // Đăng nhập thành công - tạo cookie "BaSo_Login"
            setcookie("BaSo_Login", $user_phone, time() + (86400 * 30), "/");
            
            // Chuyển hướng đến trang admin bằng JavaScript
            echo "<script>
                Swal.fire({
                    title: 'Đăng nhập thành công!',
                    text: 'Bạn đã đăng nhập thành công vào hệ thống. Chúng tôi sẽ chuyển bạn về trang chủ.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000, 
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = '/Admin/index.php';
                    }
                });
            </script>";
            exit;
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Thông báo',
                    text: 'Tài khoản hoặc Mật khẩu không đúng',
                    icon: 'error'
                });
            </script>";
        }
    }
}
?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="wrapper-container mb-3 mb-lg-5">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                                        <form method="POST" class="khthanthiet-form" enctype="application/x-www-form-urlencoded">        
                                            <header class="khthanthiet-form-header">
                                                <span class="khthanthiet-form-header-avatar" data-avatar=""></span>
                                                <p class="khthanthiet-form-header-title">Đăng nhập</p>
                                            </header>
                                            <div class="khthanthiet-formwrapper active">                                  
                                                <section class="khthanthiet-form-boxitem khthanthiet-form-boxitem--password">                    
                                                    <div class="mb-4 i14mr5f8">                                
                                                        <input type="text" class="form-control bg-white ire0wc i3z0z0s" id="txtTaiKhoan" autocomplete="off" name="user_phone">
                                                        <label for="txtTaiKhoan">Tài khoản</label>
                                                        <img src="/img/cancel.png" id="clearInputTaiKhoan" class="clear-iconSoDienThoai" style="display: none;" />
                                                        <p class="d-none mb-0 text-danger khthanthiet-form-boxitem--password-alert" id="txtErrorTaiKhoan"></p>
                                                    </div>            
                                                    <div class="mb-3 i14mr5f8">                                
                                                        <input type="password" class="form-control bg-white ire0wc i3z0z0s" id="txtMatKhau" name="user_password" autocomplete="off">
                                                        <label for="txtMatKhau">Mật khẩu</label>
                                                        <img src="/img/cancel.png" id="clearInputMatKhau" class="clear-iconSoDienThoai" style="display: none;" />      
                                                        <p class="d-none mb-0 text-danger khthanthiet-form-boxitem--password-alert" id="txtErrorPassWord"></p>
                                                    </div>
                                                    <hr style="margin-top: 25px;">                                  
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary khthanthiet-form-password w-100">
                                                            <i class="fas fa-sign-in-alt"></i>
                                                            Đăng nhập
                                                        </button>
                                                    </div>                                           
                                                </section>                                                
                                            </div>                                                    
                                        </form>   
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/dangnhap.js"></script>    
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>