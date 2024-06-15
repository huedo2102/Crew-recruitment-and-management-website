<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class nguoithan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectNguoiThan() {
        $query = "SELECT * FROM nguoithan";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }


    public function insert($data)
    {
        $id_thuyenvien = $data['id_thuyenvien3'];
        $quanhe = $data['quanhe'];
        $namsinh = $data['namsinh'];
        $dienthoai = $data['dienthoai'];
        $diachi = $data['diachi'];
        $hoten = $data['hoten'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO nguoithan (id_thuyenvien, quanhe, namsinh, dienthoai, diachi, hoten, ghichu) 
            VALUES ('$id_thuyenvien', '$quanhe', '$namsinh', '$dienthoai', '$diachi', '$hoten', '$ghichu')";

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
        $id = $data['id_suanguoithan'];
        $quanhe = $data['quanhe'];
        $namsinh = $data['namsinh'];
        $dienthoai = $data['dienthoai'];
        $diachi = $data['diachi'];
        $hoten = $data['hoten'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE nguoithan SET quanhe = '$quanhe', hoten = '$hoten', namsinh = '$namsinh', dienthoai = '$dienthoai',
                diachi = '$diachi', ghichu = '$ghichu' WHERE id = '$id'";

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
        $query = "DELETE FROM nguoithan 
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
