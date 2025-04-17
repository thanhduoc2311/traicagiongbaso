<?php include 'header.php'; ?>
<?php 
	require_once '../connect.php';
	$db = new Connect();

	$sql = "SELECT id, LinkAnh FROM bannertrangchu";
	$banners = $db->getTable($sql); 

	$banner1 = !empty($banners[0]['LinkAnh']) ? $banners[0]['LinkAnh'] : '/img/noimage-br.png';
	$banner2 = !empty($banners[1]['LinkAnh']) ? $banners[1]['LinkAnh'] : '/img/noimage-br.png';
	$banner3 = !empty($banners[2]['LinkAnh']) ? $banners[2]['LinkAnh'] : '/img/noimage-br.png';
?>
<link rel="stylesheet" type="text/css" href="/Admin/css/form.css">
<div class="container container-fluid mt-4">
    <h1 class="h4 mb-2 text-gray-800 bb-tittle">Quản Lý Banner</h1>
    <div class="w-80">
    	<form id="banner" method="POST" class="form" enctype="multipart/form-data">     		
	    	<div class="s1e29l0a pt-0 pb-1">
	    		<label class="text-center w-100 h3 mb-0">Banner 1</label>
	    		<input type="file" name="imgBanner1Upload" id="imgBanner1Upload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles" id="dvBanner1">
                   <img id="imgBanner1" src="/<?php echo $banner1; ?>">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgBanner1Upload"></label>
                   </div>
               </div>
               <div id="luuyAnhBanner1" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh banner <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
            <div class="s1e29l0a pt-0 pb-1">
            	<label class="text-center w-100 h3 mb-0 mt-2">Banner 2</label>
	    		<input type="file" name="imgBanner2Upload" id="imgBanner2Upload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles" id="dvBanner2">
                   <img id="imgBanner2" src="/<?php echo $banner2; ?>">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgBanner2Upload"></label>
                   </div>
               </div>
               <div id="luuyAnhBanner2" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh banner <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
            <div class="s1e29l0a pt-0 pb-1">
            	<label class="text-center w-100 h3 mb-0 mt-2">Banner 3</label>
	    		<input type="file" name="imgBanner3Upload" id="imgBanner3Upload" accept=".jpg,.jpeg,.png" style="display: none;">
               <div class="shopCoverBox vehicles" id="dvBanner3">
                   <img id="imgBanner3" src="/<?php echo $banner3; ?>">                               
                   <div class="coverUpload">
                       <label class="editCoverIcon" for="imgBanner3Upload"></label>
                   </div>
               </div>
               <div id="luuyAnhBanner3" class="shopHelperText info text-center mt-1">
                    <b>Lưu ý:</b> Ảnh banner <b>KHÔNG</b> được bỏ trống
                </div>                                                     
            </div>
            <div style="text-align:center" class="s60qtjf">                              
	            <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnLuu">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>  
                <button type="submit" class="btn btn-primary khthanthiet-form-password w-50 btnLuu" id="btnCapNhatBanner" style="display: none;">
                    <i class="fas fa-download"></i>
                    Cập Nhật
                </button>                                         
	        </div>
        </form>
    </div>
