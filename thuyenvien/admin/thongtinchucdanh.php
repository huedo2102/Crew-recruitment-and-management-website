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
        if ($giatri == '3') {
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
include_once 'classes/chucdanh.php';

$chucdanh = new chucdanh();
$list = $chucdanh->xemthongtin();
$timkiem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
    if (isset($_POST['submit'])) {
        $result = $chucdanh->insert($_POST);
        if ($result) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    if (isset($_POST['sua'])) {
        $result4 = $chucdanh->update($_POST);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 
    if (isset($_POST['id_xoa'])) {
        $result3 = $chucdanh->delete($_POST['id_xoa']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); ';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! Còn liên quan thông tin khác.");</script>';
            
        }
    }
}
if($timkiem !== ''){
    $list = $chucdanh->timkiemtheoten($timkiem);
}

?>

<?php include_once 'lib/header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ CHỨC DANH</h1>
                    <div style="margin-top: 20px;margin-bottom: 20px;">
                        <!-- Nút để mở form -->
                        <button class="btn info" id="openFormBtnthemchucdanh" onclick="openFormthemchucdanh()">Thêm</button>
                        
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách chức danh</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã chức danh</th>
                                        <th>Tên chức danh</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mã chức danh</th>
                                        <th>Tên chức danh</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?=$value['id_chucdanh']?></td>
                                                <td><?=$value['tenchucdanh']?></td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <button class="btn edit" id="openFormBtnsuachucdanh" data-id="<?=$value['id_chucdanh']?>" onclick="openFormsuachucdanh(event)">Sửa</button>
                                                        <form id="deleteForm" action="thongtinchucdanh.php" method="post" >
                                                            <input type="hidden" id="id_xoa" name="id_xoa" value="<?=$value['id_chucdanh']?>">
                                                            <input class="btn delete" style="" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                        </form>
                                                    </div>
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
    
    <!-- Form -->
    <div id="myFormthemchucdanh" style="display: none;">
        <span class="close" onclick="closeFormthemchucdanh()">&times;</span>
        <h2>Thêm chức danh</h2>
        <form id="myForm" action="thongtinchucdanh.php" method="post" enctype="multipart/form-data">
            <label for="tenchucdanh">Tên chức danh :<span style="color: red;"> *</span></label>
            <input type="text" id="tenchucdanh" name="tenchucdanh" required><br>
            <br>
            <input type="submit" name="submit" value="Lưu">
            
        </form>
        
    </div>

    <div id="myFormsuachucdanh" style="display: none;">
        <span class="close" onclick="closeFormsuachucdanh()">&times;</span>
        <h2>Cập nhật tên chức danh</h2>
        <form id="myForm" action="thongtinchucdanh.php" method="post" enctype="multipart/form-data">
            <label for="id">Mã chức danh :<span style="color: red;"> *</span></label>
            <input type="text" id="id" name="id" readonly><br>
            <label for="tenchucdanh">Tên chức danh :<span style="color: red;"> *</span></label>
            <input type="text" id="tenchucdanh" name="tenchucdanh" required><br>
            
            <br>
            <input type="submit" name="sua" value="Lưu">
            
        </form>
        
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