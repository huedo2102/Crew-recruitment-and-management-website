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
include_once 'classes/thongtinhoso.php';
include_once 'classes/kinhnghiemditau.php';
include_once 'classes/truonghoc.php';
include_once 'classes/nguoithan.php';
// Khởi tạo các biến


?>
<?php

?>

<?php
$thongtin = new thuyenvien();
$subject = '';
$topic = '';
$chapter = '';
// Xử lý yêu cầu lọc
if (isset($_GET['subject']) || isset($_GET['topic']) || isset($_GET['chapter'])) {
    // Kiểm tra xem từng tham số có tồn tại không, và chỉ gán nếu tồn tại
    if (isset($_GET['subject'])) {
        $subject = $_GET['subject'];
    }
    if (isset($_GET['topic'])) {
        $topic = $_GET['topic'];
    }
    if (isset($_GET['chapter'])) {
        $chapter = $_GET['chapter'];
    }
    // Thực hiện truy vấn SQL hoặc xử lý dữ liệu theo các tiêu chí lọc được truyền vào từ form
    // Sau đó, hiển thị kết quả lọc được
} else {
    // Hiển thị thông báo hoặc dữ liệu mặc định nếu không có yêu cầu lọc
    
}
$list = $thongtin->loc($subject,$topic,$chapter);
?>

<?php




$kinhnghiemditau = new kinhnghiemditau();
$thongtintruonghoc = new truonghoc();
$thongtinnguoithan = new nguoithan();


$kinhnghiem = $kinhnghiemditau->selectKinhNghiemDiTau();
$truonghoc = $thongtintruonghoc->selectTruongHoc();
$nguoithan = $thongtinnguoithan->selectNguoiThan();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ///Xóa thông tin thuyền viên
    if (isset($_POST['delete'])) {
        $result2 = $thongtin->delete($_POST['deleteId']);
        if ($result2) {
            echo '<script type="text/javascript">alert("Xóa thành công!");window.location.href = "thongtinhoso.php"; </script>';
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! Thuyền viên còn liên quan thông tin khác.");window.location.href = "thongtinhoso.php";</script>';
        }
    } 
    ///Cập nhật kinh nghiệm đi tàu
    if (isset($_POST['id_thuyenvien1'])) {
        $result = $kinhnghiemditau->insert($_POST);
        if ($result) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_suathuyenvien'])) {
        $result4 = $kinhnghiemditau->update($_POST);
        if ($result4) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_kinhnghiemditau'])) {
        $result3 = $kinhnghiemditau->delete($_POST['id_kinhnghiemditau']);
        if ($result3) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); window.location.href = "thongtinhoso.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! ");</script>';
        }
    } 
    //Cập nhật trường học
    if (isset($_POST['id_thuyenvien2'])) {
        $result5 = $thongtintruonghoc->insert($_POST);
        
        if ($result5) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_suatruonghoc'])) {
        $result7 = $thongtintruonghoc->update($_POST);
        if ($result7) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_truonghoc'])) {
        $result6 = $thongtintruonghoc->delete($_POST['id_truonghoc']);
        if ($result6) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); window.location.href = "thongtinhoso.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! ");</script>';
        }
    } 
    ///Cập nhật người thân
    if (isset($_POST['id_thuyenvien3'])) {
        $result8 = $thongtinnguoithan->insert($_POST);
       
        if ($result8) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_suanguoithan'])) {
        $result10 = $thongtinnguoithan->update($_POST);
        if ($result10) { 
            echo '<script>alert("Lưu thành công!");</script>';
            header("Location:thongtinhoso.php");
        
        }else {
            echo '<script>alert("Lưu không thành công! Vui lòng thử lại. ");</script>';
        }
    } 
    if (isset($_POST['id_nguoithan'])) {
        $result9 = $thongtinnguoithan->delete($_POST['id_nguoithan']);
        
        if ($result9) {
            echo '<script type="text/javascript">alert("Xóa thành công!"); window.location.href = "thongtinhoso.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Xóa thất bại! ");</script>';
        }
    } 
}

?>
<?php include_once 'lib/header.php';?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <body onload="closeNav()">

    

