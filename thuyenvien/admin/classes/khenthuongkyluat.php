<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class khenthuongkyluat
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
        tv.trangthai,
        trangthai.tentrangthai,
        COUNT(CASE WHEN ktkl.loaihinh = 1 THEN 1 END) AS soluong_khenthuong,
        COUNT(CASE WHEN ktkl.loaihinh = 0 THEN 1 END)+
        COUNT(CASE WHEN ktkl.loaihinh = 2 THEN 1 END)+
        COUNT(CASE WHEN ktkl.loaihinh = 3 THEN 1 END)+
        COUNT(CASE WHEN ktkl.loaihinh = 4 THEN 1 END) AS soluong_kyluat
    FROM 
        thuyenvien tv
    LEFT JOIN 
        khenthuongkyluat ktkl ON tv.id_thuyenvien = ktkl.id_thuyenvien
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
        COUNT(CASE WHEN ktkl.loaihinh = 1 THEN 1 END) AS soluong_khenthuong,
        COUNT(CASE WHEN ktkl.loaihinh = 0 THEN 1 END) AS soluong_kyluat
    FROM 
        thuyenvien tv
    LEFT JOIN 
        khenthuongkyluat ktkl ON tv.id_thuyenvien = ktkl.id_thuyenvien
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
        $query = "SELECT kt.*, tv.tenthuyenvien, tv.trangthai, CASE WHEN kt.loaihinh = 1 THEN 'Khen thưởng'
        WHEN kt.loaihinh = 0 THEN 'KL mức 1 - Khiển trách'
        WHEN kt.loaihinh = 2 THEN 'KL mức 2 - Cảnh cáo'
        WHEN kt.loaihinh = 3 THEN 'KL mức 3 - Hạ bậc lương'
         ELSE 'KL mức 4 - Buộc thôi việc' END AS loaihinh_text 
                FROM khenthuongkyluat kt
                LEFT JOIN thuyenvien tv ON kt.id_thuyenvien = tv.id_thuyenvien
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
        $soquyetdinh = $data['soquyetdinh'];
        $id_thuyenvien = $data['id_thuyenvien1'];
        $loaihinh  = $data['loaihinh'];
        $hinhthuc = $data['hinhthuc'];
        $lydo = $data['lydo'];
        $ngayky = $data['ngayky'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO khenthuongkyluat (soquyetdinh, id_thuyenvien, loaihinh, hinhthuc, lydo, ngayky, ghichu) 
            VALUES ('$soquyetdinh', '$id_thuyenvien', '$loaihinh', '$hinhthuc', '$lydo', '$ngayky', '$ghichu')";

        $result = $this->db->insert($query);

        if($loaihinh=='4'){
            $query2 = "UPDATE thuyenvien SET trangthai = 4 WHERE id_thuyenvien = '$id_thuyenvien'";

            $result2 = $this->db->update($query2);
        }




        if ($result) {
            $alert = "<span class='success'>Thêm thành công</span>";
            return true;
        } else {
            $alert = "<span class='error'>Thêm thất bại</span>";
            return false;
        }
    }

    public function update($data)
    {
        $soquyetdinh = $data['soquyetdinh'];
        $id_thuyenvien = $data['id_thuyenvien2'];
        $loaihinh  = $data['loaihinh'];
        $hinhthuc = $data['hinhthuc'];
        $lydo = $data['lydo'];
        $ngayky = $data['ngayky'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE khenthuongkyluat SET loaihinh = '$loaihinh', hinhthuc = '$hinhthuc', lydo = '$lydo', ngayky = '$ngayky', ghichu = '$ghichu' 
        WHERE soquyetdinh = '$soquyetdinh'";

        $result = $this->db->update($query);

        if($loaihinh=='4'){
            $query2 = "UPDATE thuyenvien SET trangthai = 4 WHERE id_thuyenvien = '$id_thuyenvien'";

            $result2 = $this->db->update($query2);
        }

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
        $query = "DELETE FROM khenthuongkyluat 
                WHERE soquyetdinh = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}


?>
