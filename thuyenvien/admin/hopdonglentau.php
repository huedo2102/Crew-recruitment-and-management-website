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


include_once 'classes/hopdonglentau.php';
$hopdonglentau = new hopdonglentau();
$list = $hopdonglentau->xemthongtin();
$list2 = $hopdonglentau->chontatca();

$timkiem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
}
if($timkiem !== ''){
    $list = $hopdonglentau->timkiemtheoten($timkiem);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    if (isset($_POST['id_thuyenvien1'])) {
        $result = $hopdonglentau->insert($_POST, $_FILES);
        if ($result) { 
            echo '<script>alert("Lưu thành công!");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        
        }else {
            echo '<script>alert("Số giấy tờ bị trùng lặp! Vui lòng thử lại. ");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        }
    } 
    
    if (isset($_POST['id_thuyenvien2'])) {
        $result4 = $hopdonglentau->update($_POST, $_FILES);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        }
    } 
    if (isset($_POST['id_xoaktkl'])) {
        $result3 =$hopdonglentau->delete($_POST['id_xoaktkl']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"; </script>';
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! ");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '"; </script>';
        }
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
<div class="container-fluid">
    <div>
        <h3>QUẢN LÝ HỢP ĐỒNG LÊN TÀU</h3>
        <br>
        <div >

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Mã thuyền viên</th>
                        <th>Tên thuyền viên</th>
                        <th>Ngày sinh</th>
                        <th>Trạng thái</th>
                        <th>SL đã thanh lý</th>
                        <th>SL chưa thanh lý</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($list) && is_array($list)) {
                    $count = 1;
                    foreach ($list as $key => $value) { ?>
                        <tr data-id="<?=$value['id_thuyenvien']?>" onclick="showDetail(this)">
                            <td><?=$value['id_thuyenvien']?></td>
                            <td><?=$value['tenthuyenvien']?></td>
                            <td><?=formatDate($value['ngaysinh'])?></td>
                            <td><?=$value['tentrangthai']?></td>
                            <td><?=$value['soluong_dathanhly']?></td>
                            <td><?=$value['soluong_chuathanhly']?></td>
                        </tr>
                    <?php }
                } else {
                    // Xử lý khi mảng rỗng hoặc không hợp lệ
                }
                ?>

                    
                    
                    <!-- Kết thúc lặp lại các hàng -->
                </tbody>
            </table>
        </div>
        <div id="myFormlabel">
            <center><p style="color: red;"><em style="opacity: 0.6;">Vui lòng chọn thuyền viên để hiển thị thông tin chi tiết!</em></p></center>
        </div>
        <!-- Phần hiển thị chi tiết -->
        <div id="myFormchitiet">
            <br><h3 id="thuyenvienName">Danh sách hợp đồng đi tàu của TV :</h3>
            <!-- Nút để mở form -->
            <button class="btn info" style = "display : none;" id="openFormBtnthemhdlt" onclick="openFormthemhdlt()">Thêm</button>
            <!-- Nội dung mô tả -->

            <div>

                <p id="detailContent"></p>
                <table>
                    <thead>
                        <tr>
                            <th>Số hợp đồng</th>
                            <th>Tên tàu</th>
                            <th>Chức danh</th>
                            <th>Ngày bắt đầu</th>
                            <th>Thời hạn</th>
                            <th>Ngày ký</th>
                            <th>Người ký</th>
                            <th>Chức danh người ký</th>
                            <th>Người SDLĐ</th>
                            <th>Địa chỉ người SDLĐ</th>
                            <th>Trạng thái</th>
                            <th>File scan</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="chitiet">
                    </tbody>
                </table>


            </div>
        </div>
        <div id="myFormthemhdlt">
            <span class="close" onclick="closeFormthemhdlt()">&times;</span>
            <h2>Thêm thông tin hợp đồng lên tàu</h2>
            <form id="myForm" action="hopdonglentau.php" method="post" enctype="multipart/form-data" onsubmit="normalizeName()">
                <label for="sohopdong">Số HĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="sohopdong" name="sohopdong" required><br>
                <label for="id_thuyenvien1 ">Mã TV :</label>
                <input type="text" id="id_thuyenvien1" name="id_thuyenvien1" value="" readonly ><br>
                <label for="tau">Tàu :<span style="color: red;"> *</span></label>
                <select id="tau" name="tau" required>
                    <option value="" disabled selected hidden>Chọn tàu..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM tau";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id'] . '">' . $row2['tentau'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
                <label for="chucdanh">Chức danh :<span style="color: red;"> *</span></label>
                <select id="chucdanh" name="chucdanh" required>
                    <option value="" disabled selected hidden>Chức danh..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM chucdanh";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['tenchucdanh'] . '">' . $row2['tenchucdanh'] . '</option>';
                            }
                        }
                        ?>
                </select>
                <label for="ngaybatdau">Ngày bắt đầu :<span style="color: red;"> *</span></label>
                <input type="date" id="ngaybatdau" name="ngaybatdau" placeholder="Ngày bắt đầu.." required><br>
                <label for="thoihan">Thời hạn (tháng) :<span style="color: red;"> *</span></label>
                <input type="number" id="thoihan" name="thoihan" placeholder="Thời hạn.." required><br>
                <label for="ngayky">Ngày ký :<span style="color: red;"> *</span></label>
                <input type="date" id="ngayky" name="ngayky" placeholder="Ngày ký.." required><br>
                <span id="error-message" style = "display:none;color: red; text-align: center;">Thời gian ký phải trước thời gian bắt đầu.<br><br></span>
                <label for="nguoiky">Người ký :<span style="color: red;"> *</span></label>
                <input type="text" id="nguoiky" name="nguoiky" required><br>
                <label for="chucdanh_nguoiky">Chức danh người ký :<span style="color: red;"> *</span></label>
                <input type="text" id="chucdanh_nguoiky" name="chucdanh_nguoiky" required><br>
                <label for="nguoisdld">Người SDLĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="nguoisdld" name="nguoisdld" required><br>
                <label for="diachi_nguoisdld">Địa chỉ người SDLĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="diachi_nguoisdld" name="diachi_nguoisdld" required><br>
                <label for="file_cv">Tải HĐ :</label>
                <input type="file" accept=".pdf" id="file_cv" name="file_cv" ><br>
                <span id="imageError" style = "display:none;color: red; text-align: center;"></span><br>
                <br>
                <input type="submit" name="submit" value="Lưu">
                
            </form>


            
        </div>

        <div id="myFormsuahdlt">
            <span class="close" onclick="closeFormsuahdlt()">&times;</span>
            <h2>Cập nhật thông tin hợp đồng lên tàu</h2>
            <form id="myForm" action="hopdonglentau.php" method="post" enctype="multipart/form-data" onsubmit="normalizeName2()">
                <label for="sohopdong">Số HĐ :</label>
                <input type="text" id="sohopdong" name="sohopdong" readonly><br>
                <label for="id_thuyenvien2">Mã TV :</label>
                <input type="text" id="id_thuyenvien2" name="id_thuyenvien2" value="" readonly ><br>
                <label for="tau">Tàu :<span style="color: red;"> *</span></label>
                <select id="tau" name="tau" required>
                    <option value="" disabled selected hidden>Chọn tàu..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM tau";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['id'] . '">' . $row2['tentau'] . '</option>';
                            }
                        }
                        ?>
                </select><br>
                <label for="chucdanh">Chức danh :<span style="color: red;"> *</span></label>
                <select id="chucdanh" name="chucdanh" required>
                    <option value="" disabled selected hidden>Chức danh..</option>
                        <?php
                        // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                        $query2 = "SELECT * FROM chucdanh";
                        $db2 = new Database();
                        $result2 = $db2->select($query2);

                        // Kiểm tra xem có kết quả trả về không
                        if ($result2) {
                            // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<option value="' . $row2['tenchucdanh'] . '">' . $row2['tenchucdanh'] . '</option>';
                            }
                        }
                        ?>
                </select>
                <label for="ngaybatdau2">Ngày bắt đầu :<span style="color: red;"> *</span></label>
                <input type="date" id="ngaybatdau2" name="ngaybatdau" placeholder="Ngày bắt đầu.." required><br>
                <label for="thoihan">Thời hạn (tháng) :<span style="color: red;"> *</span></label>
                <input type="number" id="thoihan" name="thoihan" placeholder="Thời hạn.." required><br>
                <label for="ngayky2">Ngày ký :<span style="color: red;"> *</span></label>
                <input type="date" id="ngayky2" name="ngayky" placeholder="Ngày ký.." required><br>
                <span id="error-message2" style = "display:none;color: red; text-align: center;">Thời gian ký phải trước thời gian bắt đầu.<br><br></span>
                <label for="nguoiky2">Người ký :<span style="color: red;"> *</span></label>
                <input type="text" id="nguoiky2" name="nguoiky" required><br>
                <label for="chucdanh_nguoiky">Chức danh người ký :<span style="color: red;"> *</span></label>
                <input type="text" id="chucdanh_nguoiky" name="chucdanh_nguoiky" required><br>
                <label for="nguoisdld2">Người SDLĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="nguoisdld2" name="nguoisdld" required><br>
                <label for="diachi_nguoisdld">Địa chỉ người SDLĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="diachi_nguoisdld" name="diachi_nguoisdld" required><br>
                <label for="trangthai">Trạng thái :<span style="color: red;"> *</span></label>
                    <select id="trangthai" name="trangthai" required>
                        <option value="" disabled selected hidden>Trạng thái..</option>
                        <option value="1">Đã thanh lý</option>
                        <option value="0">Chưa thanh lý</option>
                    </select><br>
                <label for="file_cv">Tải HĐ :</label>
                <input type="file" accept=".pdf" id="file_cv" name="file_cv" ><br>
                <span id="imageError" style = "display:none;color: red; text-align: center;"></span><br>
                <br>
                <input type="submit" name="submit" value="Lưu">
                
            </form>


            
        </div>
        </div>
    <br><br>
    <script>
        const imageInput = document.getElementById('file_cv');
        const imageError = document.getElementById('imageError');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            const allowedExtensions = ['pdf'];
            const extension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(extension)) {
                imageError.textContent = 'Vui lòng chọn tệp có định dạng PDF.';
                imageError.style.display = 'block';
                this.value = ''; // Clear file selection
                return; // Prevent further processing
            }else{
                imageError.style.display = 'none';
            }

            // Proceed with other processing or file handling if the extension is valid
            // ...
        });


        var selectedThuyenVien = null; // Biến lưu trữ thông tin thuyền viên được chọn
        var id = null;
        // Kiểm tra khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("myFormchitiet").style.display = "none";
        });

        function showDetail(row) {
            document.getElementById("myFormthemhdlt").style.display = "none"; // Ẩn form thêm thông tin
            document.getElementById("myFormsuahdlt").style.display = "none"; // Ẩn form cập nhật thông tin
            id = row.getAttribute('data-id');
            
            // Giả sử 'details' là một mảng chứa thông tin chi tiết, bạn cần cập nhật dữ liệu từ mảng này
            var details2 = <?php echo json_encode($list2); ?>;
            selectedThuyenVien = details2.filter(item => item.hopdong_tv == id);

            var details = <?php echo json_encode($list); ?>;
            TV = details.filter(item => item.id_thuyenvien == id);

            // Hiển thị tên thuyền viên
            if (selectedThuyenVien.length > 0) {
                var thuyenvienName = "Danh sách hợp đồng đi tàu của TV :   <em style='font-style: italic; color: #888'>" 
                + selectedThuyenVien[0].tenthuyenvien +" - Mã TV: "+ selectedThuyenVien[0].hopdong_tv + "</em>";
                document.getElementById("thuyenvienName").innerHTML = thuyenvienName;
            }else{
                var thuyenvienName = "Danh sách hợp đồng đi tàu của TV :   <em style='font-style: italic; color: #888'>" 
                + TV[0].tenthuyenvien +" - Mã TV: "+ TV[0].id_thuyenvien + "</em>";
                document.getElementById("thuyenvienName").innerHTML = thuyenvienName;
                if (TV[0].trangthaitv == 4) {
                    document.getElementById("openFormBtnthemhdlt").style.display = "none";
                }
            }

            document.getElementById("myFormlabel").style.display = "none";
            document.getElementById("myFormchitiet").style.display = "block";
            
            document.getElementById("id_thuyenvien1").value = id;
            document.getElementById("id_thuyenvien2").value = id;
            
            update();
            if (selectedThuyenVien.length > 0) {
                if (selectedThuyenVien[0].trangthaitv == 4) {
                    document.getElementById("openFormBtnthemhdlt").style.display = "none";
                }
            }
            if (TV[0].trangthaitv == 4) {
                document.getElementById("openFormBtnthemhdlt").style.display = "none";
            }
        }
        function formatDate(dateString) {
            var parts = dateString.split("-");
            if (parts.length !== 3) return ''; // Đảm bảo chuỗi có đúng định dạng ngày tháng
            return parts[2] + '/' + parts[1] + '/' + parts[0];
        }

        function update() {
            var chitietTable = document.getElementById('chitiet');
            chitietTable.innerHTML = ''; // Xóa nội dung cũ
            
            if (selectedThuyenVien.length > 0) {
                document.getElementById("openFormBtnthemhdlt").style.display = "block";
                // Lặp qua từng mục selectedThuyenVien và tạo một hàng cho mỗi mục
                selectedThuyenVien.forEach(function(item) {
                    
                    if (item.trangthai_text == 'Chưa thanh lý') {
                        document.getElementById("openFormBtnthemhdlt").style.display = "none";
                    }
                    var row = document.createElement('tr'); // Tạo một hàng mới
                    row.innerHTML = `
                    <td>${item.sohopdong}</td>
                    <td>${item.tentau}</td>
                    <td>${item.chucdanh}</td>
                    <td>${formatDate(item.ngaybatdau)}</td>
                    <td>${item.thoihan}</td>
                    <td>${formatDate(item.ngayky)}</td>
                    <td>${item.nguoiky}</td>
                    <td>${item.chucdanh_nguoiky}</td>
                    <td>${item.nguoisdld}</td>
                    <td>${item.diachi_nguoisdld}</td>
                    <td>${item.trangthai_text}</td>
                    <td>${item.file_scan ? `<a href="${item.file_scan}" download onclick="return confirm('Bạn muốn tải file xuống ?')">Xem..</a>` : ''}</td>
                    <td>
                        <div style="display: flex;">
                            ${item.trangthai_text === 'Chưa thanh lý' ? `<div><button class="btn edit" id="openFormBtnsuahdlt" data-id="${item.hopdong_tv}" onclick="openFormsuahdlt(event)">Sửa</button></div>` : ''}

                            <form id="deleteForm" action="hopdonglentau.php" method="post" >
                                <input type="hidden" id="id_xoaktkl" name="id_xoaktkl" value="${item.sohopdong}">
                                <button class="btn delete" style="padding: ;" type="submit" value="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                            <div><a  style="text-decoration: none; font-size: smaller;" href="xuathdlt.php?idhd=${item.sohopdong}&idtv=${item.hopdong_tv}" onclick="return confirm('Bạn muốn tải file xuống ?')">
                            <i class="fa fa-download"></i> docx 
                            </a>
                            </div>
                            <div><a  style="text-decoration: none; font-size: smaller;" href="xuathdlt2.php?idhd=${item.sohopdong}&idtv=${item.hopdong_tv}" >
                            <i class="fa fa-download"></i> pdf 
                            </a>
                            </div>
                        </div>
                    </td>
                `;

                    chitietTable.appendChild(row); // Thêm hàng mới vào bảng
                });
            } else {
                chitietTable.innerHTML = '<tr><td colspan="7">Không có thông tin hợp đồng đi tàu cho thuyền viên này.</td></tr>';
                document.getElementById("openFormBtnthemhdlt").style.display = "block";
            }
            
        }

        function validateDates() {
            var startDate = document.getElementById('ngayky').value;
            var endDate = document.getElementById('ngaybatdau').value;
            var errorMessage = document.getElementById('error-message');
            
            if (startDate && endDate) {
                if (new Date(startDate) >= new Date(endDate)) {
                    errorMessage.style.display = 'inline';
                    document.getElementById('ngayky').value = '';
                } else {
                    errorMessage.style.display = 'none';
                }
            }
        }
        
        document.getElementById('ngaybatdau').addEventListener('blur', validateDates);
        document.getElementById('ngayky').addEventListener('blur', validateDates);

        function validateDates2() {
            var startDate = document.getElementById('ngayky2').value;
            var endDate = document.getElementById('ngaybatdau2').value;
            var errorMessage = document.getElementById('error-message2');
            
            if (startDate && endDate) {
                if (new Date(startDate) >= new Date(endDate)) {
                    errorMessage.style.display = 'inline';
                    document.getElementById('ngayky2').value = '';
                } else {
                    errorMessage.style.display = 'none';
                }
            }
        }
        
        document.getElementById('ngaybatdau2').addEventListener('blur', validateDates2);
        document.getElementById('ngayky2').addEventListener('blur', validateDates2);


        function capitalizeName(name) {
            // Xóa dấu cách ở đầu và cuối, và dấu cách thừa giữa các từ
            name = name.trim().replace(/\s+/g, ' ');

            // Viết hoa chữ cái đầu của mỗi từ
            return name.split(' ').map(function(word) {
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            }).join(' ');
        }

        function normalizeName() {
            var input = document.getElementById("nguoiky");
            input.value = capitalizeName(input.value);
            var input2 = document.getElementById("nguoisdld");
            input2.value = capitalizeName(input2.value);
        }
        function normalizeName2() {
            var input = document.getElementById("nguoiky2");
            input.value = capitalizeName(input.value);
            var input2 = document.getElementById("nguoisdld2");
            input2.value = capitalizeName(input2.value);
        }
    </script>
    <script src="js/script.js"></script>
</body>
<?php include_once 'lib/footer.php';?>
</html>