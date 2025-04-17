<?php include 'header.php'; ?>
<?php 
	require_once '../connect.php';
	$db = new Connect();
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
	<h1 class="h4 mb-2 text-gray-800 bb-tittle">Thêm Cá</h1>	
	<div class="w-80">				
	    <form id="addfish" method="POST" class="form" enctype="multipart/form-data"> 
	    	<div class="s1e29l0a pt-0 pb-1">
	    		<input type="file" name="imgDaiDienUpload" id="imgDaiDienUpload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles">
                   <img id="imgDaiDien">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgDaiDienUpload"></label>
                   </div>
               </div>
               <div id="luuyAnhDaiDien" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh đại diện <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
            <div class="s1psej1j valid changed editMode">
                <div class="shopLabel">Tùy Chọn Thêm Cá<span>*</span></div>
                <div class="shopInput">
                    <select id="slTuyChonThemCa" tabindex="1" name="slTuyChonThemCa" class="form-control">
                        <?php 
                        	$sql = "select idca, tenca from cagiong where danhmucCha = 0";
                        	$result = $db->getTable($sql); 

							if (!empty($result)) {
								echo "<option value='0'>Thêm Cá Mới</option>";
							    foreach ($result as $row) {	
							    	echo "<option value='" . $row['idca'] . "'>" . $row['tenca'] . "</option>";
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
		            <input name="txtTenCa" type="text" id="txtTenCa" tabindex="2" placeholder="Nhập tên cá" autocomplete="off" class="ip-login form-control">
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
                        <option value="0">-- Loại Cá --</option>
                        <option value="1">Cá Giống</option>
                        <option value="2">Cá Kiểng</option>
                        <option value="3">Cá Bột</option>
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
                 	<input name="txtDuongDan" type="text" id="txtDuongDan" tabindex="4" placeholder="VD: ca-tra" autocomplete="off" class="ip-duongdan form-control">
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
		            <textarea name="txtThongTin" type="text" id="txtThongTin" tabindex="5" placeholder="Nhập thông tin" autocomplete="off" class="ip-login form-control" style="height: 250px;"></textarea>
		            <i id="trangthaiThongTin" class="trangthai"></i>
		            <div id="luuyThongTin" class="shopHelperText info">
		            	<b>Lưu ý:</b> Thông tin cá <b>KHÔNG</b> được để trống
		            </div>
		        </div>
		        <div class="clearfix"></div>
		    </div>                                                                           
	        <div style="text-align:center" class="s60qtjf">                              
	            <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>  
                <button type="submit" class="btn btn-warning khthanthiet-form-password w-50 btnLuu" id="btnThemCa" style="display: none;">
                    <i class="fas fa-download"></i>
                    Lưu
                </button>                                         
	        </div>
	    </form>
    </div>
</div>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuychonThemCa = $_POST['slTuyChonThemCa'] ?? '';
    $tenCa = $_POST['txtTenCa'] ?? '';
    $loaiCa = $_POST['slLoaiCa'] ?? '';
    $duongDanCa = $_POST['txtDuongDan'] ?? '';
    $thongTinCa = $_POST['txtThongTin'] ?? '';

    if (isset($_FILES['imgDaiDienUpload'])) {
        $imgFile = $_FILES['imgDaiDienUpload'];
        $imgName = basename($imgFile['name']);
        $imgPath = '../img/' . $imgName;  
        
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Định dạng ảnh không hợp lệ. Chỉ cho phép .jpg, .jpeg, .png!";
            exit();
        }

        if (move_uploaded_file($imgFile['tmp_name'], $imgPath)) {
            $imgUrl = 'img/' . $imgName;  
        } else {
            echo "Lỗi khi tải ảnh lên!";
            exit();
        }
    }

    $sqlInsertCagiong = "INSERT INTO cagiong (tenca, loaica, duongdanca, thongtinca, danhmucCha) VALUES (?, ?, ?, ?, ?)";
    $paramsCagiong = [$tenCa, $loaiCa, $duongDanCa, $thongTinCa, $tuychonThemCa];

    if ($db->execWithParams($sqlInsertCagiong, ['tenca', 'loaica', 'duongdanca', 'thongtinca', 'danhmucCha'], $paramsCagiong)) {

        $idCaMoi = $db->getConnection()->insert_id;

        $sqlInsertHinhanhCa = "INSERT INTO hinhanhca (idca, urlhinh, idloai, ngaydang) VALUES (?, ?, ?, NOW())";
        $paramsHinhanhCa = [$idCaMoi, $imgUrl, $loaiCa];

        if ($db->execWithParams($sqlInsertHinhanhCa, ['idca', 'urlhinh', 'idloai'], $paramsHinhanhCa)) {
            echo "<script>
                Swal.fire({
                    title: 'Thêm cá thành công',
                    html: 'Bạn đã thêm cá <strong>" . $tenCa . "</strong> thành công vào hệ thống. Chúng tôi sẽ chuyển bạn về trang Quản Lý Cá',
                    icon: 'success'
                    }).then((result) => {
		              if (result.isConfirmed) {
		                  window.location.href = 'quanlyca.php?loaica=" . $loaiCa . "';
		              }
		            });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Đã có lỗi xảy ra trong quá trình thêm ảnh.',
                    icon: 'error'
                });
            </script>";
        }
    } else {
         echo "<script>
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Đã có lỗi xảy ra trong quá trình thêm cá.',
                    icon: 'error'
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
<script src="js/themca.js"></script> 
<?php include 'footer.php'; ?>