<div>
    <!-- Phần chứa bảng -->
    <!-- <div style="margin-top: 20px;margin-bottom: 20px;">
        
        <form style="display: inline; " action="timkiem2.php" method="POST">
            <input id=timkiem  style="margin-left: 20px;font-size: 17px;" type="text" placeholder="Mã TV, tên TV.." name="timkiem">

            <button style=" background: #ddd;font-size: 19px;border: none;cursor: pointer;" type="submit"><i
                    class="fa fa-search"></i></button>
        </form> -->
        
    </div>
    <div >
        <div>
        <h3>Danh sách tất cả thuyền viên</h3><br> 
        <div style="display: flex; justify-content: flex-end;">
            <form action="themmoithuyenvien.php">
                <button class="btn info">Thêm mới</button>
            </form>
            <form style="display: inline;margin-left: auto; margin-right: 0; " name="form1" id="form1" action="loc.php" method="GET">
                
                <select style="color: gray;margin-left: 20px;font-size: 20px; padding: 5px; border-radius: 10px;"  name="subject" id="subject">
                    <option value="" disabled selected hidden>Trạng thái..</option>
                    <?php
                    // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                    $query1 = "SELECT tentrangthai FROM trangthai";
                    $db1 = new Database();
                    $result1 = $db1->select($query1);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result1) {
                        // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            echo '<option value="' . $row1['tentrangthai'] . '">' . $row1['tentrangthai'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <select style="color: gray;margin-left: 20px;font-size: 20px; padding: 5px; border-radius: 10px;"  name="topic" id="topic">
                    <option value="" disabled selected hidden>Chức danh..</option>
                    <?php
                    // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                    $query2 = "SELECT tenchucdanh FROM chucdanh";
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
                <select style="color: gray;margin-left: 20px;font-size: 20px; padding: 5px; border-radius: 10px;"  name="chapter" id="chapter">
                    <option value="" disabled selected hidden>Tàu..</option>
                    <?php
                    // Thực hiện truy vấn SQL để lấy dữ liệu từ cột tentrangthai của bảng trangthai
                    $query3 = "SELECT tentau FROM tau";
                    $db3 = new Database();
                    $result3 = $db3->select($query3);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result3) {
                        // Duyệt qua từng dòng kết quả và tạo các tùy chọn cho dropdown
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            echo '<option value="' . $row3['tentau'] . '">' . $row3['tentau'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <input class="btn info" style="margin-left: 20px;font-size: 17px;" type="submit" value="Lọc">
            </form>
        </div>
        <br>
        <br>

        <?php
    if ($list) { ?>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Mã thuyền viên</th>
                    <th>Họ và tên</th>
                    <th>Ngày sinh</th>
                    <th>Trạng thái</th>
                    <th>Chức danh</th>
                    <th>Tàu</th>
                    <th>Ngày bắt đầu</th>
                    <th>Thời hạn(tháng) </th>
                    <th>Mã đăng ký</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($list as $key => $value) { ?>
                <tr data-id="<?=$value['id_thuyenvien']?>" onclick="showDetail(this)">
                    <td><?=$value['id_thuyenvien']?></td>
                    <td><?=$value['tenthuyenvien']?></td>
                    <td><?=$value['ngaysinh']?></td>
                    <td><?=$value['trangthai']?></td>
                    <td><?=$value['chucdanh']?></td>
                    <td><?=$value['tentau']?></td>
                    <td><?=$value['ngaybatdau']?></td>
                    <td><?=$value['thoihan']?></td>
                    <td><?=$value['madangky']?></td>
                </tr>
                
            <?php }
            ?>
                
                
                <!-- Kết thúc lặp lại các hàng -->
            </tbody>
        </table>
            
        
        
    <?php } ?>
        


    </div><br>

    <!-- Phần hiển thị chi tiết -->
    <h3>Thông tin chi tiết</h3>
    <div>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'thongtinchitiet')">Thông tin cơ bản</button>
            <button class="tablinks" onclick="openCity(event, 'ditau')">Kinh nghiệm đi tàu</button>
            <button class="tablinks" onclick="openCity(event, 'truonghoc')">Quá trình đào tạo</button>
            <button class="tablinks" onclick="openCity(event, 'nguoithan')">Người thân</button>
        </div>

        <div style="width:100%; overflow:auto;display: flex;" id="thongtinchitiet" class="tabcontent">
            <div style="display: flex; align-items: flex-start;">
                <img id="myImg" style="width: 100px; margin-right: 10px;" src="" alt="">
                
                <table style="border: none;display: flex; ">
                    <tr>
                        <td><label class="lbchitiet ">Mã thuyền viên:</label><br>
                            <input id="mathuyenvien" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Họ tên đầy đủ:</label><br>
                            <input id="tenthuyenvien" class="chitiet" type="text" value=" " readonly>
                        </td>
                        
                        <td><label class="lbchitiet ">Ngày sinh:</label><br>
                            <input id="tentau" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Nơi sinh:</label><br>
                            <input id="loaitau" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Mã đăng ký:</label><br>
                            <input id="chucdanh" class="chitiet" type="text" value=" " readonly>
                        </td>
                    </tr>
                    <tr style="background-color: unset; ">
                        <td><label class="lbchitiet ">Nơi ở, địa chỉ:</label><br>
                            <input id="hokhauthuongtru" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Điện thoại:</label><br>
                            <input id="sdt" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Số CCCD:</label><br>
                            <input id="cccd" class="chitiet" type="text" value=" " readonly>
                        </td>
                        
                        <td><label class="lbchitiet ">Tình trạng:</label><br>
                            <input id="honnhan" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Ngày nhận hồ sơ:</label><br>
                            <input id="ngaynhanhs" class="chitiet" type="text" value=" " readonly>
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td><label class="lbchitiet ">Chiều cao (Cm):</label><br>
                            <input id="chieucao" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Cân nặng (Kg):</label><br>
                            <input id="cannang" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Nhóm máu:</label><br>
                            <input id="nhommau" class="chitiet" type="text" value=" " readonly>
                        </td>
                        <td><label class="lbchitiet ">Size giày:</label><br>
                            <input id="sizegiay" class="chitiet" type="text" value=" " readonly>
                        </td>

                        <td><label class="lbchitiet ">Email:</label><br>
                            <input id="email" class="chitiet" type="text" value=" " readonly>
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td>
                            <div style="display: flex;">
                                <form id="editForm" action="suathuyenvien.php" method="get">
                                    <input type="hidden" id="editId" name="editId" value="">
                                    <input style="margin-right: 10px;" type="submit" value="Sửa" name="edit">
                                </form>
                                <form id="deleteForm" action="thongtinhoso.php" method="post">
                                    <input type="hidden" id="deleteId" name="deleteId" value="">
                                    <input style="" type="submit" value="Xóa" name="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                </form>
                                <!-- <input style="margin-left: 10px;" type="button" value="Xuất file" id="in" name="in" data-in="" onclick="confirmAndRedirect(this)">   -->
                                <button style="margin-left: 10px;" id="in" name="in" data-in="" onclick="confirmAndRedirect(this)">
                                    <i class="fa fa-download"></i> docx
                                </button>
                               <!-- <button style="margin-left: 10px;" id="in2" name="in2" data-in="" onclick="confirmAndRedirect2(this)">
                                    <i class="fa fa-download"></i> pdf
                                </button>-->
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div>
            
            
        </div>

        <div id="ditau" class="tabcontent">

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Tàu</th>
                        <th>Loại tàu</th>
                        <th>Chức danh</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Tổng thời gian</th>
                        <th>Lý do rời tàu</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                    
                </thead>
                <tbody id="kinhnghiemDetail">
                </tbody>
            </table>
            <!-- Nút để mở form -->
            <button id="openFormBtnthemditau" onclick="openFormthemditau()">Thêm</button>
                
        </div>

        
        <div id="truonghoc" class="tabcontent">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Trường</th>
                        <th>Chuyên nghành</th>
                        <th>Từ</th>
                        <th>Đến</th>
                        <th>Xếp loại</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="truonghocDetail">
                </tbody>
            </table>
            <!-- Nút để mở form -->
            <button id="openFormBtnthemtruonghoc" onclick="openFormthemtruonghoc()">Thêm</button>
            <!-- Nội dung mô tả -->
        </div>
        <div id="nguoithan" class="tabcontent">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Quan hệ</th>
                        <th>Năm sinh</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="nguoithanDetail">
                </tbody>
            </table>
            <!-- Nút để mở form -->
            <button id="openFormBtnthemnguoithan" onclick="openFormthemnguoithan()">Thêm</button>
            <!-- Nội dung mô tả -->
        </div>
        
    </div>



<!-- Form -->
<div id="myFormthemditau">
    <span class="close" onclick="closeFormthemditau()">&times;</span>
    <h2>Thêm thông tin đi tàu</h2>
    
    <div id="successMessage" style="display: none; font-style: italic; color: red;"></div><br> <!-- Thêm phần tử hiển thị thông báo -->
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_thuyenvien1" name="id_thuyenvien1" value="" ><br>
        <label for="tentau">Tên tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="tentau" name="tentau" required><br>
        <label for="loaitau">Loại tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="loaitau" name="loaitau" required><br>
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
                            echo '<option value="' . $row2['id_chucdanh'] . '">' . $row2['tenchucdanh'] . '</option>';
                        }
                    }
                    ?>
            </select><br>
        <label for="thoigianbatdau2">Thời gian bắt đầu :<span style="color: red;"> *</span></label>
        <input type="date" id="thoigianbatdau2" name="thoigianbatdau" placeholder="Thời gian bắt đầu.." required><br>
        <label for="thoigianketthuc2">Thời gian kết thúc :<span style="color: red;"> *</span></label>
        <input type="date" id="thoigianketthuc2" name="thoigianketthuc" placeholder="Thời gian kết thúc.." required><br>
        <span id="error-message2" style = "display:none;color: red; text-align: center;">Thời gian kết thúc phải sau thời gian bắt đầu.<br><br></span>
        <label for="lydodoitau">Lý do đổi tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="lydodoitau" name="lydodoitau" required><br>
        <label for="ghichu">Ghi chú :</label>
        <input type="text" id="ghichu" name="ghichu" ><br>
        
        
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

