<?php include 'header.php'; ?>
<?php 
	require_once '../connect.php';
	$db = new Connect();

	$sql = "SELECT * FROM admin";
    $table = $db->getTable($sql);
    $row = $table[0];
    $hovaten = $row['HoTen'];
    $sodienthoai = $row['SDT'];
    $tendangnhap = $row['TenDangNhap'];
    $matkhau = $row['MatKhau'];
    $id = $row['id'];
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
	<h1 class="h4 mb-2 text-gray-800 bb-tittle">Quản Lý Admin</h1>
	<div class="row">
		<div class="container col-xl-8 col-12">				
		    <form id="admin" method="POST" class="form">                                       
			    <div class="s1psej1j valid changed editMode">
			        <div class="shopLabel">Họ và Tên<span>*</span></div>
			        <div class="shopInput">
			            <input name="txtHovaTen" type="text" id="txtHovaTen" tabindex="1" placeholder="Nhập họ và tên" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($hovaten);?>">            			
			            <i id="trangthaiHovaTen" class="trangthai"></i>
			            <div id="luuyHovaTen" class="shopHelperText info">
			            	<b>Lưu ý:</b> Họ và tên <b>KHÔNG</b> được để trống
			            </div>
			        </div>
			        <div class="clearfix"></div>
			    </div> 
			    <div class="s1psej1j valid changed editMode">
			        <div class="shopLabel">Số Điện Thoại<span>*</span></div>
			        <div class="shopInput">
			            <input name="txtSoDienThoai" type="text" id="txtSoDienThoai" tabindex="2" placeholder="Nhập số điện thoại" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($sodienthoai);?>">
			            <i id="trangthaiSoDienThoai" class="trangthai"></i>
			            <div id="luuySoDienThoai" class="shopHelperText info">
			            	<b>Lưu ý:</b> Số điện thoại <b>KHÔNG</b> được để trống
			            </div>
			        </div>
			        <div class="clearfix"></div>
			    </div>
			    <div class="s1psej1j valid changed editMode">
			        <div class="shopLabel">Tên Đăng Nhập<span>*</span></div>
			        <div class="shopInput">
			            <input name="txtTenDangNhap" type="text" id="txtTenDangNhap" tabindex="3" placeholder="Nhập tên đăng nhập" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($tendangnhap);?>">
			            <i id="trangthaiTenDangNhap" class="trangthai"></i>
			            <div id="luuyTenDangNhap" class="shopHelperText info">
			            	<b>Lưu ý:</b> Tên đăng nhập <b>KHÔNG</b> được để trống
			            </div>
			        </div>
			        <div class="clearfix"></div>
			    </div>
			    <div class="s1psej1j valid changed editMode">
			        <div class="shopLabel">Mật Khẩu<span>*</span></div>
			        <div class="shopInput">
			            <input name="txtMatKhau" type="text" id="txtMatKhau" tabindex="4" placeholder="Nhập mật khẩu" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($matkhau);?>">
			            <i id="trangthaiMatKhau" class="trangthai"></i>
			            <div id="luuyMatKhau" class="shopHelperText info">
			            	<b>Lưu ý:</b> Số điện thoại <b>KHÔNG</b> được để trống
			            </div>
			        </div>
			        <div class="clearfix"></div>
			    </div>                                                                            
		        <div style="text-align:center" class="s60qtjf">                              
		            <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>  
                <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnCapNhatAdmin" style="display: none;">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>                                         
		        </div> 
		    </form>
    	</div>
	</div> 
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hovatenmoi = trim($_POST['txtHovaTen']);
    $sodienthoaimoi = trim($_POST['txtSoDienThoai']);
    $tendangnhapmoi = trim($_POST['txtTenDangNhap']);
    $matkhaumoi = trim($_POST['txtMatKhau']);

    $updates = [];
    $params = [];

    if ($hovatenmoi !== $hovaten) {
        $updates[] = "HoTen = ?";
        $params[] = $hovatenmoi;
    }
    if ($sodienthoaimoi !== $sodienthoai) {
        $updates[] = "SDT = ?";
        $params[] = $sodienthoaimoi;
    }
    if ($tendangnhapmoi !== $tendangnhap) {
        $updates[] = "TenDangNhap = ?";
        $params[] = $tendangnhapmoi;
    }
    if ($matkhaumoi !== $matkhau) {
        $updates[] = "MatKhau = ?";
        $params[] = $matkhaumoi;
    }

    if (!empty($updates)) {
        $sql_update = "UPDATE admin SET " . implode(", ", $updates);
        
        $result = $db->execWithParams($sql_update, array_fill(0, count($params), 's'), $params); 

        if ($result) {
            echo "<script>
                Swal.fire({
                    title: 'Cập nhật thành công!',
                    text: 'Thông tin Admin đã được cập nhật thành công.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000, 
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = '/Admin/quanlyadmin.php';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Đã có lỗi xảy ra trong quá trình cập nhật.',
                    icon: 'error'
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Không có thay đổi',
                text: 'Không có thông tin nào được thay đổi.',
                icon: 'info'
            });
        </script>";
    }
}
?>
<script src="js/quanlyadmin.js"></script>   
<?php include 'footer.php'; ?>