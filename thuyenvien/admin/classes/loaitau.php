<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class loaitau
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function xemthongtin()
    {
        $query = "SELECT loaitau.id,loaitau.tenloaitau
        FROM loaitau ORDER BY loaitau.id;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    
    public function timkiemtheoten($timkiem)
    {
        $query = "SELECT loaitau.id,loaitau.tenloaitau
        FROM loaitau
        WHERE 
            1 = 1"; // Bắt đầu truy vấn với điều kiện mặc định

        // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
        if (!empty($timkiem)) {
            $query .= " AND loaitau.tenloaitau LIKE '%$timkiem%' ORDER BY loaitau.id";
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
        $tenloaitau = $data['tenloaitau'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO loaitau VALUES (NULL, '$tenloaitau')";

        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<span class='success'>Thêm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Thêm thất bại</span>";
            return $alert;
        }
    }

    public function update($data)
    {
        $id = $data['id'];
        $tenloaitau = $data['tenloaitau'];
        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE loaitau SET tenloaitau = '$tenloaitau'
        WHERE id = '$id'";

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
        $query = "DELETE FROM loaitau WHERE id = '$data'";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

?>
