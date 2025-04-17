$(document).ready(function() {
  $('#dataTable').DataTable({
    "searching": false,    // Ẩn thanh tìm kiếm
    "pageLength": 10,      // Hiển thị 10 entries mỗi trang
    "lengthChange": false, // Ẩn tùy chọn thay đổi số lượng entries
    "ordering": false,     // Ẩn chức năng lọc và sắp xếp cột
    "info": false,         // Ẩn thông báo "Showing 1 to 10 of 57 entries"
    "language": {
      "paginate": {
        "next": "",        // Ẩn nút "Next"
        "previous": ""     // Ẩn nút "Previous"
      }
    }
  });
});