<div id="myFormsuaditau">
    <span class="close" onclick="closeFormsuaditau()">&times;</span>
    <h2>Cập nhật thông tin đi tàu</h2>
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_suathuyenvien" name="id_suathuyenvien" value="" ><br>
        <label for="tentau">Tên tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="tentau" name="tentau" required><br>
        <label for="loaitau">Loại tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="loaitau" name="loaitau" required><br>
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
                            echo '<option value="' . $row2['id_chucdanh'] . '">' . $row2['tenchucdanh'] . '</option>';
                        }
                    }
                    ?>
            </select><br>
        <label for="thoigianbatdau">Thời gian bắt đầu :<span style="color: red;"> *</span></label>
        <input type="date" id="thoigianbatdau" name="thoigianbatdau" placeholder="Thời gian bắt đầu.." required><br>
        <label for="thoigianketthuc	">Thời gian kết thúc :<span style="color: red;"> *</span></label>
        <input type="date" id="thoigianketthuc" name="thoigianketthuc" placeholder="Thời gian kết thúc.." required><br>
        <span id="error-message" style = "display:none;color: red; text-align: center;">Thời gian kết thúc phải sau thời gian bắt đầu.<br><br></span>
        <label for="lydodoitau">Lý do đổi tàu :<span style="color: red;"> *</span></label>
        <input type="text" id="lydodoitau" name="lydodoitau" required><br>
        <label for="ghichu">Ghi chú :</label>
        <input type="text" id="ghichu" name="ghichu" ><br>
        
        
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

