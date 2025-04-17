<?php include 'header.php'; ?>
<link href="/Admin/css/tintuc.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<?php 
	require_once '../connect.php';
	$connect = new Connect();
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
	<h1 class="h4 mb-2 text-gray-800 bb-tittle">Thêm Tin Tức</h1>	
	<div class="w-80">				
	    <form id="addpost" method="POST" class="form" enctype="multipart/form-data"> 
	    	<div class="s1e29l0a pt-0 pb-1">
	    		<input type="file" name="imgDaiDienUpload" id="imgDaiDienUpload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles">
                   <img id="imgDaiDien">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgDaiDienUpload"></label>
                   </div>
               </div>
               <div id="luuyAnhDaiDien" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh tin tức <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
		    <div class="s1psej1j valid changed editMode">
		        <div class="shopLabel">Tiêu Đề<span>*</span></div>
		        <div class="shopInput">
		            <input name="txtTieuDe" type="text" id="txtTieuDe" tabindex="2" placeholder="Nhập tiêu đề" autocomplete="off" class="ip-login form-control">
		            <i id="trangthaiTieuDe" class="trangthai"></i>
		            <div id="luuyTieuDe" class="shopHelperText info">
		            	<b>Lưu ý:</b> Tiêu đề <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div> 		    
            <div class="s1gkfplr valid changed editMode">
                <div class="shopLabel">Đường Dẫn<span>*</span></div>
             	<div class="shopInput">
                 	<div class="shopFrontUrl" id="txtUrlTinTuc">https://cagiongbaso.com/tin-tuc/</div>
                 	<input name="txtDuongDan" type="text" id="txtDuongDan" tabindex="4" placeholder="VD: ca-tra" autocomplete="off" class="ip-duongdan form-control">
                 	<i id="trangthaiDuongDan" class="trangthai"></i>
                 	<div id="luuyDuongDan" class="shopHelperText info">
                 		<b>Lưu ý:</b> Đường dẫn <b>KHÔNG</b> được để trống
                 	</div>
             	</div>
             <div class="clearfix"></div>
             </div>
		    <div class="s1psej1j valid changed editMode">
		        <div class="shopLabel">Nội Dung<span>*</span></div>
		        <div class="shopInput">
		            <textarea name="txtNoiDung" type="text" id="txtNoiDung" tabindex="5" placeholder="Nhập nội dung" autocomplete="off" class="ip-login form-control" style="height: 250px;"></textarea>
		            <i id="trangthaiNoiDung" class="trangthai"></i>
		            <div id="luuyNoiDung" class="shopHelperText info">
		            	<b>Lưu ý:</b> Nội dung <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div>                                                                           
	        <div style="text-align:center" class="s60qtjf">                              
	            <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>  
                <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnThemTinTuc" style="display: none;">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>                                         
	        </div>
	    </form>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tieuDe = $_POST['txtTieuDe'];
    $duongDan = $_POST['txtDuongDan'];
    $noiDung = $_POST['txtNoiDung'];

	if (isset($_FILES['imgDaiDienUpload']) && $_FILES['imgDaiDienUpload']['error'] == 0) {
	    $uploadDir = '../img/'; 
	    $fileName = basename($_FILES['imgDaiDienUpload']['name']);
	    $targetFilePath = $uploadDir . $fileName;

	    if (move_uploaded_file($_FILES['imgDaiDienUpload']['tmp_name'], $targetFilePath)) {	        
	        $urlHinh = 'img/' . $fileName;
	    } else {
	        echo "Lỗi khi tải lên file ảnh.";
	    }
	}

    $sqlTintuc = "INSERT INTO tintuc (tieude, noidung, duongdan, ngaydang) 
                  VALUES (?, ?, ?, NOW())";
    $arrParameterName = ['tieude', 'noidung', 'duongdan'];
    $paramsTinTuc = [$tieuDe, $noiDung, $duongDan];

    $result = $connect->execWithParams($sqlTintuc, $arrParameterName, $paramsTinTuc);

    if ($result === false) {
        die("Lỗi khi thêm tin tức: " . $connect->errorInfo()[2]);  
    }

    $idTinTucMoi = $connect->getConnection()->insert_id;

    if (!empty($urlHinh)) {
        $idLoai = 7;
        $sqlHinhanh = "INSERT INTO hinhanhca (idca, urlhinh, idloai, ngaydang) 
                       VALUES (?, ?, ?, NOW())";
        $arrParameterHinh = ['idca', 'urlhinh', 'idloai'];
        $paramsHinhanh = [$idTinTucMoi, $urlHinh, $idLoai];

        $resultHinhanh = $connect->execWithParams($sqlHinhanh, $arrParameterHinh, $paramsHinhanh);

        if ($resultHinhanh === false) {
            die("Lỗi khi thêm ảnh: " . $connect->errorInfo()[2]);
        }
    }

    echo "<script>
            Swal.fire({
                title: 'Thành Công!',
                html: 'Bạn đã thêm thành công tin <strong>" . htmlspecialchars($tieuDe, ENT_QUOTES, 'UTF-8') . "</strong> vào hệ thống. Chúng tôi sẽ chuyển bạn về trang Quản Lý Tin Tức',
                icon: 'success',
                }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = 'quanlytintuc.php';
                      }
                    });
          </script>";
}
?>
<script>
    document.getElementById('imgDaiDienUpload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgDaiDien').src = e.target.result; 
            }
            reader.readAsDataURL(file); 
        }
    });
</script>
<script src="js/themtintuc.js"></script> 
<?php include 'footer.php'; ?>