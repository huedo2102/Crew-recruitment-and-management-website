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
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\lib\database.php');

?>

<?php
include_once 'classes/user.php';
$user = new user();
$list = $user->xemthongtin2();

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (isset($_POST['submit'])) {
        $result = $user->themquyen($_POST);
        if ($result) {
            echo '<script type="text/javascript">window.location.href = "phanquyen.php";</script>';
        }
    }
    if (isset($_POST['delete'])) {
        $result = $user->xoaquyen($_POST);
        if ($result) {
            echo '<script type="text/javascript"> window.location.href = "phanquyen.php";</script>';
        }
    }
}
?>
<?php include_once 'lib/header.php';?>
    <style>
        .form-add select {
            padding: 10px;
            width: 10%;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            appearance: none;
            background: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"><path fill="none" stroke="%23333" stroke-width="1.5" d="M1 1l4 4 4-4"/></svg>') no-repeat right 10px center;
            background-color: #fff;
            background-size: 10px 5px;
        }
        .form-add input[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            appearance: none;
        }
        .form-add select {
            -moz-appearance: none;
            -webkit-appearance: none;
        }
    </style>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">PHÂN QUYỀN NGƯỜI DÙNG</h1><br><br>
                    <div class="form-add">
            <form action="phanquyen.php" method="post" enctype="multipart/form-data">
                
                <label for="tendangnhap">Tên đăng nhập :</label>
                <select name="tendangnhap" id="tendangnhap" required>
                    <option value="" disabled selected hidden>Chọn tài khoản..</option>
                    <?php
                    // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                    $query2 = "SELECT tendangnhap FROM taikhoan WHERE trangthai = 1";
                    $db2 = new Database();
                    $result2 = $db2->select($query2);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result2) {
                        // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            echo '<option value="' . $row2['tendangnhap'] . '">' . $row2['tendangnhap'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <label for="machucnang">Chức năng :</label>
                <select style = "width: 40%;"  name="machucnang" id="machucnang" required>
                    <option value="" disabled selected hidden>Chọn chức năng..</option>
                    <?php
                    // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                    $query3 = "SELECT * FROM chucnang";
                    $db3 = new Database();
                    $result3 = $db3->select($query3);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result3) {
                        // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            echo '<option value="' . $row3['id'] . '">' . $row3['tenchucnang'] . '</option>';
                        }
                    }
                    ?>
                </select>

                <input class="btn edit" type="submit" value="Thêm" name="submit">
                <input class="btn delete" type="submit" value="Xóa" name="delete">
            </form>
        </div>
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
                                        <th>Chức năng hiện có</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tài khoản</th>
                                        <th>Chức năng hiện có</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if (!empty($list) && is_array($list)) : ?>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($value['tendangnhap']); ?></td>
                                                <td><?php echo htmlspecialchars($value['tenchucnang']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2">Không có dữ liệu</td>
                                        </tr>
                                    <?php endif; ?>

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
    <script src="js/script.js"></script>
</body>

</html>