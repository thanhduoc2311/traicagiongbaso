<?php include 'header.php'; ?>

<?php 
	require_once '../connect.php';
	$db = new Connect();
	if (isset($_GET['idca'])) {
		$idca = $_GET['idca'];
	}

	$sql = "SELECT
				cagiong.idca, 
	            cagiong.tenca, 
	            cagiong.loaica, 
	            cagiong.thongtinca, 
	            cagiong.duongdanca,
	            cagiong.danhmucCha, 
	            hinhanhca.urlhinh, 
	            hinhanhca.idhinh
	        FROM 
	            cagiong 
	        LEFT JOIN 
	            hinhanhca 
	        ON 
	            cagiong.idca = hinhanhca.idca
	        WHERE 
	            cagiong.idca = '" . $idca . "'
	            AND hinhanhca.idloai = cagiong.loaica";

	$result = $db->getTable($sql);

	if ($result) {	    
	    foreach ($result as $row) {
	    	$idca = $row['idca'];
	    	$tenca = $row['tenca'];
	    	$loaica = $row['loaica'];
	    	$thongtinca = $row['thongtinca'];
	    	$duongdanca = $row['duongdanca'];
	    	$danhmuccha = $row['danhmucCha'];
	    	$urlhinh = $row['urlhinh'];
	    	$idhinh = $row['idhinh'];
	    }
	} else {
	    echo "Không tìm thấy thông tin cá với ID đã cho.";
	} 
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
	<h1 class="h4 mb-2 text-gray-800 bb-tittle">Thông Tin: <b class="text-red"><?php echo htmlspecialchars($tenca);?></b></h1>	
	<div class="w-80">				
	    <form id="updatefish" method="POST" class="form" enctype="multipart/form-data"> 
	    	<div class="s1e29l0a pt-0 pb-1">
	    		<input type="file" name="imgDaiDienUpload" id="imgDaiDienUpload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles">
                   <img id="imgDaiDien" src="/<?php echo htmlspecialchars($urlhinh);?>">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgDaiDienUpload"></label>
                   </div>
               </div>
               <div id="luuyAnhDaiDien" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh đại diện <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
            <div class="s1psej1j valid changed editMode">
                <div class="shopLabel">Tùy Chọn Loại<span>*</span></div>
                <div class="shopInput">
                    <select id="slTuyChonThemCa" tabindex="1" name="slTuyChonThemCa" class="form-control">
                        <?php 
                        	$sql = "select idca, tenca from cagiong where danhmucCha = 0";
                        	$result = $db->getTable($sql); 

                        	$selectedValue = ($danhmuccha == 0) ? $idca : $danhmuccha;

							if (!empty($result)) {								
			                    foreach ($result as $row) {
			                        $selected = ($row['idca'] == $selectedValue) ? "selected" : "";
                        			echo "<option value='" . $row['idca'] . "' " . $selected . ">" . htmlspecialchars($row['tenca']) . "</option>";
			                    }
			                }
                        ?>
                    </select>                    
                </div>
                <div class="clearfix"></div>
            </div>
		    <div class="s1psej1j valid changed editMode">
		        <div class="shopLabel">Tên Cá<span>*</span></div>
		        <div class="shopInput">
		            <input name="txtTenCa" type="text" id="txtTenCa" tabindex="2" placeholder="Nhập tên cá" autocomplete="off" class="ip-login form-control" value="<?php echo htmlspecialchars($tenca);?>">
		            <i id="trangthaiTenCa" class="trangthai"></i>
		            <div id="luuyTenCa" class="shopHelperText info">
		            	<b>Lưu ý:</b> Tên cá <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div> 
		    <div class="s1psej1j valid changed editMode">
                <div class="shopLabel">Loại Cá<span>*</span></div>
                <div class="shopInput">
                    <select id="slLoaiCa" tabindex="3" name="slLoaiCa" class="form-control">
                        <option value="0" <?php echo ($loaica == 0) ? 'selected' : ''; ?>>-- Loại Cá --</option>
				        <option value="1" <?php echo ($loaica == 1) ? 'selected' : ''; ?>>Cá Giống</option>
				        <option value="2" <?php echo ($loaica == 2) ? 'selected' : ''; ?>>Cá Kiểng</option>
				        <option value="3" <?php echo ($loaica == 3) ? 'selected' : ''; ?>>Cá Bột</option>
                    </select>
                    <i id="trangthaiLoaiCa" class="trangthai"></i>
                    <div id="luuyLoaiCa" class="shopHelperText info">
                    	<b>Lưu ý:</b> Loại cá <b>KHÔNG</b> được để trống                            
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="s1gkfplr valid changed editMode">
                <div class="shopLabel">Đường dẫn cho cá<span>*</span></div>
             	<div class="shopInput">
                 	<div class="shopFrontUrl" id="txtUrlCa">https://cagiongbaso.com/</div>
                 	<input name="txtDuongDan" type="text" id="txtDuongDan" tabindex="4" placeholder="VD: ca-tra" autocomplete="off" class="ip-duongdan form-control" value="<?php echo htmlspecialchars($duongdanca);?>">
                 	<i id="trangthaiDuongDan" class="trangthai"></i>
                 	<div id="luuyDuongDan" class="shopHelperText info">
                 		<b>Lưu ý:</b> Đường dẫn cá <b>KHÔNG</b> được để trống
                 	</div>
             	</div>
             <div class="clearfix"></div>
             </div>
		    <div class="s1psej1j valid changed editMode">
		        <div class="shopLabel">Thông Tin<span>*</span></div>
		        <div class="shopInput">
		            <textarea name="txtThongTin" type="text" id="txtThongTin" tabindex="5" placeholder="Nhập thông tin" autocomplete="off" class="ip-login form-control" style="height: 250px;"><?php echo htmlspecialchars($thongtinca);?></textarea>
		            <i id="trangthaiThongTin" class="trangthai"></i>
		            <div id="luuyThongTin" class="shopHelperText info">
		            	<b>Lưu ý:</b> Thông tin cá <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div>                                                                           
	        <div style="text-align:center" class="s60qtjf">                              
	            <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>  
                <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnCapNhatCa" style="display: none;">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>                                         
	        </div>
	    </form>
    </div>
