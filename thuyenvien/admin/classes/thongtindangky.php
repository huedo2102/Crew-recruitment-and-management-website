<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class thongtindangky
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function xemthongtin()
    {
        $query = "SELECT td.madangky, td.hoten, td.ngaysinh, td.cccd, td.diachi, td.sdt, td.email, td.file_cv, td.ngaynhan, td.trangthai
        FROM thongtindangky td
        LEFT JOIN thuyenvien tv ON td.madangky = tv.madangky
        WHERE tv.madangky IS NULL
        ORDER BY td.madangky;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function loc_dadangky($trangthai)
    {
        $query = "SELECT td.madangky, td.hoten, td.ngaysinh, td.cccd, td.diachi, td.sdt, td.email, td.file_cv, td.ngaynhan, td.trangthai
        FROM thongtindangky td
        LEFT JOIN thuyenvien tv ON td.madangky = tv.madangky
        WHERE tv.madangky IS NULL AND td.trangthai = '$trangthai'
        ORDER BY td.madangky;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function xemthongtin_theoid($iddk)
    {
        $query = "SELECT *
        FROM thongtindangky 
        WHERE madangky = $iddk ;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function timkiemtheoten($timkiem)
    {
        $query = "SELECT td.madangky, td.hoten, td.ngaysinh, td.cccd, td.diachi, td.sdt, td.email, td.file_cv, td.ngaynhan
        FROM thongtindangky td
        LEFT JOIN thuyenvien tv ON td.madangky = tv.madangky
        WHERE tv.madangky IS NULL"; // Bắt đầu truy vấn với điều kiện mặc định

        // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
        if (!empty($timkiem)) {
            $query .= " AND td.hoten LIKE '%$timkiem%' ORDER BY td.madangky;";
        }
        
        // Thực hiện truy vấn và xử lý kết quả
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }

    public function insert($data)
    {
        $hoten = $data['hoten'];
        $ngaysinh = $data['ngaysinh'];
        $noisinh = $data['noisinh'];
        $cccd = $data['cccd'];
        $diachi = $data['diachi'];
        $sdt = $data['sdt'];
        $email = $data['email'];
        $ngaynhan = date('Y-m-d');

        // Kiểm tra và di chuyển hình ảnh vào thư mục upload
        $file_name = $_FILES['file_cv']['name'];
        $file_temp = $_FILES['file_cv']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "admin/CV/" . $unique_image;
        move_uploaded_file($file_temp, $uploaded_image);

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO thongtindangky (hoten, ngaysinh, noisinh, cccd, diachi, sdt, email, file_cv, ngaynhan) 
            VALUES ('$hoten', '$ngaysinh', '$noisinh', '$cccd', '$diachi', '$sdt', '$email', '$uploaded_image', '$ngaynhan')";

        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<span class='success'>Thêm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Thêm thất bại</span>";
            return $alert;
        }
    }
    public function update($madangky, $trangthai)
    {
        

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE thongtindangky SET trangthai = '$trangthai'
        WHERE madangky = '$madangky'";

        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'>Cập nhật thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Cập nhật thất bại</span>";
            return $alert;
        }
    }

    public function delete($data)
    {
        $query = "DELETE FROM thongtindangky 
                WHERE madangky = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}


?>
