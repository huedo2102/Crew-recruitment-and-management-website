<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class hopdonglentau
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function xemthongtin()
    {
        $query = "SELECT 
        tv.id_thuyenvien AS id_thuyenvien,
        tv.tenthuyenvien AS tenthuyenvien,
        tv.ngaysinh AS ngaysinh,
        tv.trangthai AS trangthaitv,
        trangthai.tentrangthai,
        COUNT(CASE WHEN hdlt.trangthai = 1 THEN 1 END) AS soluong_dathanhly,
        COUNT(CASE WHEN hdlt.trangthai = 0 THEN 1 END) AS soluong_chuathanhly
    FROM 
        thuyenvien tv
    LEFT JOIN 
        hopdonglentau hdlt ON tv.id_thuyenvien = hdlt.hopdong_tv
    LEFT JOIN 
        trangthai ON tv.trangthai = trangthai.matrangthai
    GROUP BY 
        tv.id_thuyenvien;
    
        ";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function timkiemtheoten($timkiem)
    {
        $query = "SELECT 
        tv.id_thuyenvien AS id_thuyenvien,
        tv.tenthuyenvien AS tenthuyenvien,
        tv.ngaysinh AS ngaysinh,
        COUNT(CASE WHEN hdlt.trangthai = 1 THEN 1 END) AS soluong_dathanhly,
        COUNT(CASE WHEN hdlt.trangthai = 0 THEN 1 END) AS soluong_chuathanhly
    FROM 
        thuyenvien tv
    LEFT JOIN 
        hopdonglentau hdlt ON tv.id_thuyenvien = hdlt.hopdong_tv
        WHERE 
            1 = 1"; // Bắt đầu truy vấn với điều kiện mặc định

        // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
        if (!empty($timkiem)) {
            // Xác định xem $timkiem có phải là id_thuyenvien hay là tenthuyenvien
            if (is_numeric($timkiem)) {
                // Nếu $timkiem là số, giả sử là id_thuyenvien
                $query .= " AND tv.id_thuyenvien = $timkiem";
            } else {
                // Ngược lại, giả sử là tenthuyenvien và thực hiện tìm kiếm theo tên thuyền viên
                $query .= " AND tv.tenthuyenvien LIKE '%$timkiem%'";
            }
        }
        
        $query .= " GROUP BY tv.id_thuyenvien"; // Sử dụng GROUP BY để tránh kết quả trùng lặp
        // Thực hiện truy vấn và xử lý kết quả
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function chontatca()
    {
        $query = "SELECT kt.*, tau.tentau, tv.tenthuyenvien, tv.trangthai AS trangthaitv, CASE WHEN kt.trangthai = 1 THEN 'Đã thanh lý' ELSE 'Chưa thanh lý' END AS trangthai_text 
                FROM hopdonglentau kt
                LEFT JOIN thuyenvien tv ON kt.hopdong_tv = tv.id_thuyenvien
                LEFT JOIN tau ON tau.id = kt.tau
                ORDER BY kt.ngayky DESC"; // Thêm mệnh đề ORDER BY vào câu truy vấn
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }


  
    
    public function insert($data)
    {   
        $sohopdong = $data['sohopdong'];
        $tau = $data['tau'];
        $chucdanh = $data['chucdanh'];
        $hopdong_tv = $data['id_thuyenvien1'];
        $ngaybatdau  = $data['ngaybatdau'];
        $thoihan = $data['thoihan'];
        $ngayky = $data['ngayky'];
        $nguoiky = $data['nguoiky'];
        $chucdanh_nguoiky = $data['chucdanh_nguoiky'];
        $nguoisdld = $data['nguoisdld'];
        $diachi_nguoisdld = $data['diachi_nguoisdld'];
        $trangthai = $data['trangthai'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO hopdonglentau (sohopdong, tau, chucdanh, hopdong_tv, ngaybatdau, thoihan, ngayky, nguoiky, chucdanh_nguoiky, nguoisdld, diachi_nguoisdld, trangthai) 
            VALUES ('$sohopdong','$tau','$chucdanh', '$hopdong_tv', '$ngaybatdau', '$thoihan', '$ngayky', '$nguoiky', '$chucdanh_nguoiky', '$nguoisdld', '$diachi_nguoisdld', '0')";
        
        if (isset($_FILES['file_cv']) && $_FILES['file_cv']['error'] == UPLOAD_ERR_OK) {
            // Kiểm tra và di chuyển hình ảnh vào thư mục upload
            $file_name = $_FILES['file_cv']['name'];
            $file_temp = $_FILES['file_cv']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "HD_scan/" . $unique_image;
            move_uploaded_file($file_temp, $uploaded_image);

            

            $query = "INSERT INTO hopdonglentau (sohopdong, tau, chucdanh, hopdong_tv, ngaybatdau, thoihan, ngayky, nguoiky, chucdanh_nguoiky, nguoisdld, diachi_nguoisdld, trangthai, file_scan) 
            VALUES ('$sohopdong','$tau','$chucdanh', '$hopdong_tv', '$ngaybatdau', '$thoihan', '$ngayky', '$nguoiky', '$chucdanh_nguoiky', '$nguoisdld', '$diachi_nguoisdld', '0', '$uploaded_image')";
        
        
        }

        $result = $this->db->insert($query);

        


        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        
        $sohopdong = $data['sohopdong'];
        $tau = $data['tau'];
        $chucdanh = $data['chucdanh'];
        $hopdong_tv = $data['id_thuyenvien2'];
        $ngaybatdau  = $data['ngaybatdau'];
        $thoihan = $data['thoihan'];
        $ngayky = $data['ngayky'];
        $nguoiky = $data['nguoiky'];
        $chucdanh_nguoiky = $data['chucdanh_nguoiky'];
        $nguoisdld = $data['nguoisdld'];
        $diachi_nguoisdld = $data['diachi_nguoisdld'];
        $trangthai = $data['trangthai'];
        

        // Tính thời gian kết thúc
        $ngaybatdau_date = new DateTime($ngaybatdau);
        $ngaybatdau_date->modify("+$thoihan months");
        $thoigianketthuc = $ngaybatdau_date->format('Y-m-d');

        if ($trangthai == '1'){
            $query2 = "SELECT tentau, tenloaitau FROM tau 
                INNER JOIN loaitau ON tau.loaitau_id = loaitau.id
                WHERE tau.id = '$tau'"; // Thêm mệnh đề ORDER BY vào câu truy vấn
            $mysqli_result2 = $this->db->select($query2);
            $result2 = mysqli_fetch_all($mysqli_result2, MYSQLI_ASSOC);

            $query3 = "SELECT * FROM chucdanh 
                WHERE chucdanh.tenchucdanh = '$chucdanh'"; // Thêm mệnh đề ORDER BY vào câu truy vấn
            $mysqli_result3 = $this->db->select($query3);
            $result3 = mysqli_fetch_all($mysqli_result3, MYSQLI_ASSOC);
            $id_chucdanh = $result3[0]['id_chucdanh'];

            $tentau = $result2[0]['tentau'];
            $loaitau = $result2[0]['tenloaitau'];
            $query3 = "INSERT INTO kinhnghiemditau (id_thuyenvien, tentau, loaitau, chucdanh, thoigianbatdau, thoigianketthuc, lydodoitau, ghichu) 
                VALUES ('$hopdong_tv', '$tentau', '$loaitau', '$id_chucdanh', '$ngaybatdau', '$thoigianketthuc', 'Hết hợp đồng', 'XK Nhật Việt')";
            $result3 = $this->db->insert($query3);


        }


        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE hopdonglentau SET ngaybatdau = '$ngaybatdau',tau = '$tau',chucdanh = '$chucdanh', thoihan = '$thoihan', ngayky = '$ngayky', 
        nguoiky = '$nguoiky', chucdanh_nguoiky = '$chucdanh_nguoiky', nguoisdld = '$nguoisdld', diachi_nguoisdld = '$diachi_nguoisdld', trangthai = '$trangthai'
        WHERE sohopdong = '$sohopdong'";
        if (isset($_FILES['file_cv']) && $_FILES['file_cv']['error'] == UPLOAD_ERR_OK) {
            // Kiểm tra và di chuyển hình ảnh vào thư mục upload
            $file_name = $_FILES['file_cv']['name'];
            $file_temp = $_FILES['file_cv']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "HD_scan/" . $unique_image;
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "UPDATE hopdonglentau SET ngaybatdau = '$ngaybatdau',tau = '$tau',chucdanh = '$chucdanh', thoihan = '$thoihan', ngayky = '$ngayky', 
        nguoiky = '$nguoiky', chucdanh_nguoiky = '$chucdanh_nguoiky', nguoisdld = '$nguoisdld', diachi_nguoisdld = '$diachi_nguoisdld', trangthai = '$trangthai', file_scan = '$uploaded_image'
        WHERE sohopdong = '$sohopdong'";
        
        }
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'>Cập nhật thành công</span>";
            return true;
        } else {
            $alert = "<span class='error'>Cập nhật thất bại</span>";
            return false;
        }
    }



    public function delete($data)
    {
        $query = "DELETE FROM hopdonglentau 
                WHERE sohopdong = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}


?>