</div>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hasChanges = false;

    // Kiểm tra và cập nhật ảnh Banner 1
    $imgBanner1File = $_FILES['imgBanner1Upload'] ?? null;
    if ($imgBanner1File && $imgBanner1File['error'] === UPLOAD_ERR_OK) {
        $imgBanner1Name = basename($imgBanner1File['name']);
        $imgBanner1Path = '../img/' . $imgBanner1Name;
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension1 = strtolower(pathinfo($imgBanner1Path, PATHINFO_EXTENSION));

        if (in_array($fileExtension1, $allowedExtensions)) {
            $currentBanner1 = basename($banner1); // Lấy tên ảnh hiện tại từ cơ sở dữ liệu

            if ($imgBanner1Name !== $currentBanner1) {
                if (move_uploaded_file($imgBanner1File['tmp_name'], $imgBanner1Path)) {
                    $imgBanner1Url = 'img/' . $imgBanner1Name;
                    $sql_update_banner1 = "UPDATE bannertrangchu SET LinkAnh = '" . $imgBanner1Url . "' WHERE id = 1";
                    $resultBanner1 = $db->exec($sql_update_banner1);
                    $hasChanges = true;
                } else {
                    echo "Lỗi khi tải ảnh Banner 1 lên!";
                    exit();
                }
            }
        } else {
            echo "Định dạng ảnh Banner 1 không hợp lệ. Chỉ cho phép .jpg, .jpeg, .png!";
            exit();
        }
    }

    // Kiểm tra và cập nhật ảnh Banner 2
    $imgBanner2File = $_FILES['imgBanner2Upload'] ?? null;
    if ($imgBanner2File && $imgBanner2File['error'] === UPLOAD_ERR_OK) {
        $imgBanner2Name = basename($imgBanner2File['name']);
        $imgBanner2Path = '../img/' . $imgBanner2Name;
        $fileExtension2 = strtolower(pathinfo($imgBanner2Path, PATHINFO_EXTENSION));

        if (in_array($fileExtension2, $allowedExtensions)) {
            $currentBanner2 = basename($banner2); // Lấy tên ảnh hiện tại từ cơ sở dữ liệu

            if ($imgBanner2Name !== $currentBanner2) {
                if (move_uploaded_file($imgBanner2File['tmp_name'], $imgBanner2Path)) {
                    $imgBanner2Url = 'img/' . $imgBanner2Name;
                    $sql_update_banner2 = "UPDATE bannertrangchu SET LinkAnh = '" . $imgBanner2Url . "' WHERE id = 2";
                    $resultBanner2 = $db->exec($sql_update_banner2);
                    $hasChanges = true;
                } else {
                    echo "Lỗi khi tải ảnh Banner 2 lên!";
                    exit();
                }
            }
        } else {
            echo "Định dạng ảnh Banner 2 không hợp lệ. Chỉ cho phép .jpg, .jpeg, .png!";
            exit();
        }
    }

    // Kiểm tra và cập nhật ảnh Banner 3
    $imgBanner3File = $_FILES['imgBanner3Upload'] ?? null;
    if ($imgBanner3File && $imgBanner3File['error'] === UPLOAD_ERR_OK) {
        $imgBanner3Name = basename($imgBanner3File['name']);
        $imgBanner3Path = '../img/' . $imgBanner3Name;
        $fileExtension3 = strtolower(pathinfo($imgBanner3Path, PATHINFO_EXTENSION));

        if (in_array($fileExtension3, $allowedExtensions)) {
            $currentBanner3 = basename($banner3); // Lấy tên ảnh hiện tại từ cơ sở dữ liệu

            if ($imgBanner3Name !== $currentBanner3) {
                if (move_uploaded_file($imgBanner3File['tmp_name'], $imgBanner3Path)) {
                    $imgBanner3Url = 'img/' . $imgBanner3Name;
                    $sql_update_banner3 = "UPDATE bannertrangchu SET LinkAnh = '" . $imgBanner3Url . "' WHERE id = 3";
                    $resultBanner3 = $db->exec($sql_update_banner3);
                    $hasChanges = true;
                } else {
                    echo "Lỗi khi tải ảnh Banner 3 lên!";
                    exit();
                }
            }
        } else {
            echo "Định dạng ảnh Banner 3 không hợp lệ. Chỉ cho phép .jpg, .jpeg, .png!";
            exit();
        }
    }

    // Kiểm tra nếu có thay đổi
    if ($hasChanges) {
        echo "<script>
            Swal.fire({
                title: 'Cập nhật thành công!',
                text: 'Banner đã được cập nhật thành công.',
                icon: 'success',
            	showConfirmButton: false,
                timer: 2000, 
                timerProgressBar: true,
                willClose: () => {
                    window.location.href = '/Admin/quanlybanner.php';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Không có thay đổi nào!',
                text: 'Không có banner nào được thay đổi.',
                icon: 'info'
            });
        </script>";
    }
}
?>
<script>
    document.getElementById('imgBanner1Upload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgBanner1').src = e.target.result; 
            }
            reader.readAsDataURL(file); 
        }
    });
    document.getElementById('imgBanner2Upload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgBanner2').src = e.target.result; 
            }
            reader.readAsDataURL(file); 
        }
    });
    document.getElementById('imgBanner3Upload').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgBanner3').src = e.target.result; 
            }
            reader.readAsDataURL(file); 
        }
    });
</script>
<script src="js/quanlybanner.js"></script>
<?php include 'footer.php'; ?>