<div id="myFormthemtruonghoc">
    <span class="close" onclick="closeFormthemtruonghoc()">&times;</span>
    <h2>Thêm thông tin trường học</h2><br> 
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_thuyenvien2" name="id_thuyenvien2" value="" ><br>
        <label for="tentruong">Tên trường :<span style="color: red;"> *</span></label>
        <input type="text" id="tentruong" name="tentruong" required><br>
        <label for="chuyennghanh">Chuyên nghành :<span style="color: red;"> *</span></label>
        <input type="text" id="chuyennghanh" name="chuyennghanh" required><br>
        <label for="batdau">Thời gian bắt đầu :<span style="color: red;"> *</span></label>
        <input type="date" id="batdau" name="batdau" placeholder="Thời gian bắt đầu.." required><br>
        <label for="ketthuc">Thời gian kết thúc :<span style="color: red;"> *</span></label>
        <input type="date" id="ketthuc" name="ketthuc" placeholder="Thời gian kết thúc.." required><br>
        <span id="error-message3" style = "display:none;color: red; text-align: center;">Thời gian kết thúc phải sau thời gian bắt đầu.<br><br></span>
        <label for="xeploai">Xếp loại :<span style="color: red;"> *</span></label>
        <input type="text" id="xeploai" name="xeploai" required><br>
        <label for="ghichu">Ghi chú:</label>
        <input type="text" id="ghichu" name="ghichu" ><br>
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

<div id="myFormsuatruonghoc">
    <span class="close" onclick="closeFormsuatruonghoc()">&times;</span>
    <h2>Cập nhật thông tin trường học</h2><br> 
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_suatruonghoc" name="id_suatruonghoc" value="" ><br>
        <label for="tentruong">Tên trường :<span style="color: red;"> *</span></label>
        <input type="text" id="tentruong" name="tentruong" required><br>
        <label for="chuyennghanh">Chuyên nghành :<span style="color: red;"> *</span></label>
        <input type="text" id="chuyennghanh" name="chuyennghanh" required><br>
        <label for="batdau">Thời gian bắt đầu :<span style="color: red;"> *</span></label>
        <input type="date" id="batdau4" name="batdau" placeholder="Thời gian bắt đầu.." required><br>
        <label for="ketthuc">Thời gian kết thúc :<span style="color: red;"> *</span></label>
        <input type="date" id="ketthuc4" name="ketthuc" placeholder="Thời gian kết thúc.." required><br>
        <span id="error-message4" style = "display:none;color: red; text-align: center;">Thời gian kết thúc phải sau thời gian bắt đầu.<br><br></span>
        <label for="xeploai">Xếp loại :<span style="color: red;"> *</span></label>
        <input type="text" id="xeploai" name="xeploai" required><br>
        <label for="ghichu">Ghi chú:</label>
        <input type="text" id="ghichu" name="ghichu" ><br>
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

