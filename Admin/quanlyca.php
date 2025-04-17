<?php include 'header.php'; ?>
<link href="/Admin/css/quanlyca.css" rel="stylesheet">
<link href="/Admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php 
	require_once '../connect.php';
	$db = new Connect();
	if (isset($_GET['loaica'])) {
		$loaica = $_GET['loaica'];
	}
	if ($loaica == 1)
	{
		$danhmuc = "Cá Giống";
	} 
	if ($loaica == 2)
	{
		$danhmuc = "Cá Kiểng";
	} 
	if ($loaica == 3)
	{
		$danhmuc = "Cá Bột";
	} 
?>
<div class="container-fluid mt-4 pl-1 pr-1">
	<h1 class="h3 mb-2 text-gray-800 pl-3">Quản Lý Cá</h1>   
	<div class="card shadow mb-4">
		<div class="card-header py-2 d-flex justify-content-between align-items-center">		    
		    <h5 class="m-0 font-weight-bold text-primary"><?php echo $danhmuc; ?></h5>		    		   
		    <a href="/Admin/themca.php" class="btn btn-success" style="width: 110px;font-weight: bold;">
		        <i class='fas fa-plus fa-fw' style="padding-right: 5px"></i>Thêm cá
		    </a> 
		</div>
		<div class="card-body pt-2 pl-2 pr-2">			                    
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 200px;text-align: center;vertical-align: middle;">Tên Cá</th>            
                            <th style="width: 180px;text-align: center;vertical-align: middle;">Hình Ảnh</th>
                            <th style="width: 180px;text-align: center;vertical-align: middle;">Thông Tin</th>            
                            <th style="width: 150px;text-align: center;vertical-align: middle;">Đường Dẫn</th>
                            <th style="width: 80px;text-align: center;vertical-align: middle;">Thao Tác</th>               
                        </tr>
                    </thead>
                    <tbody>
                    	<?php							
							$query = "
							    SELECT g1.idca, g1.tenca, g1.loaica, g1.danhmucCha, g1.thongtinca, g1.duongdanca, MAX(h.urlhinh) AS urlhinh, h.idhinh
							    FROM cagiong AS g1
							    LEFT JOIN cagiong AS g2 ON g1.idca = g2.danhmucCha
							    LEFT JOIN hinhanhca AS h ON g1.idca = h.idca
							    WHERE g1.loaica = '" . $loaica . "' AND (h.idloai = '" . $loaica . "' OR h.idloai = g1.loaica)
							    GROUP BY g1.idca, g1.tenca, g1.loaica, g1.danhmucCha, g1.thongtinca, g1.duongdanca
							    ORDER BY 
							        CASE 
							            WHEN g1.danhmucCha = 0 THEN g1.idca
							            ELSE g1.danhmucCha
							        END, 
							        g1.idca";
							
							$result = $db->getTable($query); 

							if (!empty($result)) {
							    foreach ($result as $row) {							        
							        if ($row['danhmucCha'] != 0) {							            
							            $tenca = '&rdca; ' . $row['tenca'];
							            $alignStyle = 'text-align: center;';
							        } else {							            
							            $tenca = $row['tenca'];
							            $alignStyle = '';
							        }
									$thongtinca = mb_strlen($row['thongtinca'], 'UTF-8') > 150 ? mb_substr($row['thongtinca'], 0, 150, 'UTF-8') . '...' : $row['thongtinca'];

							        echo '<tr>';
							        echo '<td style="' . $alignStyle . '">' . $tenca . '</td>';
							        echo '<td style="text-align: center;"><img src="/' . $row['urlhinh'] . '" alt="' . $tenca . '" class="img-qlca"></td>';
							        echo '<td>' . $thongtinca . '</td>';
							        echo '<td>' . $row['duongdanca'] . '</td>';
							        echo '<td style="text-align: center;">
							                <a href="/Admin/chitietca.php?idca=' . $row['idca'] . '" class="btn btn-warning btn-circle btn-sm">
							                        <i class="fas fa-wrench"></i>
							                    </a>
							                    <a href="#"" class="btn btn-danger btn-circle btn-sm btn-delete" data-id="' . $row['idca'] . '" data-name="' . $row['tenca'] . '" data-image="' . $row['urlhinh'] . '" data-idhinh="' . $row['idhinh'] . '" data-toggle="modal" data-target="#deleteModal">
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
		          <img id="caImage" src="" />
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
        var caId = $(this).data('id');
        var caName = $(this).data('name');
        var caImage = $(this).data('image');
        var idImage = $(this).data('idhinh'); 

        if (caImage.charAt(0) !== '/') {
        	caImage = '/' + caImage;
    	}

         $('#deleteMessage').html('Bạn có muốn xóa <strong>"' + caName + '"</strong> ra khỏi danh sách?');
        
    	$('#caImage').attr('src', caImage);
    	$('#caImage').attr('alt', caName);

        $('#btnDeleteTinTuc').data('id', caId);
        $('#btnDeleteTinTuc').data('img', caImage);
        $('#btnDeleteTinTuc').data('idhinh', idImage);

    });

    document.getElementById('btnDeleteTinTuc').addEventListener('click', function (e) {
        e.preventDefault();
        var idca = $(this).data('id'); 
        var imageUrl = $(this).data('img'); 
        var idhinh = $(this).data('idhinh'); 
     
        $.ajax({
		    url: '/Admin/xoaca.php',
		    type: 'POST',
		    data: { idca: idca, imageUrl: imageUrl, idhinh: idhinh },
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
		        } else if (response === 'cannot_delete') {
		            Swal.fire({
		                title: 'Không thể xóa',
		                text: 'Cá này không thể bị xóa vì nó đang được sử dụng làm danh mục cha cho cá khác.',
		                icon: 'warning'
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

<?php include 'footer.php'; ?>