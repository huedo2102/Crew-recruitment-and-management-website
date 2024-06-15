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


include_once 'classes/khenthuongkyluat.php';
$khenthuongkyluat = new khenthuongkyluat();
$list = $khenthuongkyluat->xemthongtin();
$list2 = $khenthuongkyluat->chontatca();

$timkiem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['timkiem'])) {
        $timkiem = $_POST['timkiem'];
    }
}
if($timkiem !== ''){
    $list = $khenthuongkyluat->timkiemtheoten($timkiem);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    if (isset($_POST['id_thuyenvien1'])) {
        $result = $khenthuongkyluat->insert($_POST);
        if ($result) { 
            echo '<script>alert("Lưu thành công!");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
            
        }else {
            echo '<script>alert("Lưu không thành công! Số giấy tờ bị trùng lặp, vui lòng thử lại. ");window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
            
        }
    } 
    
    if (isset($_POST['id_thuyenvien2'])) {
        $result4 = $khenthuongkyluat->update($_POST);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 
    if (isset($_POST['id_xoaktkl'])) {
        $result3 =$khenthuongkyluat->delete($_POST['id_xoaktkl']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); ';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! ");</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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
    <h3>QUẢN LÝ KHEN THƯỞNG/KỶ LUẬT</h3>
        <br>
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Mã thuyền viên</th>
                        <th>Tên thuyền viên</th>
                        <th>Ngày sinh</th>
                        <th>Trạng thái</th>
                        <th>SL QĐ khen thưởng</th>
                        <th>SL QĐ kỷ luật</th>
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
                            <td><?=$value['soluong_khenthuong']?></td>
                            <td><?=$value['soluong_kyluat']?></td>
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
        <div id="myFormchitiet"><br>
            <h3 id="thuyenvienName">Danh sách khen thưởng / kỷ luật của TV:</h3>
            <!-- Nút để mở form -->
            <button class="btn info" id="openFormBtnthemktkl" onclick="openFormthemktkl()">Thêm</button>
            <!-- Nội dung mô tả -->

            <div>

                <p id="detailContent"></p>
                <table>
                    <thead>
                        <tr>
                            <th>Số QĐ</th>
                            <th>Loại hình</th>
                            <th>Hình thức</th>
                            <th>Lý do</th>
                            <th>Ngày ký</th>
                            <th>Ghi chú</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="chitiet">
                    </tbody>
                </table>


            </div>
        </div>
        <div id="myFormthemktkl">
            <span class="close" onclick="closeFormthemktkl()">&times;</span>
            <h2>Thêm thông tin khen thưởng kỷ luật</h2>
            <form id="myForm" action="khenthuongkyluat.php" method="post" enctype="multipart/form-data">
                <label for="id_thuyenvien1 ">Mã TV:</label>
                <input type="text" id="id_thuyenvien1" name="id_thuyenvien1" value="" readonly ><br>
                
                <label for="soquyetdinh ">Số QĐ :<span style="color: red;"> *</span></label>
                <input type="text" id="soquyetdinh " name="soquyetdinh" required><br>
                <label for="loaihinh">Loại hình :<span style="color: red;"> *</span></label>
                    <select id="loaihinh" name="loaihinh" required>
                        <option value="" disabled selected hidden>Loại hình..</option>
                        <option value="1">Khen thưởng</option>
                        <option value="0">KL mức 1 - Khiển trách</option>
                        <option value="2">KL mức 2 - Cảnh cáo</option>
                        <option value="3">KL mức 3 - Hạ bậc lương</option>
                        <option value="4">KL mức 4 - Buộc thôi việc</option>
                    </select><br>
                <label for="hinhthuc">Hình thức :<span style="color: red;"> *</span></label>
                <input type="text" id="hinhthuc" name="hinhthuc" required><br>
                <label for="lydo">Lý do :<span style="color: red;"> *</span></label>
                <input type="text" id="lydo" name="lydo" required><br>
                <label for="ngayky">Ngày ký :<span style="color: red;"> *</span></label>
                <input type="date" id="ngayky" name="ngayky" placeholder="Ngày ký.." required><br>
                <label for="ghichu">Ghi chú:</label>
                <input type="text" id="ghichu" name="ghichu" ><br>
                
                
                <br>
                <input type="submit" name="submit" value="Lưu">
                
            </form>


            
        </div>

        <div id="myFormsuaktkl">
            <span class="close" onclick="closeFormsuaktkl()">&times;</span>
            <h2>Cập nhật thông tin khen thưởng kỷ luật</h2>
            <form id="myForm" action="khenthuongkyluat.php" method="post" enctype="multipart/form-data">
                <label for="id_thuyenvien2">Mã TV :</label>
                <input type="text" id="id_thuyenvien2" name="id_thuyenvien2" value="" readonly ><br>
                
                <label for="soquyetdinh">Số QĐ :</label>
                <input type="text" id="soquyetdinh" name="soquyetdinh" readonly><br>
                <label for="loaihinh">Loại hình :<span style="color: red;"> *</span></label>
                    <select id="loaihinh" name="loaihinh" required>
                        <option value="" disabled selected hidden>Loại hình..</option>
                        <option value="1">Khen thưởng</option>
                        <option value="0">KL mức 1 - Khiển trách</option>
                        <option value="2">KL mức 2 - Cảnh cáo</option>
                        <option value="3">KL mức 3 - Hạ bậc lương</option>
                        <option value="4">KL mức 4 - Buộc thôi việc</option>
                    </select><br>
                <label for="hinhthuc">Hình thức :<span style="color: red;"> *</span></label>
                <input type="text" id="hinhthuc" name="hinhthuc" required><br>
                <label for="lydo">Lý do :<span style="color: red;"> *</span></label>
                <input type="text" id="lydo" name="lydo" required><br>
                <label for="ngayky">Ngày ký :<span style="color: red;"> *</span></label>
                <input type="date" id="ngayky" name="ngayky" placeholder="Ngày ký.." required><br>
                <label for="ghichu">Ghi chú :</label>
                <input type="text" id="ghichu" name="ghichu" ><br>
                
                
                <br>
                <input type="submit" name="submit" value="Lưu">
                
            </form>


            
        

    </div><br><br>
    <script>
        var selectedThuyenVien = null; // Biến lưu trữ thông tin thuyền viên được chọn
        var id = null;
        // Kiểm tra khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("myFormchitiet").style.display = "none";
        });

        function showDetail(row) {
            document.getElementById("myFormthemktkl").style.display = "none"; // Ẩn form thêm thông tin
            document.getElementById("myFormsuaktkl").style.display = "none"; // Ẩn form cập nhật thông tin
            document.getElementById("openFormBtnthemktkl").style.display = "block";
            id = row.getAttribute('data-id');
            
            // Giả sử 'details' là một mảng chứa thông tin chi tiết, bạn cần cập nhật dữ liệu từ mảng này
            var details2 = <?php echo json_encode($list2); ?>;
            selectedThuyenVien = details2.filter(item => item.id_thuyenvien == id);

            var details = <?php echo json_encode($list); ?>;
            TV = details.filter(item => item.id_thuyenvien == id);

            // Hiển thị tên thuyền viên
            if (selectedThuyenVien.length > 0) {
                var thuyenvienName = "Danh sách khen thưởng / kỷ luật của TV:  <em style='font-style: italic; color: #888'>" 
                + selectedThuyenVien[0].tenthuyenvien +" - Mã TV: "+ selectedThuyenVien[0].id_thuyenvien + "</em>";
                document.getElementById("thuyenvienName").innerHTML = thuyenvienName;

            }else{
                var thuyenvienName = "Danh sách khen thưởng / kỷ luật của TV:  <em style='font-style: italic; color: #888'>" 
                + TV[0].tenthuyenvien +" - Mã TV: "+ TV[0].id_thuyenvien + "</em>";
                document.getElementById("thuyenvienName").innerHTML = thuyenvienName;
            }


            document.getElementById("myFormlabel").style.display = "none";
            document.getElementById("myFormchitiet").style.display = "block";
            update();
            document.getElementById("id_thuyenvien1").value = id;
            document.getElementById("id_thuyenvien2").value = id;
            if (selectedThuyenVien[0].trangthai == 4) {
                document.getElementById("openFormBtnthemktkl").style.display = "none";
            }else{
                document.getElementById("openFormBtnthemktkl").style.display = "block";
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
                // Lặp qua từng mục selectedThuyenVien và tạo một hàng cho mỗi mục
                selectedThuyenVien.forEach(function(item) {
                    var row = document.createElement('tr'); // Tạo một hàng mới
                    row.innerHTML = `
                        <td>${item.soquyetdinh}</td>
                        <td>${item.loaihinh_text}</td>
                        <td>${item.hinhthuc}</td>
                        <td>${item.lydo}</td>
                        <td>${formatDate(item.ngayky)}</td>
                        <td>${item.ghichu}</td>
                        <td>
                            <div style="display: flex;">
                                <button class="btn edit" id="openFormBtnsuaktkl" data-id="${item.soquyetdinh}" onclick="openFormsuaktkl(event)">Sửa</button>
                                <form id="deleteForm" action="khenthuongkyluat.php" method="post" >
                                    <input type="hidden" id="id_xoaktkl" name="id_xoaktkl" value="${item.soquyetdinh}">
                                    <input class="btn delete" style="" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                </form>
                            </div>
                        </td>
                        
                    `;
                    chitietTable.appendChild(row); // Thêm hàng mới vào bảng
                });
            } else {
                chitietTable.innerHTML = '<tr><td colspan="7">Không có thông tin khen thưởng / kỷ luật cho thuyền viên này.</td></tr>';
                
                if (TV[0].trangthai == 4) {
                    document.getElementById("openFormBtnthemktkl").style.display = "none";
                }else{
                    document.getElementById("openFormBtnthemktkl").style.display = "block";
                }
            }
        }


    </script>
    <script src="js/script.js"></script>
</body>
<?php include_once 'lib/footer.php';?>
</html>