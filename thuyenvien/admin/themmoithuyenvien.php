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
        echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'thongtinhoso.php';</script>";
    }
} else {
    echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'thongtinhoso.php';</script>";
}
?>
<?php

include_once('lib\database.php');

?>

<?php

include_once 'classes/thongtinhoso.php';
include_once 'classes/thongtindangky.php';

$thongtindangky = new thongtindangky();

$iddk = isset($_GET['iddk']) ? $_GET['iddk'] : '';
if (isset($_GET['iddk'])) {
    $list2 = $thongtindangky->xemthongtin_theoid($iddk);
}

$thongtin = new thuyenvien();
$list = $thongtin->xemthongtin();
$thumbnail_err=  "";
if (1 == 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $result = $thongtin->insert($_POST, $_FILES);
        // Nếu lưu thành công, thực hiện chuyển trang về trang trước đó
        if ($result) { // Điều kiện lưu thành công của bạn
            echo "<script>alert('Lưu thành công!');window.location = 'thongtinhoso.php';</script>";
            
        }

    }
} else {
    header("Location:index.php");
} 

?>
<?php include_once 'lib/header.php';?>
    <style>
        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .form-add {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form-column {
            width: 48%;
        }

        .form-add label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-add input[type="email"],
        .form-add input[type="date"],
        .form-add input[type="text"],
        .form-add input[type="number"],
        .form-add select,
        .form-add textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-add input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-add textarea {
            resize: vertical;
        }

        .form-add input[type="submit"] {
            background-color: #2196F3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-add input[type="submit"]:hover {
            background-color: #0b7dda;
        }
    </style>




    <div class="title">
        <h1>Thêm mới thuyền viên</h1>
    </div>
    <a href="javascript:history.back()" style="float: right;margin-right: 160px;">
        <i class="fa fa-arrow-left"></i>
        Quay lại
    </a>
    <div class="container">
        <form class="form-add" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" onsubmit="onSubmitHandler()">
            <div class="form-column">
                <label for="tentv">Tên thuyền viên :<span style="color: red;"> *</span></label>
                <input type="text" id="tentv" name="tentv" placeholder="Tên thuyền viên.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['hoten'];} ?>" required>

                <label for="ngaysinh">Ngày sinh :<span style="color: red;"> *</span></label>
                <input type="date" id="ngaysinh" name="ngaysinh" placeholder="Ngày sinh.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['ngaysinh'];} ?>" required onblur="validateBirthDate()" >
                <span id="ngaysinhError" style = "display:none;color: red; text-align: center;"></span>

                <label for="noisinh">Nơi sinh :<span style="color: red;"> *</span></label>
                <input type="text" id="noisinh" name="noisinh" placeholder="Nơi sinh.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['noisinh'];} ?>" required>

                <label for="cccd">Số CCCD :<span style="color: red;"> *</span></label>
                <input type="number" id="cccd" name="cccd" placeholder="Số CCCD.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['cccd'];} ?>" required onblur="validatecccd()">
                <span id="cccdError" style = "display:none;color: red; text-align: center;">Số CCCD phải có đúng 12 chữ số.</span>

                <label for="diachi">Địa chỉ :<span style="color: red;"> *</span></label>
                <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['diachi'];} ?>" required>

                <label for="sdt">Số điện thoại :<span style="color: red;"> *</span></label>
                <input type="number" id="sdt" name="sdt" placeholder="Số điện thoại.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['sdt'];} ?>" required onblur="validatePhone()">
                <span id="sdtError" style = "display:none;color: red; text-align: center;">Số điện thoại phải có 10 hoặc 11 chữ số.</span>

                <label for="cannang">Cân nặng (kg) :<span style="color: red;"> *</span></label>
                <input type="number" id="cannang" name="cannang" placeholder="Cân nặng (kg).." required min="1" step="0.1">
            </div>

            <div class="form-column">
                <label for="chieucao">Chiều cao (cm) :<span style="color: red;"> *</span></label>
                <input type="number" id="chieucao" name="chieucao" placeholder="Chiều cao (cm).." required min="1" step="0.1">

                <label for="nhommau">Nhóm máu :<span style="color: red;"> *</span></label>
                <select id="nhommau" name="nhommau" required>
                    <option value="" disabled selected hidden>Chọn nhóm máu..</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>

                <label for="sizegiay">Size giày :<span style="color: red;"> *</span></label>
                <input type="number" id="sizegiay" name="sizegiay" placeholder="Size giày.." required min="36" max="45" oninput="validateInput(this)">

                <label for="email">Email :<span style="color: red;"> *</span></label>
                <input type="email" id="email" name="email" placeholder="Email.." value="<?php if (isset($_GET['iddk'])) { echo $list2[0]['email'];} ?>" required>

                <label for="honnhan">Tình trạng :<span style="color: red;"> *</span></label>
                <select id="honnhan" name="honnhan" required>
                    <option value="" disabled selected hidden>Tình trạng..</option>
                    <option value="1">Đã kết hôn</option>
                    <option value="0">Chưa kết hôn</option>
                </select>

                <label for="ngaynhanhs">Ngày nhận hồ sơ :<span style="color: red;"> *</span></label>
                <input type="date" id="ngaynhanhs" name="ngaynhanhs" placeholder="Ngày nhận hồ sơ.." required onblur="validateNgayNhanHS()">
                <span id="ngaynhanhsError" style="display: none; color: red; text-align: center;"></span><br>

                <label for="image">Hình ảnh :<span style="color: red;"> *</span></label>
                <input type="file" accept=".jpg,.jpeg,.png" id="image" name="image" required>
                
                <span id="imageError" style = "display:none;color: red; text-align: center;"></span>
                <input type="hidden" id="iddk" name="iddk" value = <?php echo $iddk;?> >
  
                <input type="submit" value="Lưu" name="submit">
            </div>
        </form>
    
        <br><br>
    <script>
        function capitalizeName(name) {
            // Xóa dấu cách ở đầu và cuối, và dấu cách thừa giữa các từ
            name = name.trim().replace(/\s+/g, ' ');

            // Viết hoa chữ cái đầu của mỗi từ
            return name.split(' ').map(function(word) {
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            }).join(' ');
        }

        function normalizeName() {
            var input = document.getElementById("tentv");
            input.value = capitalizeName(input.value);
        }
        function validatecccd() {
            var input = document.getElementById("cccd");
            var error = document.getElementById("cccdError");
            if (input.value.length !== 12) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }
        }
        function validatePhone() {
            var input = document.getElementById("sdt");
            var error = document.getElementById("sdtError");
            if (input.value.length !== 10 && input.value.length !== 11) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }
        }
        function validateBirthDate() {
            var input = document.getElementById("ngaysinh");
            var error = document.getElementById("ngaysinhError");
            var birthDate = new Date(input.value);
            var today = new Date();

            // Kiểm tra tuổi có ít nhất là 18 không
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDifference = today.getMonth() - birthDate.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 18) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
                error.innerText = "Ngày sinh cho thấy bạn phải ít nhất 18 tuổi.";
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }

        }
        function onSubmitHandler() {
            normalizeName();
            
        }
        // Hàm quay lại trang trước đó
        function goBack() {
            window.history.back();
        }
        
        
        const imageInput = document.getElementById('image');
        const imageError = document.getElementById('imageError');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            const allowedExtensions = ['jpg', 'jpeg', 'png'];
            const extension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(extension)) {
                imageError.textContent = 'Vui lòng chọn tệp có định dạng JPG, JPEG hoặc PNG.';
                imageError.style.display = 'block';
                this.value = ''; // Clear file selection
                return; // Prevent further processing
            }else{
                imageError.style.display = 'none';
            }

            // Proceed with other processing or file handling if the extension is valid
            // ...
        });
        function validateInput(input) {
            const min = 36;
            const max = 45;
            const value = parseInt(input.value, 10);

            if (value <= min) {
                input.value = min;
            } else if (value >= max) {
                input.value = max;
            }
        }
        function validateNgayNhanHS() {
            var inputNgaySinh = new Date(document.getElementById("ngaysinh").value);
            var inputNgayNhanHS = new Date(document.getElementById("ngaynhanhs").value);
            var today = new Date();

            // Tính tuổi của người dùng
            var age = inputNgayNhanHS.getFullYear() - inputNgaySinh.getFullYear();
            var monthDifference = inputNgayNhanHS.getMonth() - inputNgaySinh.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && inputNgayNhanHS.getDate() < inputNgaySinh.getDate())) {
                age--;
            }

            
            // Kiểm tra nếu tuổi nhỏ hơn 18
            if (age < 18) {
                
                var error = document.getElementById("ngaynhanhsError");
                document.getElementById("ngaynhanhs").value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
                error.innerText = "Ngày nhận hồ sơ phải sau ngày sinh ít nhất 18 năm.";
            } else {
                document.getElementById("ngaynhanhsError").style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }
        }

    </script>
    

<?php include_once 'lib/footer.php';?>
