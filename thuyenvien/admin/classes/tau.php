<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class tau
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function xemthongtin()
    {
        $query = "SELECT tau.id, tau.tentau, loaitau.tenloaitau, tau.noidangky, tau.trongtai, tau.ghichu
        FROM tau
        JOIN loaitau ON tau.loaitau_id = loaitau.id ORDER BY tau.id;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    
    public function timkiemtheoten($timkiem)
    {
        $query = "SELECT tau.id, tau.tentau, loaitau.tenloaitau, tau.noidangky, tau.trongtai, tau.ghichu
        FROM tau
        JOIN loaitau ON tau.loaitau_id = loaitau.id
        WHERE 
            1 = 1"; // Bắt đầu truy vấn với điều kiện mặc định

        // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
        if (!empty($timkiem)) {
            $query .= " AND tau.tentau LIKE '%$timkiem%' ORDER BY tau.id";
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
        $id = $data['id'];
        $tentau = $data['tentau'];
        $loaitau_id = $data['loaitau_id'];
        $noidangky  = $data['noidangky'];
        $trongtai = $data['trongtai'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO tau (id, tentau, loaitau_id, noidangky, trongtai, ghichu) 
            VALUES ('$id', '$tentau', '$loaitau_id', '$noidangky', '$trongtai', '$ghichu')";

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
        $tentau = $data['tentau'];
        $loaitau_id = $data['loaitau_id'];
        $noidangky  = $data['noidangky'];
        $trongtai = $data['trongtai'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE tau SET tentau = '$tentau', loaitau_id = '$loaitau_id', noidangky = '$noidangky', trongtai = '$trongtai', ghichu = '$ghichu' 
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
        $query = "DELETE FROM tau 
                WHERE id = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}


?>
