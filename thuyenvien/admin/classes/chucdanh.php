<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class chucdanh{
	private $db;
	public function __construct()
    {
        $this->db = new Database();
    }
    public function xemthongtin()
    {
        $query = "SELECT chucdanh.id_chucdanh, chucdanh.tenchucdanh
        FROM chucdanh ORDER BY chucdanh.id_chucdanh;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }
    public function timkiemtheoten($timkiem)
    {
        $query = "SELECT chucdanh.id_chucdanh, chucdanh.tenchucdanh
        FROM chucdanh
        WHERE 
            1 = 1"; // Bắt đầu truy vấn với điều kiện mặc định

        // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
        if (!empty($timkiem)) {
            $query .= " AND chucdanh.tenchucdanh LIKE '%$timkiem%' ORDER BY chucdanh.id_chucdanh";
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
        $tenchucdanh = $data['tenchucdanh'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO chucdanh VALUES (NULL,'$tenchucdanh')";

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
        $tenchucdanh = $data['tenchucdanh'];
       
        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE chucdanh SET tenchucdanh = '$tenchucdanh' WHERE id_chucdanh = '$id'";

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
        $query = "DELETE FROM chucdanh WHERE id_chucdanh = '$data'";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>