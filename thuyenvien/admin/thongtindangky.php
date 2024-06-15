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
        if ($giatri == '2') {
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
function formatDate($date, $format = 'd/m/Y') {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}
?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\lib\database.php');

?>

<?php


include_once 'classes/thongtindangky.php';

$thongtindangky = new thongtindangky();
$list = $thongtindangky->xemthongtin();
if (isset($_GET['subject'])){
    $list = $thongtindangky->loc_dadangky($_GET['subject']);
}
$timkiem = '';
// Xử lý khi có yêu cầu cập nhật trạng thái nhiệm vụ
if (isset($_GET['task_id']) && isset($_GET['is_completed'])) {
    $task_id2 = intval($_GET['task_id']);
    $is_completed2 = intval($_GET['is_completed']) === 1 ? 1 : 0;

    $result7 = $thongtindangky->update($task_id2,$is_completed2);
    // Tải lại trang sau khi cập nhật
    echo "<script>window.location.href='thongtindangky.php';</script>";
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
    
    
    if (isset($_POST['id_xoa'])) {
        $result3 = $thongtindangky->delete($_POST['id_xoa']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); ';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại!");</script>';
            
        }
    }
}
if($timkiem !== ''){
    $list = $thongtindangky->timkiemtheoten($timkiem);
}

?>
<?php include_once 'lib/header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ THÔNG TIN ĐĂNG KÝ</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách đăng ký</h6>
                        </div><br>
                        <form style="display: inline;margin-left: auto; margin-right: 20px; " name="form1" id="form1" action="thongtindangky.php" method="GET">
                
                            <select style="color: gray;margin-left: 20px;font-size: 20px; padding: 5px; border-radius: 10px;"  name="subject" id="subject">
                                <option value="" disabled selected hidden>Trạng thái..</option>
                                <option value="1">Đã liên lạc</option>
                                <option value="0">Chưa liên lạc</option>
                            </select>
                            
                            <input class="btn info" style="margin-left: 20px;font-size: 17px;" type="submit" value="Lọc">
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã đăng ký</th>
                                            <th>Họ tên</th>
                                            <th>Ngày sinh</th>
                                            <th>Số CCCD</th>
                                            <th>Địa chỉ</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Ngày nhận</th>
                                            <th>File đính kèm - CV</th>
                                            <th>Đã liên lạc</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mã đăng ký</th>
                                            <th>Họ tên</th>
                                            <th>Ngày sinh</th>
                                            <th>Số CCCD</th>
                                            <th>Địa chỉ</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Ngày nhận</th>
                                            <th>File đính kèm - CV</th>
                                            <th>Đã liên lạc</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?=$value['madangky']?></td>
                                                <td><?=$value['hoten']?></td>
                                                <td><?=formatDate($value['ngaysinh'])?></td>
                                                <td><?=$value['cccd']?></td>
                                                <td><?=$value['diachi']?></td>
                                                <td><?=$value['sdt']?></td>
                                                <td><?=$value['email']?></td>
                                                <td><?=formatDate($value['ngaynhan'])?></td>
                                                <?php
                                                $file_cv = str_replace("admin/", "", $value['file_cv']);
                                                ?>
                                                <td><a href="<?php echo $file_cv; ?>" download onclick="return confirm('Bạn muốn tải file xuống ?')">Xem..</a></td>
                                                <td>
                                                <?php
                                                $checked = $value['trangthai'] == 1 ? 'checked' : '';

                                                $is_completed_value = $value['trangthai'] == 1 ? 0 : 1;  // Giá trị đảo ngược để cập nhật
                                                
                                                echo '<input type="checkbox" onclick="window.location.href=\'?task_id=' . $value['madangky'] . '&is_completed=' . $is_completed_value . '\'" ' . $checked . '>';
                                                
                                                
                                                ?>
                                                
                                                </td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <a class="btn edit" style="text-decoration: none;" href="themmoithuyenvien.php?iddk=<?php echo $value['madangky']; ?>">Thêm hồ sơ</a>
                                                        <form id="deleteForm" action="thongtindangky.php" method="post" >
                                                            <input type="hidden" id="id_xoa" name="id_xoa" value="<?=$value['madangky']?>">
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

</body>

</html>