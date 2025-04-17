
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Trại Cá Giống Ba So 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng Xuất</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn muốn đăng xuất?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                    <a class="btn btn-primary" id="btnDangXuat">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('btnDangXuat').addEventListener('click', function (e) {
        e.preventDefault(); // Ngăn chặn việc chuyển hướng ngay lập tức
        $('#logoutModal').modal('hide');
        // Hiển thị thông báo đăng xuất thành công
        Swal.fire({
            title: 'Đăng xuất thành công!',
            text: 'Bạn đã đăng xuất khỏi hệ thống. Chúng tôi sẽ chuyển bạn về trang đăng nhập.',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000, // Thời gian hiển thị thông báo (3000ms = 3 giây)
            timerProgressBar: true,
            willClose: () => {
                // Sau khi thông báo đóng, chuyển hướng đến trang logout.php để xử lý đăng xuất
                window.location.href = 'dangxuat.php';
            }
        });
    });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/Admin/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="/Admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/Admin/js/demo/datatables-demo.js"></script>
</body>

</html>