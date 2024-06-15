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


include_once 'classes/tau.php';


$tau = new tau();
$list = $tau->xemthongtin();
$timkiem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
    if (isset($_POST['submit'])) {
        $result = $tau->insert($_POST);
        if ($result) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    if (isset($_POST['sua'])) {
        $result4 = $tau->update($_POST);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 
    if (isset($_POST['id_xoa'])) {
        $result3 = $tau->delete($_POST['id_xoa']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); ';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! Tàu còn liên quan thông tin khác.");</script>';
            
        }
    }
}
if($timkiem !== ''){
    $list = $tau->timkiemtheoten($timkiem);
}

?>
<?php include_once 'lib/header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ THÔNG TIN TÀU</h1>
                    <div style="margin-top: 20px;margin-bottom: 20px;">
                        <!-- Nút để mở form -->
                        <button class="btn info" id="openFormBtnthemtau" onclick="openFormthemtau()">Thêm</button>
                        
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tàu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã tàu</th>
                                        <th>Tên tàu</th>
                                        <th>Loại tàu</th>
                                        <th>Nơi đăng ký</th>
                                        <th>Trọng tải</th>
                                        <th>Ghi chú</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mã tàu</th>
                                        <th>Tên tàu</th>
                                        <th>Loại tàu</th>
                                        <th>Nơi đăng ký</th>
                                        <th>Trọng tải</th>
                                        <th>Ghi chú</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?=$value['id']?></td>
                                                <td><?=$value['tentau']?></td>
                                                <td><?=$value['tenloaitau']?></td>
                                                <td><?=$value['noidangky']?></td>
                                                <td><?=$value['trongtai']?></td>
                                                <td><?=$value['ghichu']?></td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <button class="btn edit" id="openFormBtnsuatau" data-id="<?=$value['id']?>" onclick="openFormsuatau(event)">Sửa</button>
                                                        <form id="deleteForm" action="tau.php" method="post" >
                                                            <input type="hidden" id="id_xoa" name="id_xoa" value="<?=$value['id']?>">
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
    <div id="myFormthemtau">
        <span class="close" onclick="closeFormthemtau()">&times;</span>
        <h2>Thêm thông tin tàu</h2>
        <form id="myForm" action="tau.php" method="post" enctype="multipart/form-data">
            <label for="id">Mã tàu :<span style="color: red;"> *</span></label>
            <input type="text" id="id" name="id" required><br>
            <label for="tentau">Tên tàu :<span style="color: red;"> *</span></label>
            <input type="text" id="tentau" name="tentau" required><br>
            <label for="loaitau_id">Loại tàu :<span style="color: red;"> *</span></label>
                <select id="loaitau_id" name="loaitau_id" required>
                    <option value="" disabled selected hidden>Chọn loại tàu..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM loaitau";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id'] . '">' . $row2['tenloaitau'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
            <label for="noidangky">Nơi đăng ký :<span style="color: red;"> *</span></label>
            <input type="text" id="noidangky" name="noidangky" required><br>
            <label for="trongtai">Trọng tải :<span style="color: red;"> *</span></label>
            <input type="number" id="trongtai" name="trongtai" required><br>
            <label for="ghichu">Ghi chú :</label>
            <input type="text" id="ghichu" name="ghichu" ><br>
            
            
            <br>
            <input type="submit" name="submit" value="Lưu">
            
        </form>


        
    </div>

    <div id="myFormsuatau">
        <span class="close" onclick="closeFormsuatau()">&times;</span>
        <h2>Cập nhật thông tin tàu</h2>
        <form id="myForm" action="tau.php" method="post" enctype="multipart/form-data">
            <label for="id">Mã tàu :<span style="color: red;"> *</span></label>
            <input type="text" id="id" name="id" readonly><br>
            <label for="tentau">Tên tàu :<span style="color: red;"> *</span></label>
            <input type="text" id="tentau" name="tentau" required><br>
            <label for="loaitau_id">Loại tàu :<span style="color: red;"> *</span></label>
                <select id="loaitau_id" name="loaitau_id" required>
                    <option value="" disabled selected hidden>Chọn loại tàu..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM loaitau";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id'] . '">' . $row2['tenloaitau'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
            <label for="noidangky">Nơi đăng ký :<span style="color: red;"> *</span></label>
            <input type="text" id="noidangky" name="noidangky" required><br>
            <label for="trongtai">Trọng tải :<span style="color: red;"> *</span></label>
            <input type="number" id="trongtai" name="trongtai" required><br>
            <label for="ghichu">Ghi chú:</label>
            <input type="text" id="ghichu" name="ghichu" ><br>
            
            
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