</div>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tencaMoi = trim($_POST['txtTenCa']);
    $loaicaMoi = trim($_POST['slLoaiCa']);
    $duongdancaMoi = trim($_POST['txtDuongDan']);
    $thongtincaMoi = trim($_POST['txtThongTin']);
    $danhmucchaMoi = trim($_POST['slTuyChonThemCa']);

    $updatesCagiong = [];
    $paramsCagiong = [];
    $hasChanges = false; 

    if ($tencaMoi !== $tenca) {
        $updatesCagiong[] = "tenca = ?";
        $paramsCagiong[] = $tencaMoi;
        $hasChanges = true;
    }
    if ($loaicaMoi !== $loaica) {
        $updatesCagiong[] = "loaica = ?";
        $paramsCagiong[] = $loaicaMoi;
        $hasChanges = true;
    }
    if ($thongtincaMoi !== $thongtinca) {
        $updatesCagiong[] = "thongtinca = ?";
        $paramsCagiong[] = $thongtincaMoi;
        $hasChanges = true;
    }
    if ($duongdancaMoi !== $duongdanca) {
        $updatesCagiong[] = "duongdanca = ?";
        $paramsCagiong[] = $duongdancaMoi;
        $hasChanges = true;
    }
    if ($danhmucchaMoi !== $danhmuccha && $danhmucchaMoi !== $idca) {
        $updatesCagiong[] = "danhmucCha = ?";
        $paramsCagiong[] = $danhmucchaMoi;
        $hasChanges = true;
    }

    if (!empty($updatesCagiong)) {
        $sql_update_cagiong = "UPDATE cagiong SET " . implode(", ", $updatesCagiong) . " WHERE idca = ?";
        $paramsCagiong[] = $idca; 
        $resultCagiong = $db->execWithParams($sql_update_cagiong, array_fill(0, count($paramsCagiong), 's'), $paramsCagiong);
    }

    $imgFile = $_FILES['imgDaiDienUpload'] ?? null;
    if ($imgFile && $imgFile['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($imgFile['name']);
        $imgPath = '../img/' . $imgName;  
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            $currentImageName = basename($urlhinh); // Lấy tên ảnh hiện tại từ CDSL

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
                html: 'Thông tin <strong>" . $tenca . "</strong> đã được cập nhật thành công. Chúng tôi sẽ chuyển bạn về trang Quản Lý Cá',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'quanlyca.php?loaica=" . $loaica . "';
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
<script src="js/chitietca.js"></script> 
<?php include 'footer.php'; ?>