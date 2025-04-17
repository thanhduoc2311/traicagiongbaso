<?php include 'header.php'; ?>
<link href="/Admin/css/tintuc.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<?php 
	require_once '../connect.php';
	$db = new Connect();
	if (isset($_GET['idtintuc'])) {
		$idtintuc = $_GET['idtintuc'];
	}

	$sql = "SELECT 	tt.idtintuc, 
					tt.tieude, 
					tt.noidung, 
					tt.duongdan, 
					h.urlhinh, 
					h.idhinh
          FROM tintuc AS tt
          LEFT JOIN hinhanhca AS h ON tt.idtintuc = h.idca
          WHERE tt.idtintuc = '" . $idtintuc . "' AND (h.idloai = '7' AND h.urlhinh IS NOT NULL)";

	$result = $db->getTable($sql);

	if ($result) {	    
	    foreach ($result as $row) {
	    	$idtintuc = $row['idtintuc'];
	    	$tieude = $row['tieude'];
	    	$noidung = $row['noidung'];
	    	$duongdan = $row['duongdan'];
	    	$urlhinh = $row['urlhinh'];
	    	$idhinh = $row['idhinh'];
	    }
	} else {
	    echo "Không tìm thấy thông tin cá với ID đã cho.";
	} 
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
	<h1 class="h4 mb-2 text-gray-800 bb-tittle">Chi Tiết Tin Tức: <b class="text-red"><?php echo htmlspecialchars($tieude);?></b></h1>	
	<div class="w-80">				
	    <form id="updatepost" method="POST" class="form" enctype="multipart/form-data"> 
	    	<div class="s1e29l0a pt-0 pb-1">
	    		<input type="file" name="imgDaiDienUpload" id="imgDaiDienUpload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles">
                   <img id="imgDaiDien" src="/<?php echo htmlspecialchars($urlhinh);?>">                               
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
		            <input name="txtTieuDe" type="text" id="txtTieuDe" tabindex="2" placeholder="Nhập tiêu đề" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($tieude);?>">
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
                 	<input name="txtDuongDan" type="text" id="txtDuongDan" tabindex="4" placeholder="VD: ca-tra" autocomplete="off" class="ip-duongdan form-control" value="<?php echo htmlspecialchars($duongdan);?>">
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
		            <textarea name="txtNoiDung" type="text" id="txtNoiDung" tabindex="5" placeholder="Nhập nội dung" autocomplete="off" class="ip-login form-control" style="height: 250px;"><?php echo htmlspecialchars($noidung);?></textarea>
		            <i id="trangthaiNoiDung" class="trangthai"></i>
		            <div id="luuyNoiDung" class="shopHelperText info">
		            	<b>Lưu ý:</b> Nội dung <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div>                                                                           
	        <div style="text-align:center" class="s60qtjf">                              
	            <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>  
                <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnCapNhatTinTuc" style="display: none;">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>                                         
	        </div>
	    </form>
    </div>
</div>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tieudeMoi = trim($_POST['txtTieuDe']);
    $duongdanMoi = trim($_POST['txtDuongDan']);
    $noidungMoi = trim($_POST['txtNoiDung']);

    $updatesTintuc = [];
    $paramsTintuc = [];
    $hasChanges = false; 

    if ($tieudeMoi !== $tieude) {
        $updatesTintuc[] = "tieude = ?";
        $paramsTintuc[] = $tieudeMoi;
        $hasChanges = true;
    }
    if ($duongdanMoi !== $duongdan) {
        $updatesTintuc[] = "duongdan = ?";
        $paramsTintuc[] = $duongdanMoi;
        $hasChanges = true;
    }
    if ($noidungMoi !== $noidung) {
        $updatesTintuc[] = "noidung = ?";
        $paramsTintuc[] = $noidungMoi;
        $hasChanges = true;
    }

    if (!empty($updatesTintuc)) {
        $sql_update_tintuc = "UPDATE tintuc SET " . implode(", ", $updatesTintuc) . " WHERE idtintuc = ?";
        $paramsTintuc[] = $idtintuc; 
        $resultTintuc = $db->execWithParams($sql_update_tintuc, array_fill(0, count($paramsTintuc), 's'), $paramsTintuc);
    }

    $imgFile = $_FILES['imgDaiDienUpload'] ?? null;
    if ($imgFile && $imgFile['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($imgFile['name']);
        $imgPath = '../img/' . $imgName;  
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            $currentImageName = basename($urlhinh); 

            if ($imgName !== $currentImageName) {
                if (move_uploaded_file($imgFile['tmp_name'], $imgPath)) {
                    $imgUrl = 'img/' . $imgName; 
                    $sql_update_hinhanh = "UPDATE hinhanhca SET urlhinh = '" . $imgUrl . "' WHERE idhinh = '" . $idhinh . "'";
                    $resultImage = $db->exec($sql_update_hinhanh);
                    $hasChanges = true; 
                } else {
                    echo "Lỗi khi tải ảnh lên!";
                    exit();
                }
            }
        } else {
            echo "Định dạng ảnh không hợp lệ. Chỉ cho phép .jpg, .jpeg, .png!";
            exit();
        }
    }

    if ($hasChanges) {
        echo "<script>
            Swal.fire({
                title: 'Cập nhật thành công!',
                html: 'Thông tin <strong>" . $tieude . "</strong> đã được cập nhật thành công. Chúng tôi sẽ chuyển bạn về trang Quản Lý Tin Tức',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'quanlytintuc.php';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Không có thay đổi nào!',
                text: 'Không có thông tin nào được thay đổi.',
                icon: 'info'
            });
        </script>";
    }
}
?>
<script src="js/chitiettintuc.js"></script> 
<?php include 'footer.php'; ?>