<div id="myFormthemnguoithan">
    <span class="close" onclick="closeFormthemnguoithan()">&times;</span>
    <h2>Thêm thông tin người thân</h2><br> 
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data" onsubmit="normalizeName()">
        <input type="hidden" id="id_thuyenvien3" name="id_thuyenvien3" value="" ><br>
        <label for="hoten">Họ tên :<span style="color: red;"> *</span></label>
        <input type="text" id="hoten" name="hoten" placeholder="Họ tên.." required><br>
        <label for="quanhe">Quan hệ :<span style="color: red;"> *</span></label>
        <input type="text" id="quanhe" name="quanhe" placeholder="Quan hệ.." required><br>
        <label for="namsinh">Năm sinh :<span style="color: red;"> *</span></label>
        <select id="namsinh" name="namsinh" required>
            <option value="" disabled selected>Chọn năm sinh..</option>
            <script>
                var startYear = 1954;
                var endYear = new Date().getFullYear();
                var select = document.getElementById('namsinh');
                for (var year = startYear; year <= endYear; year++) {
                    var option = document.createElement('option');
                    option.value = year;
                    option.text = year;
                    select.appendChild(option);
                }
            </script>
        </select>
        <label for="diachi">Địa chỉ :<span style="color: red;"> *</span></label>
        <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ.." required><br>
        <label for="dienthoai">Điện thoại :<span style="color: red;"> *</span></label>
        <input type="number" id="dienthoai" name="dienthoai" placeholder="Điện thoại.." required onblur="validatePhone()"><br>
        <span id="sdtError" style = "display:none;color: red; text-align: center;">Số điện thoại phải có 10 hoặc 11 chữ số.</span>
        <label for="ghichu">Ghi chú:</label>
        <input type="text" id="ghichu" name="ghichu" placeholder="Ghi chú.." ><br>
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

<div id="myFormsuanguoithan">
    <span class="close" onclick="closeFormsuanguoithan()">&times;</span>
    <h2>Cập nhật thông tin người thân</h2><br> 
    <form id="myForm" action="thongtinhoso.php" method="post" enctype="multipart/form-data" onsubmit="normalizeName2()">
        <input type="hidden" id="id_suanguoithan" name="id_suanguoithan" value="" ><br>
        <label for="hoten">Họ tên :<span style="color: red;"> *</span></label>
        <input type="text" id="hoten2" name="hoten" placeholder="Họ tên.." required><br>
        <label for="quanhe">Quan hệ :<span style="color: red;"> *</span></label>
        <input type="text" id="quanhe" name="quanhe" placeholder="Quan hệ.." required><br>
        <label for="namsinh2">Năm sinh :<span style="color: red;"> *</span></label>
        <select id="namsinh2" name="namsinh" required>
            <option value="" disabled selected>Chọn năm sinh..</option>
            <script>
                var startYear2 = 1954;
                var endYear2 = new Date().getFullYear();
                var select2 = document.getElementById('namsinh2');
                for (var year2 = startYear2; year2 <= endYear2; year2++) {
                    var option2 = document.createElement('option');
                    option2.value = year2;
                    option2.text = year2;
                    select2.appendChild(option2);
                }
            </script>
        </select>
        <label for="diachi">Địa chỉ :<span style="color: red;"> *</span></label>
        <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ.." required><br>
        <label for="dienthoai2">Điện thoại :<span style="color: red;"> *</span></label>
        <input type="number" id="dienthoai2" name="dienthoai" placeholder="Điện thoại.." required onblur="validatePhone2()"><br>
        <span id="sdtError2" style = "display:none;color: red; text-align: center;">Số điện thoại phải có 10 hoặc 11 chữ số.</span>
        <label for="ghichu">Ghi chú:</label>
        <input type="text" id="ghichu" name="ghichu" placeholder="Ghi chú.." ><br>
        <br>
        <input type="submit" name="submit" value="Lưu">
        
    </form>


    
</div>

</div>


<script>
    
