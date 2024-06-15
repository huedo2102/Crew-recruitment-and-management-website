<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class kinhnghiemditau
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Hàm để lấy thông tin kinh nghiệm đi tàu theo id_thuyenvien
    public function selectKinhNghiemDiTau() {
        $query = "SELECT 
                    k.*, 
                    t.tenthuyenvien,
                    c.tenchucdanh
                FROM 
                    kinhnghiemditau k
                JOIN 
                    thuyenvien t ON k.id_thuyenvien = t.id_thuyenvien
                JOIN 
                    chucdanh c ON k.chucdanh = c.id_chucdanh
                
                ";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function selectKinhNghiemDiTau_id($id_thuyenvien) {
        $query = "SELECT 
                    k.*, 
                    t.tenthuyenvien,
                    c.tenchucdanh
                FROM 
                    kinhnghiemditau k
                JOIN 
                    thuyenvien t ON k.id_thuyenvien = t.id_thuyenvien
                JOIN 
                    chucdanh c ON k.chucdanh = c.id_chucdanh
                where k.id_thuyenvien=$id_thuyenvien;
                ";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }

    public function insert($data)
    {
        $id_thuyenvien = $data['id_thuyenvien1'];
        $tentau = $data['tentau'];
        $loaitau = $data['loaitau'];
        $chucdanh = $data['chucdanh'];
        $thoigianbatdau = $data['thoigianbatdau'];
        $thoigianketthuc = $data['thoigianketthuc'];
        $lydodoitau = $data['lydodoitau'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường
        $query = "INSERT INTO kinhnghiemditau (id_thuyenvien, tentau, loaitau, chucdanh, thoigianbatdau, thoigianketthuc, lydodoitau, ghichu) 
                VALUES ('$id_thuyenvien', '$tentau', '$loaitau', '$chucdanh', '$thoigianbatdau', '$thoigianketthuc', '$lydodoitau', '$ghichu')";

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
        $id_kinhnghiemditau = $data['id_suathuyenvien'];
        $tentau = $data['tentau'];
        $loaitau = $data['loaitau'];
        $chucdanh = $data['chucdanh'];
        $thoigianbatdau = $data['thoigianbatdau'];
        $thoigianketthuc = $data['thoigianketthuc'];
        $lydodoitau = $data['lydodoitau'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE
        $query = "UPDATE kinhnghiemditau SET tentau = '$tentau',loaitau = '$loaitau', chucdanh = '$chucdanh', thoigianbatdau = '$thoigianbatdau',
         thoigianketthuc = '$thoigianketthuc', lydodoitau = '$lydodoitau', ghichu = '$ghichu' WHERE id = '$id_kinhnghiemditau'";

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
        $query = "DELETE FROM kinhnghiemditau 
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
