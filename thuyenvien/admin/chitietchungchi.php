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

?>

<?php


include_once 'classes/chungchi.php';
$list="";
$hoten="";
$trangthai="";
$idtv="";
if (isset($_GET['idtv'])) {
    $chungchi = new chungchi();
    $list = $chungchi->xemthongtintheoid($_GET['idtv']);
    $hoten = $_GET['hoten'];
    $trangthai = $_GET['trangthai'];
    $idtv=$_GET['idtv'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ///Cập nhật chứng chỉ
    if (isset($_POST['id_thuyenvien'])) {
        $chungchi = new chungchi();
        $result = $chungchi->insert($_POST);
        
        if ($result) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        
        }else {
            echo '<script>alert("Lưu không thành công! Số giấy tờ bị trùng lặp, vui lòng thử lại. ");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
            
        }
    } 
    if (isset($_POST['id_sua'])) {
        $chungchi = new chungchi();
        $result4 = $chungchi->update($_POST);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    
}

?>
<!-- Hàm PHP để kiểm tra ngày hết hạn và trả về class CSS -->
<?php
function kiemtraNgayHetHan($ngayhethan) {
    // Chuyển ngày hết hạn sang định dạng Unix timestamp
    $ngayhethan_timestamp = strtotime($ngayhethan);
    
    // Lấy ngày hiện tại
    $ngayhientai = strtotime(date('Y-m-d'));

    // Tính số ngày còn lại đến ngày hết hạn
    $so_ngay_con_lai = ($ngayhethan_timestamp - $ngayhientai) / (60 * 60 * 24);

    // Kiểm tra xem ngày hết hạn đã qua hay sắp đến
    if ($so_ngay_con_lai < 1) {
        // Nếu đã qua ngày hết hạn, trả về class 'het-han' (màu đỏ)
        return 'het-han';
    } elseif ($so_ngay_con_lai < 30) {
        // Nếu sắp đến ngày hết hạn (trong vòng 30 ngày), trả về class 'sap-het-han' (màu cam)
        return 'sap-het-han';
    } else {
        // Ngược lại, trả về class rỗng
        return '';
    }
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
<style>
        
       
        /* Thiết lập kiểu cho nút */
        #filterButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            float: right;
            text-decoration: none;
        }

        #filterButton:hover {
            background-color: #45a049;
        }
        
        .het-han {
            background-color: #e74a3bab; /* Màu nền đỏ cho ngày hết hạn đã qua */
        }

        .sap-het-han {
            background-color: #ebb057c9;
        }
        
    </style>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3>DANH SÁCH CHỨNG CHỈ THUYỀN VIÊN - <?php echo "<i style='font-style: italic; opacity: 0.6;'>$hoten</i>"; ?></h3>
                    <div>
                        <button class="btn info" id="openFormBtnthemchungchi" onclick="openFormthemchungchi()">Thêm mới</button>
                        <a href="chungchithuyenvien.php" style="float: right;margin-right: 160px;">
                            <i class="fa fa-arrow-left"></i>
                            Quay lại
                        </a>
                    </div><br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách chứng chỉ</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Số giấy tờ</th>
                                        <th>Loại chứng chỉ</th>
                                        <th>Tên chứng chỉ</th>
                                        <th>Ngày cấp</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Ghi chú</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Số giấy tờ</th>
                                        <th>Loại chứng chỉ</th>
                                        <th>Tên chứng chỉ</th>
                                        <th>Ngày cấp</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Ghi chú</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if (isset($list) && is_array($list)) : ?>
                                        <?php foreach ($list as $key => $value) : ?>
                                            <?php if (isset($value['sogiayto'])) : ?>
                                            <tr data-id="<?php echo $value['sogiayto']; ?>" onclick="showDetail(this)">
                                                <td><?php echo $value['sogiayto']; ?></td>
                                                <td><?php echo $value['tenloaichungchi']; ?></td>
                                                <td><?php echo $value['tenchungchi']; ?></td>
                                                <td><?php echo formatDate($value['ngaycap']); ?></td>
                                                <td class="<?php echo kiemtraNgayHetHan($value['ngayhethan']); ?>"><?php echo formatDate($value['ngayhethan']); ?></td>
                                                <td><?php echo $value['ghichu']; ?></td>
                                                <td>
                                                    
                                                    <button class="btn edit" id="openFormBtnsuachungchi" data-id="<?php echo $value['sogiayto']; ?>" onclick="openFormsuachungchi(event)">Sửa</button>
                                                    <form id="deleteForm" action="xoa.php?id_giayto=<?php echo $value['sogiayto']; ?>" method="post" style="display: inline-block;">
                                                        <input class="btn delete" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
    <div id="myFormthemchungchi">
        <span class="close" onclick="closeFormthemchungchi()">&times;</span>
        <h2>Thêm thông tin chứng chỉ</h2>
        <form id="myForm" action="chitietchungchi.php" method="post" enctype="multipart/form-data">
            <br>
            <label for="sogiayto">Số giấy tờ :<span style="color: red;"> *</span></label>
            <input type="text" id="sogiayto" name="sogiayto" required><br>
            <label for="loaichungchi">Loại chứng chỉ :<span style="color: red;"> *</span></label>
                <select id="loaichungchi" name="loaichungchi" required>
                    <option value="" disabled selected hidden>Loại chứng chỉ..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM loaichungchi";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id_loaichungchi'] . '">' . $row2['tenloaichungchi'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
            <input type="hidden" id="id_thuyenvien" name="id_thuyenvien" value="" >
            <label for="tenchungchi">Tên chứng chỉ :<span style="color: red;"> *</span></label>
            <input type="text" id="tenchungchi" name="tenchungchi" required><br>
            <label for="ngaycap">Ngày cấp :<span style="color: red;"> *</span></label>
            <input type="date" id="ngaycap" name="ngaycap" placeholder="Ngày cấp.." required><br>
            <label for="ngayhethan	">Ngày hết hạn :<span style="color: red;"> *</span></label>
            <input type="date" id="ngayhethan" name="ngayhethan" placeholder="Ngày hết hạn.." required><br>
            <span id="error-message" style = "display:none;color: red; text-align: center;">Thời gian cấp phải trước thời gian hết hạn.<br><br></span>
            <label for="ghichu">Ghi chú:</label>
            <input type="text" id="ghichu" name="ghichu" ><br>
            
            
            <br>
            <input type="submit" name="submit" value="Lưu">
            
        </form>


        
    </div>
    <div id="myFormsuachungchi">
        <span class="close" onclick="closeFormsuachungchi()">&times;</span>
        <h2>Cập nhật thông tin chứng chỉ</h2>
        <form id="myForm" action="chitietchungchi.php" method="post" enctype="multipart/form-data">
            <br>
            <label for="sogiayto">Số giấy tờ :</label>
            <input type="text" id="sogiayto" name="sogiayto" readonly><br>
            <label for="loaichungchi">Loại chứng chỉ :<span style="color: red;"> *</span></label>
                <select id="loaichungchi" name="loaichungchi" required>
                    <option value="" disabled selected hidden>Loại chứng chỉ..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM loaichungchi";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id_loaichungchi'] . '">' . $row2['tenloaichungchi'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
            <input type="hidden" id="id_sua" name="id_sua" value="" >
            <label for="tenchungchi">Tên chứng chỉ :<span style="color: red;"> *</span></label>
            <input type="text" id="tenchungchi" name="tenchungchi" required><br>
            <label for="ngaycap2">Ngày cấp :<span style="color: red;"> *</span></label>
            <input type="date" id="ngaycap2" name="ngaycap" placeholder="Ngày cấp.." required><br>
            <label for="ngayhethan2">Ngày hết hạn :<span style="color: red;"> *</span></label>
            <input type="date" id="ngayhethan2" name="ngayhethan" placeholder="Ngày hết hạn.." required><br>
            <span id="error-message2" style = "display:none;color: red; text-align: center;">Thời gian cấp phải trước thời gian hết hạn.<br><br></span>
            <label for="ghichu">Ghi chú:</label>
            <input type="text" id="ghichu" name="ghichu" ><br>
            
            
            <br>
            <input type="submit" name="submit" value="Lưu">
            
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
    <script>
        // Kiểm tra khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            // Lấy giá trị idtv từ URL
            var idtv = '<?php echo $idtv; ?>';
            // Gán giá trị của idtv cho input có id=id_thuyenvien
            document.getElementById("id_thuyenvien").value = idtv;
        });

        function validateDates() {
            var startDate = document.getElementById('ngaycap').value;
            var endDate = document.getElementById('ngayhethan').value;
            var errorMessage = document.getElementById('error-message');
            
            if (startDate && endDate) {
                if (new Date(startDate) >= new Date(endDate)) {
                    errorMessage.style.display = 'inline';
                    document.getElementById('ngayhethan').value = '';
                } else {
                    errorMessage.style.display = 'none';
                }
            }
        }
        
        document.getElementById('ngayhethan').addEventListener('blur', validateDates);
        document.getElementById('ngaycap').addEventListener('blur', validateDates);


        function validateDates2() {
            var startDate = document.getElementById('ngaycap2').value;
            var endDate = document.getElementById('ngayhethan2').value;
            var errorMessage = document.getElementById('error-message2');
            
            if (startDate && endDate) {
                if (new Date(startDate) >= new Date(endDate)) {
                    errorMessage.style.display = 'inline';
                    document.getElementById('ngayhethan2').value = '';
                } else {
                    errorMessage.style.display = 'none';
                }
            }
        }
        
        document.getElementById('ngayhethan2').addEventListener('blur', validateDates2);
        document.getElementById('ngaycap2').addEventListener('blur', validateDates2);

        
    </script>
    <script>
        // Lấy trạng thái từ một nguồn nào đó, ví dụ: một biến PHP hoặc một giá trị trả về từ cơ sở dữ liệu
        var trangThai = <?php echo $trangthai; ?>; // Giả sử $trangthai là biến PHP chứa trạng thái

        // Kiểm tra nếu trạng thái là 4 thì ẩn nút "Thêm mới"
        if (trangThai === 4) {
            document.getElementById("openFormBtnthemchungchi").style.display = "none";
        }
    </script>
    <script src="js/script.js"></script>
</body>

</html>