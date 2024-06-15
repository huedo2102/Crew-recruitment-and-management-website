<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class truonghoc
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectTruongHoc() {
        $query = "SELECT * FROM truonghoc";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function selectTruongHoc_id($id_thuyenvien) {
        $query = "SELECT * FROM truonghoc where id_thuyenvien=$id_thuyenvien;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }

    public function insert($data)
    {
        $id_thuyenvien = $data['id_thuyenvien2'];
        $tentruong = $data['tentruong'];
        $chuyennghanh = $data['chuyennghanh'];
        $batdau = $data['batdau'];
        $ketthuc = $data['ketthuc'];
        $xeploai = $data['xeploai'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO truonghoc (id_thuyenvien, tentruong, chuyennghanh, batdau, ketthuc, xeploai, ghichu) 
                VALUES ('$id_thuyenvien', '$tentruong', '$chuyennghanh', '$batdau', '$ketthuc', '$xeploai', '$ghichu')";

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
        $id = $data['id_suatruonghoc'];
        $tentruong = $data['tentruong'];
        $chuyennghanh = $data['chuyennghanh'];
        $batdau = $data['batdau'];
        $ketthuc = $data['ketthuc'];
        $xeploai = $data['xeploai'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE truonghoc SET tentruong = '$tentruong', chuyennghanh = '$chuyennghanh', batdau = '$batdau', ketthuc = '$ketthuc',
            xeploai = '$xeploai', ghichu = '$ghichu' WHERE id = '$id'";

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
        $query = "DELETE FROM truonghoc 
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