</script>
<script>
    var selectedThuyenVien = null; // Biến lưu trữ thông tin thuyền viên được chọn
    var id = null;
    var trangthaitv = null;
    // Hàm hiển thị thông tin chi tiết
    function showDetail(row) {
        id = row.getAttribute('data-id');
        
        
        // Giả sử 'details' là một mảng chứa thông tin chi tiết, bạn cần cập nhật dữ liệu từ mảng này
        var details = <?php echo json_encode($list); ?>;
        var detail = details.find(item => item.id_thuyenvien == id);

        var details2 = <?php echo json_encode($kinhnghiem); ?>;
        selectedThuyenVien = details2.filter(item => item.id_thuyenvien == id);

        var details3 = <?php echo json_encode($truonghoc); ?>;
        selectedTruongHoc = details3.filter(item => item.id_thuyenvien == id);

        var details4 = <?php echo json_encode($nguoithan); ?>;
        selectedNguoiThan = details4.filter(item => item.id_thuyenvien == id);
        // Cập nhật nội dung của bảng kinh nghiệm đi tàu
        trangthaitv = detail.trangthai;
        updateKinhNghiemTable();
        updateTruongHocTable();
        updateNguoiThanTable();
        // Cập nhật giá trị của các input
        document.getElementById("myImg").src = detail.anh;
        document.getElementById("mathuyenvien").value = detail.id_thuyenvien;
        document.getElementById("deleteId").value = detail.id_thuyenvien;
        document.getElementById("editId").value = detail.id_thuyenvien;
        document.getElementById("tenthuyenvien").value = detail.tenthuyenvien;
        document.getElementById("chucdanh").value = detail.madangky;
        
        document.getElementById("loaitau").value = detail.noisinh;
        document.getElementById("hokhauthuongtru").value = detail.hokhauthuongtru;
        document.getElementById("sdt").value = detail.sdt;
        document.getElementById("cccd").value = detail.cccd;
        document.getElementById("id_thuyenvien1").value = id;
        document.getElementById("id_thuyenvien2").value = id;
        document.getElementById("id_thuyenvien3").value = id;

        if (detail.honnhan === '1') {
            document.getElementById("honnhan").value = "Đã kết hôn";
        } else {
            document.getElementById("honnhan").value = "Chưa kết hôn";
        }

        // Lấy ngày, tháng, năm từ biến detail.ngaynhanhs
        var dateParts = detail.ngaynhanhs.split('-');
        var day = dateParts[2];
        var month = dateParts[1];
        var year = dateParts[0];
        // Định dạng lại ngày theo định dạng "d/m/y"
        var formattedDate = day + '/' + month + '/' + year;


        // Lấy ngày, tháng, năm từ biến detail.ngaynhanhs
        var dateParts2 = detail.ngaysinh.split('-');
        var day2 = dateParts2[2];
        var month2 = dateParts2[1];
        var year2 = dateParts2[0];
        // Định dạng lại ngày theo định dạng "d/m/y"
        var formattedDate2 = day2 + '/' + month2 + '/' + year2;
        document.getElementById("tentau").value = formattedDate2;



        // Đặt giá trị cho trường nhập liệu có id là "ngaynhanhs"
        document.getElementById("ngaynhanhs").value = formattedDate;

        document.getElementById("chieucao").value = detail.chieucao;
        document.getElementById("cannang").value = detail.cannang;
        document.getElementById("nhommau").value = detail.nhommau;
        document.getElementById("sizegiay").value = detail.sizegiay;
        document.getElementById("email").value = detail.email;
        // Cập nhật các trường thông tin khác
        var deleteButton = document.getElementById("deleteForm");
        deleteButton.style.display = 'inline-block';
        var editButton = document.getElementById('editForm');
        editButton.style.display = 'inline-block'; // Ẩn nút "Sửa"
        
        // Lấy thẻ input
        var input = document.getElementById("in");
        // Lấy thẻ input
        //var input2 = document.getElementById("in2");
        input.style.display = 'inline-block'; // Ẩn nút "Sửa"
        //input2.style.display = 'inline-block'; // Ẩn nút "Sửa"
        // Cập nhật đường dẫn cho thẻ input
        input.setAttribute("data-in", "xuatcv.php?idtv=" + id);
        // Cập nhật đường dẫn cho thẻ input
        //input2.setAttribute("data-in", "xuatcv2.php?idtv=" + id);

    }

    function updateKinhNghiemTable() {
        var kinhNghiemTable = document.getElementById('kinhnghiemDetail');
        kinhNghiemTable.innerHTML = ''; // Xóa nội dung cũ

        if (selectedThuyenVien.length > 0) {
            // Hiển thị thông tin kinh nghiệm đi tàu của thuyền viên được chọn
            selectedThuyenVien.forEach(function(item) {
                var row = document.createElement('tr');
                // Tính thời gian
                var thoigianbatdau = new Date(item.thoigianbatdau);
                var thoigianketthuc = new Date(item.thoigianketthuc);

                // Số tháng chênh lệch
                var diffMonths = (thoigianketthuc.getFullYear() - thoigianbatdau.getFullYear()) * 12;
                diffMonths -= thoigianbatdau.getMonth();
                diffMonths += thoigianketthuc.getMonth();

                // Tính số ngày cụ thể
                var diffDays = thoigianketthuc.getDate() - thoigianbatdau.getDate();
                // Nếu số ngày âm, trừ số tháng và thêm 30 ngày
                if (diffDays < 0) {
                    diffMonths--;
                    diffDays += 30;
                }

                var totalTime = diffMonths + " tháng " + diffDays + " ngày";

                row.innerHTML = `
                    <td>${item.tentau}</td>
                    <td>${item.loaitau}</td>
                    <td>${item.tenchucdanh}</td>
                    <td>${item.thoigianbatdau}</td>
                    <td>${item.thoigianketthuc}</td>
                    <td>${totalTime}</td>
                    <td>${item.lydodoitau}</td>
                    <td>${item.ghichu}</td>
                    <td>
                        <div style="display: flex;">
                            <button id="openFormBtnsuaditau" data-id="${item.id}" onclick="openFormsuaditau(event)">Sửa</button>
                            <form id="deleteForm" action="thongtinhoso.php" method="post" >
                                <input type="hidden" id="id_kinhnghiemditau" name="id_kinhnghiemditau" value="${item.id}">
                                <input style="" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            </form>
                        </div>
                    </td>
                `;
                kinhNghiemTable.appendChild(row);
            });
        } else {
            kinhNghiemTable.innerHTML = '<tr><td colspan="9">Không có thông tin kinh nghiệm đi tàu cho thuyền viên này.</td></tr>';
        }
        if (trangthaitv === 'Đã thôi việc'){
            document.getElementById("openFormBtnthemditau").style.display = "none";
        }else{
            document.getElementById("openFormBtnthemditau").style.display = "block";
        }
        
    }

    function updateTruongHocTable() {
        var truonghocTable = document.getElementById('truonghocDetail');
        truonghocTable.innerHTML = ''; // Xóa nội dung cũ

        if (selectedTruongHoc.length > 0) {
            // Hiển thị thông tin kinh nghiệm đi tàu của thuyền viên được chọn
            selectedTruongHoc.forEach(function(item) {
                var row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${item.tentruong}</td>
                    <td>${item.chuyennghanh}</td>
                    <td>${item.batdau}</td>
                    <td>${item.ketthuc}</td>
                    <td>${item.xeploai}</td>
                    <td>${item.ghichu}</td>
                    <td>
                        <div style="display: flex;">
                            <button id="openFormBtnsuatruonghoc" data-id="${item.id}" onclick="openFormsuatruonghoc(event)">Sửa</button>
                            <form id="deleteForm" action="thongtinhoso.php" method="post" >
                                <input type="hidden" id="id_truonghoc" name="id_truonghoc" value="${item.id}">
                                <input style="" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            </form>
                            
                        </div>
                    </td>
                `;
                truonghocTable.appendChild(row);
            });
        } else {
            truonghocTable.innerHTML = '<tr><td colspan="9">Không có thông tin trường học cho thuyền viên này.</td></tr>';
        }
        
        if (trangthaitv === 'Đã thôi việc'){
            document.getElementById("openFormBtnthemtruonghoc").style.display = "none";
        }else{
            document.getElementById("openFormBtnthemtruonghoc").style.display = "block";
        }
    }

    function updateNguoiThanTable() {
        var nguoithanTable = document.getElementById('nguoithanDetail');
        nguoithanTable.innerHTML = ''; // Xóa nội dung cũ

        if (selectedNguoiThan.length > 0) {
            // Hiển thị thông tin kinh nghiệm đi tàu của thuyền viên được chọn
            selectedNguoiThan.forEach(function(item) {
                var row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${item.hoten}</td>
                    <td>${item.quanhe}</td>
                    <td>${item.namsinh}</td>
                    <td>${item.dienthoai}</td>
                    <td>${item.diachi}</td>
                    <td>${item.ghichu}</td>
                    <td>
                        <div style="display: flex;">
                        <button id="openFormBtnsuanguoithan" data-id="${item.id}" onclick="openFormsuanguoithan(event)">Sửa</button>
                            <form id="deleteForm" action="thongtinhoso.php" method="post" >
                                <input type="hidden" id="id_nguoithan" name="id_nguoithan" value="${item.id}">
                                <input style="" type="submit" value="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            </form>
                        </div>
                    </td>
                `;
                nguoithanTable.appendChild(row);
            });
        } else {
            nguoithanTable.innerHTML = '<tr><td colspan="9">Không có thông tin người thân cho thuyền viên này.</td></tr>';
        }
        
        if (trangthaitv === 'Đã thôi việc'){
            document.getElementById("openFormBtnthemnguoithan").style.display = "none";
        }else{
            document.getElementById("openFormBtnthemnguoithan").style.display = "block";
        }
    }

