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
        if ($giatri == '1'||$giatri == '2'||$giatri == '3'||$giatri == '4') {
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
<?php include_once 'lib/header.php';?>
<style>
.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

header {
    text-align: center;
}

main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
table{
    margin-top: 30px;
    border-collapse: collapse;
    border: 0;
}
td, th {
  border-spacing: 2px; /* Tạo khoảng cách giữa các ô */
}
.card {
    width: 300px;
    height: 200px;
    border-left: 2px solid #4e73df;
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
}

.card h2 {
    font-size: 25px;
    margin-bottom: 10px;
}

.card p {
    font-size: 16px;
    margin-bottom: 10px;
}

.card i {
    font-size: 30px;
    color: #007bff;
}
</style>

    <div class="container">
        <header>
            <h1>Dashboard</h1>
        </header>
        <main>
            <table style = "margin-left: 60px;">
                
<?php $all_ones = false;
if (isset($role_id)) {
    // Lặp qua mảng 'chucnang' và in ra từng giá trị
    foreach ($role_id as $giatri) {
        // Kiểm tra nếu giá trị không phải là 1
        if ($giatri == '1') {
            // Nếu có ít nhất một giá trị là 1, đặt biến flag là false và thoát vòng lặp
            $all_ones = true;
            break;
        }
    }
    if($all_ones == true){ ?>
                <tr >
                <th>
                    <div class="card" onclick="window.location.href = 'themtieude.php';">
                        <h2>Quản lý bài viết</h2>
                        <p>Thêm bài viết</p>
                        <i class="fas fa-chart-line"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'themdanhmuc.php';">
                        <h2>Quản lý bài viết</h2>
                        <p>Thêm danh mục</p>
                        <i class="fas fa-users"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'quanlytieude.php';">
                        <h2>Quản lý bài viết</h2>
                        <p>Tất cả bài viết</p>
                        <i class="fas fa-percent"></i>
                    </div>
                </th>
                </tr>
<?php }}?>
<?php $all_ones = false;
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
    if($all_ones == true){ ?>
            <tr>
                <th>
                    <div class="card" onclick="window.location.href = 'thongtinhoso.php';">
                        <h2>Quản lý thuyền viên</h2>
                        <p>Danh sách thuyền viên</p>
                        <i class="fas fa-users"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'chungchithuyenvien.php';">
                        <h2>Quản lý thuyền viên</h2>
                        <p>Chứng chỉ thuyền viên</p>
                        <i class="fas fa-chart-line"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'thongtindangky.php';">
                        <h2>Quản lý thuyền viên</h2>
                        <p>Thông tin đăng kí</p>
                        <i class="fas fa-percent"></i>
                    </div>
                </th>
            </tr>
<?php }}?>
<?php $all_ones = false;
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
    if($all_ones == true){ ?>
                <tr >
                <th>
                    <div class="card" onclick="window.location.href = 'tau.php';">
                        <h2>Quản lý danh mục</h2>
                        <p>Thông tin tàu</p>
                        <i class="fas fa-chart-line"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'thongtinchucdanh.php';">
                        <h2>Quản lý danh mục</h2>
                        <p>Chức danh</p>
                        <i class="fas fa-users"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'ttloaichungchi.php';">
                        <h2>Quản lý danh mục</h2>
                        <p>Loại chứng chỉ</p>
                        <i class="fas fa-percent"></i>
                    </div>
                </th>
                </tr>
<?php }}?>    
<?php $all_ones = false;
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
    if($all_ones == true){ ?>
            <tr>
                <th>
                    <div class="card" onclick="window.location.href = 'themtaikhoan.php';">
                        <h2>Quản lý người dùng</h2>
                        <p>Thêm tài khoản</p>
                        <i class="fas fa-users"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'quanlytaikhoan.php';">
                        <h2>Quản lý người dùng</h2>
                        <p>Tất cả tài khoản</p>
                        <i class="fas fa-chart-line"></i>
                    </div>
                </th>
                <th>
                    <div class="card" onclick="window.location.href = 'phanquyen.php';">
                        <h2>Quản lý người dùng</h2>
                        <p>Phân quyền người dùng</p>
                        <i class="fas fa-percent"></i>
                    </div>
                </th>
            </tr>
<?php }}?> 
            </table>
        </main>
    
    <script src="js/script.js"></script>
<?php include_once 'lib/footer.php';?>


