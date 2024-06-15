<?php
include 'lib/session.php';
Session::checkSession();
$role_id = Session::get('chucnang');
$taikhoan = Session::get('userId');
// Kiểm tra xem session 'chucnang' có tồn tại không
// Khởi tạo biến flag
$all_ones = false;
if (isset($role_id)) {
    // Lặp qua mảng 'chucnang' và in ra từng giá trị
    foreach ($role_id as $giatri) {
        // Kiểm tra nếu giá trị không phải là 1
        if ($giatri == '4') {
            // Nếu có ít nhất một giá trị là 1, đặt biến flag là false và thoát vòng lặp
            $all_ones = true;
            break;
        }
    }
    if($all_ones == false){
        echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'index.php';</script>";
}
?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\lib\database.php');

?>
<?php
include_once 'classes/user.php';
$user = new user();
$list = $user->xemthongtin();

?>
<?php include_once 'lib/header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ TÀI KHOẢN</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Tài khoản</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tài khoản</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ((array) $list as $key => $value) : ?>
                                                <td><?php echo $value['tendangnhap']; ?></td>
                                                <td><?php echo $value['trangthai']; ?></td>
                                                <td><?php echo $value['tenchucnang']; ?></td>
                                                <td>
                                                    <button class="btn edit" data-id="<?php echo $value['tendangnhap']; ?>" onclick="redirectToEditPage(this)">Đổi mật khẩu</button>
                                                    <form id="deleteForm" action="xoa.php?tendangnhap=<?php echo $value['tendangnhap']; ?>" method="post" style="display: inline-block;">
                                                        <input class="btn delete" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    </form>
                                                    <form action="xoa.php?idtamkhoa=<?php echo $value['tendangnhap']; ?>" method="post" style="display: inline-block;">
                                                        <input class="btn black" type="submit" value="Mở/Tạm khóa">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HVH 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn thoát phiên đăng nhập ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên làm việc hiện tại của mình.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    function redirectToEditPage(button) {
        // Lấy giá trị của thuộc tính data-id từ nút được nhấn
        var tendangnhap = button.getAttribute('data-id');
        
        // Chuyển hướng đến trang chỉnh sửa với tham số tendangnhap
        window.location.href = 'suataikhoan.php?tendangnhap=' + tendangnhap;
    }
    </script>
    <script src="js/script.js"></script>
</body>

</html>