</script>
<script>
    // Kiểm tra khi trang được tải
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButton = document.getElementById("deleteForm");
        deleteButton.style.display = 'none'; // Gọi hàm toggleDeleteButton để ẩn hoặc hiển thị nút "Xóa"
        var editButton = document.getElementById('editForm');
        editButton.style.display = 'none'; // Ẩn nút "Sửa"
        
        document.getElementById("openFormBtnthemditau").style.display = "none";
        document.getElementById("openFormBtnthemtruonghoc").style.display = "none";
        document.getElementById("openFormBtnthemnguoithan").style.display = "none";
        document.getElementById("in").style.display = "none";
        //document.getElementById("in2").style.display = "none";
    });

    function confirmAndRedirect(element) {
        if (confirm('Bạn muốn tải file xuống ?')) {
            window.location.href = element.getAttribute('data-in');
        }
    }
    function confirmAndRedirect2(element) {
        window.location.href = element.getAttribute('data-in');
    }
    function validateDates() {
        var startDate = document.getElementById('thoigianbatdau').value;
        var endDate = document.getElementById('thoigianketthuc').value;
        var errorMessage = document.getElementById('error-message');
        
        if (startDate && endDate) {
            if (new Date(startDate) >= new Date(endDate)) {
                errorMessage.style.display = 'inline';
                document.getElementById('thoigianketthuc').value = '';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    }
    
    document.getElementById('thoigianketthuc').addEventListener('blur', validateDates);
    document.getElementById('thoigianbatdau').addEventListener('blur', validateDates);




    function validateDates2() {
        var startDate = document.getElementById('thoigianbatdau2').value;
        var endDate = document.getElementById('thoigianketthuc2').value;
        var errorMessage = document.getElementById('error-message2');
        
        if (startDate && endDate) {
            if (new Date(startDate) >= new Date(endDate)) {
                errorMessage.style.display = 'inline';
                document.getElementById('thoigianketthuc2').value = '';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    }
    
    document.getElementById('thoigianketthuc2').addEventListener('blur', validateDates2);
    document.getElementById('thoigianbatdau2').addEventListener('blur', validateDates2);

    function validateDates3() {
        var startDate = document.getElementById('batdau').value;
        var endDate = document.getElementById('ketthuc').value;
        var errorMessage = document.getElementById('error-message3');
        
        if (startDate && endDate) {
            if (new Date(startDate) >= new Date(endDate)) {
                errorMessage.style.display = 'inline';
                document.getElementById('ketthuc').value = '';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    }
    
    document.getElementById('batdau').addEventListener('blur', validateDates3);
    document.getElementById('ketthuc').addEventListener('blur', validateDates3);
    
    function validateDates4() {
        var startDate = document.getElementById('batdau4').value;
        var endDate = document.getElementById('ketthuc4').value;
        var errorMessage = document.getElementById('error-message4');
        
        if (startDate && endDate) {
            if (new Date(startDate) >= new Date(endDate)) {
                errorMessage.style.display = 'inline';
                document.getElementById('ketthuc4').value = '';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    }
    
    document.getElementById('batdau4').addEventListener('blur', validateDates4);
    document.getElementById('ketthuc4').addEventListener('blur', validateDates4);


    function capitalizeName(name) {
        // Xóa dấu cách ở đầu và cuối, và dấu cách thừa giữa các từ
        name = name.trim().replace(/\s+/g, ' ');

        // Viết hoa chữ cái đầu của mỗi từ
        return name.split(' ').map(function(word) {
            return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
        }).join(' ');
    }

    function normalizeName() {
        var input = document.getElementById("hoten");
        input.value = capitalizeName(input.value);
    }
    function normalizeName2() {
        var input = document.getElementById("hoten2");
        input.value = capitalizeName(input.value);
    }
    function validatePhone() {
        var input = document.getElementById("dienthoai");
        var error = document.getElementById("sdtError");
        if (input.value.length !== 10 && input.value.length !== 11) {
            input.value = ""; // Xóa nội dung trường nhập liệu
            error.style.display = "block"; // Hiển thị thông báo lỗi
        } else {
            error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
        }
    }
    function validatePhone2() {
        var input = document.getElementById("dienthoai2");
        var error = document.getElementById("sdtError2");
        if (input.value.length !== 10 && input.value.length !== 11) {
            input.value = ""; // Xóa nội dung trường nhập liệu
            error.style.display = "block"; // Hiển thị thông báo lỗi
        } else {
            error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
        }
    }
</script>

<?php include_once 'lib/footer.php';?>