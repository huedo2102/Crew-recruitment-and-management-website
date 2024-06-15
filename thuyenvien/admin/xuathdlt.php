<?php

include_once('lib/database.php');
require_once 'lib/vendor/autoload.php';


use PhpOffice\PhpWord\TemplateProcessor;
$db = new Database();
// Lấy ID của thuyền viên từ URL hoặc từ dữ liệu người dùng
$id_hd = isset($_GET['idhd']) ? $_GET['idhd'] : null;
$id_thuyenvien = isset($_GET['idtv']) ? $_GET['idtv'] : null;

//Lấy thông tin thuyền viên
$query = "SELECT *
    FROM 
        thuyenvien 
    where id_thuyenvien = $id_thuyenvien ;
    ";
    
$mysqli_result = $db->select($query);
$result_tv = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);

//Lấy thông tin người thân
$query2 = "SELECT * FROM nguoithan
    where id_thuyenvien = $id_thuyenvien LIMIT 1;
    ";
    
$mysqli_result2 = $db->select($query2);
$result_nt = mysqli_fetch_all($mysqli_result2, MYSQLI_ASSOC);

//Lấy thông tin hợp đồng
$query3 = "SELECT * FROM hopdonglentau
    INNER JOIN tau ON hopdonglentau.tau = tau.id
    where sohopdong = '$id_hd';
    ";
    
$mysqli_result3 = $db->select($query3);
$result_hd = mysqli_fetch_all($mysqli_result3, MYSQLI_ASSOC);




// Khởi tạo đối tượng TemplateProcessor với tệp mẫu
$templateProcessor = new TemplateProcessor('lib/HDTV.docx');

$date = $result_hd[0]['ngayky']; // Ngày kiểu 'YYYY-MM-DD'
$result_hd[0]['ngayky'] = ' ngày ' . date('d', strtotime($date)) . ' tháng ' . date('m', strtotime($date)) . ' năm ' . date('Y', strtotime($date));

$date2 = $result_tv[0]['ngaysinh']; // Ngày kiểu 'YYYY-MM-DD'
$result_tv[0]['ngaysinh'] = date('d', strtotime($date2)) . '/' . date('m', strtotime($date2)) . '/' . date('Y', strtotime($date2));

$date3 = $result_hd[0]['ngaybatdau']; // Ngày kiểu 'YYYY-MM-DD'
$result_hd[0]['ngaybatdau'] = date('d', strtotime($date3)) . '/' . date('m', strtotime($date3)) . '/' . date('Y', strtotime($date3));


// Điền thông tin vào tệp mẫu
$templateProcessor->setValue('sohopdong', $result_hd[0]['sohopdong']);
$templateProcessor->setValue('ngayky', $result_hd[0]['ngayky']);
$templateProcessor->setValue('nguoiky', $result_hd[0]['nguoiky']);
$templateProcessor->setValue('chucdanh_nguoiky', $result_hd[0]['chucdanh_nguoiky']);
$templateProcessor->setValue('tenthuyenvien', $result_tv[0]['tenthuyenvien']);
$templateProcessor->setValue('ngaysinh', $result_tv[0]['ngaysinh']);
$templateProcessor->setValue('hokhauthuongtru', $result_tv[0]['hokhauthuongtru']);
$templateProcessor->setValue('CCCD', $result_tv[0]['cccd']);
$templateProcessor->setValue('hoten', $result_nt[0]['hoten']);
$templateProcessor->setValue('quanhe', $result_nt[0]['quanhe']);
$templateProcessor->setValue('diachi', $result_nt[0]['diachi']);
$templateProcessor->setValue('dienthoai', $result_nt[0]['dienthoai']);
$templateProcessor->setValue('tau', $result_hd[0]['tentau']);
$templateProcessor->setValue('thoihan', $result_hd[0]['thoihan']);
$templateProcessor->setValue('ngaybatdau', $result_hd[0]['ngaybatdau']);
$templateProcessor->setValue('chucdanh', $result_hd[0]['chucdanh']);
$templateProcessor->setValue('nguoisdld', $result_hd[0]['nguoisdld']);
$templateProcessor->setValue('diachi_nguoisdld', $result_hd[0]['diachi_nguoisdld']);



// Lưu tệp mới
$newFileName = 'HDTV'.time().'.docx';
$templateProcessor->saveAs($newFileName);


// // Thiết lập HTTP headers để tải xuống tệp mà không lưu lại
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="' . basename($newFileName) . '"');
// header('Content-Length: ' . filesize($newFileName));
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');

// // Đọc và ghi nội dung của tệp để truyền nó cho người dùng
// readfile($newFileName);

// // Xóa tệp sau khi đã truyền nội dung cho người dùng
// unlink($newFileName);

header("Location: download.php?file=" . urlencode($newFileName));
exit();