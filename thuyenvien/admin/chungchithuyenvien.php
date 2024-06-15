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
?>


<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\lib\database.php');
include 'procedure.php';
?>

<?php


include_once 'classes/chungchi.php';

$timkiem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
}
$type = $_GET['type'] ?? '';
$chungchi = new chungchi();
$list = $chungchi->xemthongtin();
// Kiểm tra nếu type không được thiết lập
if($type !== ''){
    if ($type=='expired') {
        $list = $chungchi->tv_hethan();
    }elseif ($type=='expiring') {
        $list = $chungchi->tv_saphethan();
    } else{
        $list = $chungchi->xemthongtin();
    }
    
    // Tiếp tục xử lý dữ liệu...
} else {
    $list = $chungchi->xemthongtin();
}

if($timkiem !== ''){
    $list = $chungchi->timkiemtheoten($timkiem);
}
function formatDate($date, $format = 'd/m/Y') {
    if (empty($date)) {
        return ''; // hoặc giá trị mặc định khác tùy thuộc vào yêu cầu của bạn
    }
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

?>
<?php include_once 'lib/header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">QUẢN LÝ CHỨNG CHỈ THUYỀN VIÊN</h1>
                    <div style="margin-top: 20px;margin-bottom: 20px;">
            
            <form style="display: inline; " action="chungchithuyenvien.php" method="POST">
                <a id="filterButton" style="background-color: red;margin-left: 10px;" href="chungchithuyenvien.php?type=expired"><i class="fa fa-filter" ></i>  Lọc thuyền viên - Chứng chỉ đã đến hạn</a>
                <a id="filterButton" style="background-color: #2196f3;" href="chungchithuyenvien.php?type=expiring"><i class="fa fa-filter" ></i>  Lọc thuyền viên - Chứng chỉ sắp đến hạn</a>
                <a id="filterButton" style="margin-right: 10px;" href="chungchithuyenvien.php?type="><i class="fa fa-filter" ></i>  Hiển thị toàn bộ</a>
            </form><br><br><br>
        </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Mã thuyền viên</th>
                                        <th>Họ và tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Trạng thái</th>
                                        <th>SL chứng chỉ</th>
                                        <th>SL chứng chỉ sắp đến hạn</th>
                                        <th>SL chứng chỉ đã đến hạn</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mã thuyền viên</th>
                                        <th>Họ và tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Trạng thái</th>
                                        <th>SL chứng chỉ</th>
                                        <th>SL chứng chỉ sắp đến hạn</th>
                                        <th>SL chứng chỉ đã đến hạn</th>
                                        <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?php echo $value['matv']; ?></td>
                                                <td><?php echo $value['hoten']; ?></td>
                                                <td><?php echo formatDate($value['ns']); ?></td>
                                                <td><?php echo $value['tt']; ?></td>
                                                <td><?php echo $value['SL']; ?></td>
                                                <td><?php echo $value['SLSHH']; ?></td>
                                                <td><?php echo $value['SLHH']; ?></td>
                                                <td><a href="chitietchungchi.php?idtv=<?php echo $value['matv']; ?>&hoten=<?php echo $value['hoten']; ?>&trangthai=<?php echo $value['trangthai']; ?>">Xem chi tiết..</a></td>
                                                
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