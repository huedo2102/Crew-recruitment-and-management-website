<?php
require_once 'lib/vendor/autoload.php';
include_once 'classes/thongtinhoso.php';
include_once 'classes/chungchi.php';
include_once 'classes/kinhnghiemditau.php';
include_once 'classes/truonghoc.php';
include_once 'classes/nguoithan.php';

use PhpOffice\PhpWord\TemplateProcessor;

$kinhnghiemditau = new kinhnghiemditau();
$thongtintruonghoc = new truonghoc();


// Lấy ID của thuyền viên từ URL hoặc từ dữ liệu người dùng
$id_thuyenvien = isset($_GET['idtv']) ? $_GET['idtv'] : null;
$thongtin = new thuyenvien();
$list = $thongtin->xemThongTinThuyenVien($id_thuyenvien);
$truonghoc = $thongtintruonghoc->selectTruongHoc_id($id_thuyenvien);
$kinhnghiem = $kinhnghiemditau->selectKinhNghiemDiTau_id($id_thuyenvien);
$chungchi = new chungchi(); 
$list2 = $chungchi->xemthongtintheoid($id_thuyenvien);

// Kiểm tra giá trị của $list['honnhan'] và gán lại nếu cần
if ($list['honnhan'] == 1) {
    $list['honnhan'] = "Đã kết hôn";
}else{
    $list['honnhan'] = "Chưa kết hôn";
}

// Khởi tạo đối tượng TemplateProcessor với tệp mẫu
$templateProcessor = new TemplateProcessor('lib/crewcard.docx');

// Điền thông tin vào tệp mẫu
$templateProcessor->setImageValue('anh', array('path' => $list['anh'], 'width' => 113.4, 'height' => 151.2, 'ratio' => false));
$templateProcessor->setValue('tenthuyenvien', $list['tenthuyenvien']);
$templateProcessor->setValue('noisinh', $list['noisinh']);
$templateProcessor->setValue('ngaysinh', $list['ngaysinh']);
$templateProcessor->setValue('CCCD', $list['cccd']);
$templateProcessor->setValue('chieucao', $list['chieucao']);
$templateProcessor->setValue('sizegiay', $list['sizegiay']);
$templateProcessor->setValue('honnhan', $list['honnhan']);
$templateProcessor->setValue('cannang', $list['cannang']);
$templateProcessor->setValue('nhommau', $list['nhommau']);
$templateProcessor->setValue('sdt', $list['sdt']);
$templateProcessor->setValue('email', $list['email']);
$templateProcessor->setValue('hokhauthuongtru', $list['hokhauthuongtru']);


// Khai báo mảng trước vòng lặp
$values = [];

// Duyệt qua mảng $truonghoc và thêm dữ liệu vào mảng $values
foreach ($truonghoc as $key => $th) { 
    $values[] = ['tentruong' => $th['tentruong'], 'chuyennghanh' => $th['chuyennghanh'], 'batdau' => $th['batdau'], 'ketthuc' => $th['ketthuc'], 'xeploai' => $th['xeploai']];
}

// Sử dụng mảng $values để sao chép hàng và điền dữ liệu vào tài liệu Word
$templateProcessor->cloneRowAndSetValues('tentruong', $values);


// Khai báo mảng trước vòng lặp
$values2 = [];

// Duyệt qua mảng $truonghoc và thêm dữ liệu vào mảng $values
foreach ($list2 as $key => $th) { 
    $values2[] = ['tenloaichungchi' => $th['tenloaichungchi'], 'tenchungchi' => $th['tenchungchi'], 'sogiayto' => $th['sogiayto'], 'ngaycap' => $th['ngaycap'], 'ngayhethan' => $th['ngayhethan']];
}

// Sử dụng mảng $values để sao chép hàng và điền dữ liệu vào tài liệu Word
$templateProcessor->cloneRowAndSetValues('tenloaichungchi', $values2);


// Khai báo mảng trước vòng lặp
$values3 = [];

// Duyệt qua mảng $truonghoc và thêm dữ liệu vào mảng $values
foreach ($kinhnghiem as $key => $th) { 
    $values3[] = ['tentau' => $th['tentau'], 'tenchucdanh' => $th['tenchucdanh'], 'loaitau' => $th['loaitau'], 'thoigianbatdau' => $th['thoigianbatdau'], 'thoigianketthuc' => $th['thoigianketthuc'], 'lydodoitau' => $th['lydodoitau'], ];
}

// Sử dụng mảng $values để sao chép hàng và điền dữ liệu vào tài liệu Word
$templateProcessor->cloneRowAndSetValues('tentau', $values3);



// Lưu tệp mới
$newFileName = 'crewcard_filled'.time().'.docx';
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

// Chuyển hướng người dùng đến trang tải xuống tạm thời
header("Location: download.php?file=" . urlencode($newFileName));
exit();