<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class chungchi
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function xemthongtin()
    {
        $query = "SELECT 
        tv.id_thuyenvien AS 'matv',
        tv.tenthuyenvien AS 'hoten',
        tv.ngaysinh AS 'ns',
        tv.trangthai,
        trangthai.tentrangthai AS 'tt',
        COUNT(cc.id_thuyenvien) AS 'SL',
        SUM(CASE WHEN cc.ngayhethan >= CURDATE() AND cc.ngayhethan <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) AS 'SLSHH',
        SUM(CASE WHEN cc.ngayhethan < CURDATE() THEN 1 ELSE 0 END) AS 'SLHH'
    FROM 
        thuyenvien tv
    LEFT JOIN 
        chungchi cc ON tv.id_thuyenvien = cc.id_thuyenvien
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
    public function tv_saphethan()
    {
        $query = "SELECT 
        tv.id_thuyenvien AS 'matv',
        tv.tenthuyenvien AS 'hoten',
        tv.ngaysinh AS 'ns',
        tv.trangthai,
        trangthai.tentrangthai AS 'tt',
        COUNT(cc.id_thuyenvien) AS 'SL',
        SUM(CASE WHEN cc.ngayhethan >= CURDATE() AND cc.ngayhethan <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) AS 'SLSHH',
        SUM(CASE WHEN cc.ngayhethan < CURDATE() THEN 1 ELSE 0 END) AS 'SLHH'
    FROM 
        thuyenvien tv
    LEFT JOIN 
        chungchi cc ON tv.id_thuyenvien = cc.id_thuyenvien
    LEFT JOIN 
        trangthai ON tv.trangthai = trangthai.matrangthai
    WHERE
        tv.trangthai <> 4
    GROUP BY 
        tv.id_thuyenvien
    HAVING
        SLSHH > 0;
    
        ";
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function tv_hethan()
    {
        $query = "SELECT 
        tv.id_thuyenvien AS 'matv',
        tv.tenthuyenvien AS 'hoten',
        tv.ngaysinh AS 'ns',
        tv.trangthai ,
        trangthai.tentrangthai AS 'tt',
        COUNT(cc.id_thuyenvien) AS 'SL',
        SUM(CASE WHEN cc.ngayhethan >= CURDATE() AND cc.ngayhethan <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) AS 'SLSHH',
        SUM(CASE WHEN cc.ngayhethan < CURDATE() THEN 1 ELSE 0 END) AS 'SLHH'
    FROM 
        thuyenvien tv
    LEFT JOIN 
        chungchi cc ON tv.id_thuyenvien = cc.id_thuyenvien
    LEFT JOIN 
        trangthai ON tv.trangthai = trangthai.matrangthai
    WHERE
        tv.trangthai <> 4
    GROUP BY 
        tv.id_thuyenvien
    HAVING
        SLHH > 0;
    
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
            tv.id_thuyenvien AS 'matv',
            tv.tenthuyenvien AS 'hoten',
            tv.ngaysinh AS 'ns',
            trangthai.tentrangthai AS 'tt',
            COUNT(cc.id_thuyenvien) AS 'SL',
            SUM(CASE WHEN cc.ngayhethan >= CURDATE() AND cc.ngayhethan <= DATE_ADD(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) AS 'SLSHH',
            SUM(CASE WHEN cc.ngayhethan < CURDATE() THEN 1 ELSE 0 END) AS 'SLHH'
        FROM 
            thuyenvien tv
        LEFT JOIN 
            chungchi cc ON tv.id_thuyenvien = cc.id_thuyenvien
        LEFT JOIN 
            trangthai ON tv.trangthai = trangthai.matrangthai
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

    public function xemthongtintheoid($id_thuyenvien)
    {
        $query = "SELECT *, thuyenvien.tenthuyenvien, thuyenvien.trangthai, loaichungchi.tenloaichungchi
        FROM chungchi
        INNER JOIN thuyenvien ON chungchi.id_thuyenvien = thuyenvien.id_thuyenvien
        INNER JOIN loaichungchi ON chungchi.loaichungchi = loaichungchi.id_loaichungchi
        WHERE chungchi.id_thuyenvien = '$id_thuyenvien' ORDER BY sogiayto;";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
    public function insert($data)
    {   
        $sogiayto = $data['sogiayto'];
        $id_thuyenvien = $data['id_thuyenvien'];
        $loaichungchi  = $data['loaichungchi'];
        $tenchungchi = $data['tenchungchi'];
        $ngaycap = $data['ngaycap'];
        $ngayhethan = $data['ngayhethan'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL để chỉ định rõ ràng các trường và bảng
        $query = "INSERT INTO chungchi (sogiayto, id_thuyenvien, loaichungchi, tenchungchi, ngaycap, ngayhethan, ghichu) 
            VALUES ('$sogiayto', '$id_thuyenvien', '$loaichungchi', '$tenchungchi', '$ngaycap', '$ngayhethan', '$ghichu')";

        $result = $this->db->insert($query);
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
        $sogiayto = $data['sogiayto'];
        $loaichungchi  = $data['loaichungchi'];
        $tenchungchi = $data['tenchungchi'];
        $ngaycap = $data['ngaycap'];
        $ngayhethan = $data['ngayhethan'];
        $ghichu = $data['ghichu'];

        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE chungchi SET loaichungchi = '$loaichungchi', tenchungchi = '$tenchungchi', ngaycap = '$ngaycap', ngayhethan = '$ngayhethan', ghichu = '$ghichu' 
        WHERE sogiayto = '$sogiayto'";

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
        $query = "DELETE FROM chungchi 
                WHERE sogiayto = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}


?>
