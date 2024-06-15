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
if (isset($_GET['tendangnhap'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if ($_POST['matkhaumoi'] !== $_POST['xnmk']) {
            $error_message = 'Mật khẩu và xác nhận mật khẩu không khớp!';
        }else {
            $result = $user->doimatkhau($_GET['tendangnhap'], $_POST);
            if (!is_bool($result)) {
                // Nếu $result không phải là boolean, in ra giá trị của nó
                $error_message = $result;
            }
        }
        
    }
}


?>
<?php include_once 'lib/header.php';?>
    <style>
        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
        }

        .form-add {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-add label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-add input[type="date"],
        .form-add input[type="text"],
        .form-add input[type="number"],
        .form-add input[type="password"],
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
        <h1>Đổi mật khẩu</h1>
    </div>
    <div class="container">
        <div class="form-add">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                <label for="matkhaumoi">Mật khẩu mới :</label>
                <input type="password" id="matkhaumoi" name="matkhaumoi" required>
                <input type="checkbox" id="checkbox" name="checkbox"> Ẩn/hiện mật khẩu</input><br><br>

                <label for="xnmk">Xác nhận lại mật khẩu :</label>
                <input type="password" id="xnmk" name="xnmk" required>
                <input type="checkbox" id="checkbox2" name="checkbox2"> Ẩn/hiện mật khẩu</input><br><br>

                <?php if (!empty($error_message)) : ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <input type="submit" value="Lưu" name="submit">
            </form>
        </div>
    
    
        <br><br>
        <script src="js/script.js"></script>
        <script>
            // JavaScript để thay đổi loại của trường nhập liệu mật khẩu
            const passwordInput = document.getElementById('matkhaumoi');
            const showPasswordCheckbox = document.getElementById('checkbox');

            showPasswordCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        </script>
        <script>
            // JavaScript để thay đổi loại của trường nhập liệu mật khẩu
            const passwordInput2 = document.getElementById('xnmk');
            const showPasswordCheckbox2 = document.getElementById('checkbox2');

            showPasswordCheckbox2.addEventListener('change', function() {
                if (this.checked) {
                    passwordInput2.type = 'text';
                } else {
                    passwordInput2.type = 'password';
                }
            });
        </script>

<?php include_once 'lib/footer.php';?>
