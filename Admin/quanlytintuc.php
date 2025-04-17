<?php include 'header.php'; ?>
<link href="/Admin/css/tintuc.css" rel="stylesheet">
<link href="/Admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php 
    require_once '../connect.php';
    $db = new Connect();
?>
<div class="container-fluid mt-4 pl-1 pr-1">
	<h1 class="h3 mb-2 text-gray-800 pl-3">Quản Lý Tin Tức</h1>   
	<div class="card shadow mb-4">
		<div class="card-body pt-2 pl-2 pr-2">
            <a href="/Admin/themtintuc.php" class="btn btn-success btn-block" style="width: 150px;float: right;font-weight: bold;"><i class='fas fa-plus fa-fw' style="padding-right: 5px"></i>Thêm tin tức
            </a>            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                    <thead>
                        <tr>
                            <th style="width: 200px;text-align: center;vertical-align: middle;">Tiêu Đề</th>            
                            <th style="width: 180px;text-align: center;vertical-align: middle;">Hình Ảnh</th>
                            <th style="width: auto;text-align: center;vertical-align: middle;">Nội Dung</th>
                            <th style="width: 150px;text-align: center;vertical-align: middle;">Đường Dẫn</th>
                            <th style="width: 80px;text-align: center;vertical-align: middle;">Thao Tác</th>               
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php                           
                            $query = "SELECT tt.idtintuc, tt.tieude, tt.noidung, tt.duongdan, h.urlhinh, h.idhinh
                                      FROM tintuc AS tt
                                      LEFT JOIN hinhanhca AS h ON tt.idtintuc = h.idca
                                      WHERE h.idloai = '7' AND h.urlhinh IS NOT NULL";
                            
                            $result = $db->getTable($query); 

                            if (!empty($result)) {
                                foreach ($result as $row) {                                 
                                    $noidung = mb_strlen($row['noidung'], 'UTF-8') > 150 ? mb_substr($row['noidung'], 0, 260, 'UTF-8') . '...' : $row['noidung'];

                                    echo '<tr>';
                                    echo '<td>' . $row['tieude'] . '</td>';
                                    echo '<td style="text-align: center;"><img src="/' . $row['urlhinh'] . '" alt="' . $row['tieude'] . '" class="img-qlca"></td>';
                                    echo '<td>' . $noidung . '</td>';
                                    echo '<td>' . $row['duongdan'] . '</td>';
                                    echo '<td style="text-align: center;">
                                            <a href="/Admin/chitiettintuc.php?idtintuc=' . $row['idtintuc'] . '" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-wrench"></i>
                                                </a>
                                                <a href="#"" class="btn btn-danger btn-circle btn-sm btn-delete" data-id="' . $row['idtintuc'] . '" data-name="' . $row['tieude'] . '" data-image="' . $row['urlhinh'] . '" data-idhinh="' . $row['idhinh'] . '" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                          </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5" style="text-align: center;">Không có dữ liệu</td></tr>';
                            }
                            ?>                    
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="deleteMessage" class="mb-0"></p>
                <div class="text-center">
                  <img id="tintucImage" src="" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                <a class="btn btn-primary" id="btnDeleteTinTuc">Xóa</a>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function() {
    $('.btn-delete').click(function() {
        var tintucId = $(this).data('id');
        var tintucName = $(this).data('name');
        var tintucImage = $(this).data('image');  
        var idImage = $(this).data('idhinh');   

        if (tintucImage.charAt(0) !== '/') {
            tintucImage = '/' + tintucImage;
        }          

        $('#deleteMessage').html('Bạn có muốn xóa tin <strong>"' + tintucName + '"</strong> ra khỏi danh sách?');
        $('#tintucImage').attr('src', tintucImage);
        $('#tintucImage').attr('alt', tintucName);

        $('#btnDeleteTinTuc').data('id', tintucId);
        $('#btnDeleteTinTuc').data('img', tintucImage);
        $('#btnDeleteTinTuc').data('idhinh', idImage);
    });

    document.getElementById('btnDeleteTinTuc').addEventListener('click', function (e) {        
        e.preventDefault();
        var idtintuc = $(this).data('id'); 
        var imageUrl = $(this).data('img');
        var idhinh = $(this).data('idhinh'); 

        $.ajax({
            url: '/Admin/xoatintuc.php', 
            type: 'POST',
            data: { idtintuc: idtintuc, imageUrl: imageUrl, idhinh: idhinh },
            success: function(response) {
                if (response === 'success') {
                    Swal.fire({
			            text: 'Xóa cá thành công',
			            icon: 'success',
			            showConfirmButton: false,
			            timer: 1000, 
			            timerProgressBar: true,
			            willClose: () => {			                
			                location.reload();
			            }
			        });
                } else {
                    Swal.fire({
                        title: 'Xóa không thành công',
                        text: 'Có lỗi xảy ra trong quá trình xóa',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                        title: 'Xóa không thành công',
                        text: 'Xóa thất bại',
                        icon: 'error'
                    });
            }
        });
        $('#deleteModal').modal('hide');
    });
});
</script>
            <!-- End of Main Content -->
<?php include 'footer.php'; ?>