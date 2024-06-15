<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class thuyenvien
{
    private $db;

    private $maTV;
    private $tentv;
    private $ngaysinh;
    private $noisinh;
    private $cccd;
    private $diachi;
    private $sdt;
    private $cannang;
    private $chieucao;
    private $nhommau;
    private $sizegiay;
    private $email;
    private $honnhan;
    private $madangky;
    private $chucdanh;
    private $trangthai;
    private $ngaynhanhs;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Các phương thức setter
    public function setMaTV($maTV) {
        $this->maTV = $maTV;
    }

    public function setTenTV($tentv) {
        $this->tentv = $tentv;
    }

    public function setNgaySinh($ngaysinh) {
        $this->ngaysinh = $ngaysinh;
    }

    public function setNoiSinh($noisinh) {
        $this->noisinh = $noisinh;
    }

    public function setcccd($cccd) {
        $this->cccd = $cccd;
    }

    public function setDiaChi($diachi) {
        $this->diachi = $diachi;
    }

    public function setSDT($sdt) {
        $this->sdt = $sdt;
    }

    public function setCanNang($cannang) {
        $this->cannang = $cannang;
    }
    public function setMaDangKy($madangky) {
        $this->madangky = $madangky;
    }

    public function setChieuCao($chieucao) {
        $this->chieucao = $chieucao;
    }

    public function setNhomMau($nhommau) {
        $this->nhommau = $nhommau;
    }

    public function setSizeGiay($sizegiay) {
        $this->sizegiay = $sizegiay;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setHonNhan($honnhan) {
        $this->honnhan = $honnhan;
    }

    public function setChucDanh($chucdanh) {
        $this->chucdanh = $chucdanh;
    }

    public function setTrangThai($trangthai) {
        $this->trangthai = $trangthai;
    }

    public function setNgayNhanHS($ngaynhanhs) {
        $this->ngaynhanhs = $ngaynhanhs;
    }

    // Các phương thức getter
    public function getMaTV() {
        return $this->maTV;
    }

    public function getTenTV() {
        return $this->tentv;
    }
    public function getMaDangKy() {
        return $this->madangky;
    }
    public function getNgaySinh() {
        return $this->ngaysinh;
    }

    public function getNoiSinh() {
        return $this->noisinh;
    }

    public function getcccd() {
        return $this->cccd;
    }

    public function getDiaChi() {
        return $this->diachi;
    }

    public function getSDT() {
        return $this->sdt;
    }

    public function getCanNang() {
        return $this->cannang;
    }

    public function getChieuCao() {
        return $this->chieucao;
    }

    public function getNhomMau() {
        return $this->nhommau;
    }

    public function getSizeGiay() {
        return $this->sizegiay;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHonNhan() {
        return $this->honnhan;
    }

    public function getChucDanh() {
        return $this->chucdanh;
    }

    public function getTrangThai() {
        return $this->trangthai;
    }

    public function getNgayNhanHS() {
        return $this->ngaynhanhs;
    }

    public function xemthongtin()
{
    $query = "SELECT 
        thuyenvien.id_thuyenvien,
        thuyenvien.tenthuyenvien,
        thuyenvien.hokhauthuongtru,
        thuyenvien.sdt,
        thuyenvien.anh,
        thuyenvien.cccd,
        thuyenvien.ngaynhanhs,
        thuyenvien.honnhan,
        thuyenvien.ngaysinh,
        thuyenvien.noisinh,
        thuyenvien.chieucao,
        thuyenvien.madangky,
        thuyenvien.cannang,
        thuyenvien.nhommau,
        thuyenvien.sizegiay,
        thuyenvien.email,
        trangthai.tentrangthai AS trangthai,
        chon.tentau,
        chon.ngaybatdau,
        chon.thoihan,
        chon.chucdanh
    FROM 
        thuyenvien
    JOIN 
        trangthai ON thuyenvien.trangthai = trangthai.matrangthai
    LEFT JOIN 
    (
        SELECT hdl.*, tau.tentau
        FROM hopdonglentau hdl
        INNER JOIN (
            SELECT hopdong_tv, tau.tentau, MAX(ngayky) AS max_ngayky
            FROM hopdonglentau
            LEFT JOIN tau ON hopdonglentau.tau = tau.id
            WHERE trangthai = 0
            GROUP BY hopdong_tv, tau.tentau
        ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
        LEFT JOIN tau ON hdl.tau = tau.id

    )AS chon ON chon.hopdong_tv = thuyenvien.id_thuyenvien
    ORDER BY 
        thuyenvien.id_thuyenvien ASC;
    ";
    
    $mysqli_result = $this->db->select($query);
    
    if ($mysqli_result) {
        $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
        return $result;
    }
    
    return false;
}
public function xemThongTinThuyenVien($id_thuyenvien)
{
    // Sử dụng tham số để lọc thông tin cho một thuyền viên cụ thể
    $query = "SELECT 
        thuyenvien.id_thuyenvien,
        thuyenvien.tenthuyenvien,
        thuyenvien.hokhauthuongtru,
        thuyenvien.sdt,
        thuyenvien.anh,
        thuyenvien.cccd,
        thuyenvien.ngaynhanhs,
        thuyenvien.honnhan,
        thuyenvien.ngaysinh,
        thuyenvien.noisinh,
        thuyenvien.madangky,
        thuyenvien.chieucao,
        thuyenvien.cannang,
        thuyenvien.nhommau,
        thuyenvien.sizegiay,
        thuyenvien.email,
        trangthai.tentrangthai AS trangthai,
        chon.tentau,
        chon.ngaybatdau,
        chon.thoihan,
        chon.chucdanh
    FROM 
        thuyenvien
    JOIN 
        trangthai ON thuyenvien.trangthai = trangthai.matrangthai
    LEFT JOIN 
    (
        SELECT hdl.*, tau.tentau
        FROM hopdonglentau hdl
        INNER JOIN (
            SELECT hopdong_tv, tau.tentau, MAX(ngayky) AS max_ngayky
            FROM hopdonglentau
            LEFT JOIN tau ON hopdonglentau.tau = tau.id
            WHERE trangthai = 0
            GROUP BY hopdong_tv, tau.tentau
        ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
        LEFT JOIN tau ON hdl.tau = tau.id

    )AS chon ON chon.hopdong_tv = thuyenvien.id_thuyenvien
    WHERE 
        thuyenvien.id_thuyenvien = $id_thuyenvien;"; // Lọc thông tin cho thuyền viên cụ thể
    
    $mysqli_result = $this->db->select($query);
    
    if ($mysqli_result) {
        $result = mysqli_fetch_assoc($mysqli_result);
        return $result;
    }
    
    return false;
}


public function loc($trangthai, $chucdanh, $tentau)
{
    // Xây dựng truy vấn SQL với điều kiện WHERE dựa trên các tham số được truyền vào
    $query = "SELECT 
        thuyenvien.id_thuyenvien,
        thuyenvien.tenthuyenvien,
        thuyenvien.hokhauthuongtru,
        thuyenvien.sdt,
        thuyenvien.anh,
        thuyenvien.cccd,
        thuyenvien.ngaynhanhs,
        thuyenvien.honnhan,
        thuyenvien.ngaysinh,
        thuyenvien.noisinh,
        thuyenvien.madangky,
        thuyenvien.chieucao,
        thuyenvien.cannang,
        thuyenvien.nhommau,
        thuyenvien.sizegiay,
        thuyenvien.email,
        trangthai.tentrangthai AS trangthai,
        chon.tentau,
        chon.ngaybatdau,
        chon.thoihan,
        chon.chucdanh
    FROM 
        thuyenvien
    JOIN 
        trangthai ON thuyenvien.trangthai = trangthai.matrangthai
    LEFT JOIN 
    (
        SELECT hdl.*, tau.tentau
        FROM hopdonglentau hdl
        INNER JOIN (
            SELECT hopdong_tv, tau.tentau, MAX(ngayky) AS max_ngayky
            FROM hopdonglentau
            LEFT JOIN tau ON hopdonglentau.tau = tau.id
            WHERE trangthai = 0
            GROUP BY hopdong_tv, tau.tentau
        ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
        LEFT JOIN tau ON hdl.tau = tau.id

    )AS chon ON chon.hopdong_tv = thuyenvien.id_thuyenvien
    WHERE 
        1 = 1";

    // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
    if (!empty($trangthai)) {
        $query .= " AND trangthai.tentrangthai = '$trangthai'";
    }
    if (!empty($chucdanh)) {
        $query .= " AND chon.chucdanh = '$chucdanh'";
    }
    if (!empty($tentau)) {
        $query .= " AND chon.tentau = '$tentau'";
    }
    $query .= " ORDER BY thuyenvien.id_thuyenvien;";
    // Thực hiện truy vấn và xử lý kết quả
    $mysqli_result = $this->db->select($query);
    
    if ($mysqli_result) {
        $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
        return $result;
    }
    
    return false;
}

public function timkiem($timkiem)
{
    // Xây dựng truy vấn SQL với điều kiện WHERE dựa trên các tham số được truyền vào
    $query = "SELECT 
        thuyenvien.id_thuyenvien,
        thuyenvien.tenthuyenvien,
        thuyenvien.hokhauthuongtru,
        thuyenvien.sdt,
        thuyenvien.anh,
        thuyenvien.cccd,
        thuyenvien.ngaynhanhs,
        thuyenvien.honnhan,
        thuyenvien.ngaysinh,
        thuyenvien.noisinh,
        thuyenvien.chieucao,
        thuyenvien.madangky,
        thuyenvien.cannang,
        thuyenvien.nhommau,
        thuyenvien.sizegiay,
        thuyenvien.email,
        trangthai.tentrangthai AS trangthai,
        chon.tentau,
        chon.ngaybatdau,
        chon.thoihan,
        chon.chucdanh
    FROM 
        thuyenvien
    JOIN 
        trangthai ON thuyenvien.trangthai = trangthai.matrangthai
    LEFT JOIN 
    (
        SELECT hdl.*, tau.tentau
        FROM hopdonglentau hdl
        INNER JOIN (
            SELECT hopdong_tv, tau.tentau, MAX(ngayky) AS max_ngayky
            FROM hopdonglentau
            LEFT JOIN tau ON hopdonglentau.tau = tau.id
            WHERE trangthai = 0
            GROUP BY hopdong_tv, tau.tentau
        ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
        LEFT JOIN tau ON hdl.tau = tau.id

    )AS chon ON chon.hopdong_tv = thuyenvien.id_thuyenvien
    WHERE 
        1 = 1";

    // Mở rộng truy vấn với các điều kiện được chọn (nếu có)
    if (!empty($timkiem)) {
        // Xác định xem $timkiem có phải là id_thuyenvien hay là tenthuyenvien
        if (is_numeric($timkiem)) {
            // Nếu $timkiem là số, giả sử là id_thuyenvien
            $query .= " AND thuyenvien.id_thuyenvien = $timkiem";
        } else {
            // Ngược lại, giả sử là tenthuyenvien và thực hiện tìm kiếm theo tên thuyền viên
            $query .= " AND thuyenvien.tenthuyenvien LIKE '%$timkiem%'";
        }
    }
    
    $query .= " ORDER BY thuyenvien.id_thuyenvien;";
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
    // Thiết lập các giá trị của đối tượng thuyenvien từ dữ liệu được truyền vào
    $this->setTentv($data['tentv']);
    $this->setNgaysinh($data['ngaysinh']);
    $this->setNoisinh($data['noisinh']);
    $this->setcccd($data['cccd']);
    $this->setDiachi($data['diachi']);
    $this->setSdt($data['sdt']);
    $this->setCannang($data['cannang']);
    $this->setChieucao($data['chieucao']);
    $this->setNhommau($data['nhommau']);
    $this->setSizegiay($data['sizegiay']);
    $this->setEmail($data['email']);
    $this->setHonnhan($data['honnhan']);
    $this->setNgaynhanhs($data['ngaynhanhs']);

    // Kiểm tra và di chuyển hình ảnh vào thư mục upload
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "images/" . $unique_image;
    move_uploaded_file($file_temp, $uploaded_image);
    
    if (empty($data['iddk'])) {
        // Tạo câu truy vấn SQL
        $query = "INSERT INTO `thuyenvien` (`id_thuyenvien`, `tenthuyenvien`, `ngaysinh`, `noisinh`, `cccd`, `hokhauthuongtru`, `sdt`, `cannang`, `chieucao`, `nhommau`, `sizegiay`, `email`, `ngaynhanhs`, `honnhan`, `trangthai`, `anh`, `madangky`)
        VALUES (
            NULL,
            '{$this->getTentv()}',
            '{$this->getNgaysinh()}',
            '{$this->getNoisinh()}',
            '{$this->getcccd()}',
            '{$this->getDiachi()}',
            '{$this->getSdt()}',
            '{$this->getCannang()}',
            '{$this->getChieucao()}',
            '{$this->getNhommau()}',
            '{$this->getSizegiay()}',
            '{$this->getEmail()}',
            '{$this->getNgaynhanhs()}',
            '{$this->getHonnhan()}',
            '1',
            '$uploaded_image',
            NULL
        )";
    }else{
        $iddk = $data['iddk'];
        // Tạo câu truy vấn SQL
        $query = "INSERT INTO `thuyenvien` (`id_thuyenvien`, `tenthuyenvien`, `ngaysinh`, `noisinh`, `cccd`, `hokhauthuongtru`, `sdt`, `cannang`, `chieucao`, `nhommau`, `sizegiay`, `email`, `ngaynhanhs`, `honnhan`, `trangthai`, `anh`, `madangky`)
                VALUES (
                    NULL,
                    '{$this->getTentv()}',
                    '{$this->getNgaysinh()}',
                    '{$this->getNoisinh()}',
                    '{$this->getcccd()}',
                    '{$this->getDiachi()}',
                    '{$this->getSdt()}',
                    '{$this->getCannang()}',
                    '{$this->getChieucao()}',
                    '{$this->getNhommau()}',
                    '{$this->getSizegiay()}',
                    '{$this->getEmail()}',
                    '{$this->getNgaynhanhs()}',
                    '{$this->getHonnhan()}',
                    '1',
                    '$uploaded_image',
                    '$iddk'
                )";
    }
    // Thực hiện truy vấn và kiểm tra kết quả
    $result = $this->db->insert($query);
    
    if ($result) {
        $alert = "<span class='success'>Thêm thành công</span>";
        return $alert;
    } else {
        $alert = "<span class='error'>Thêm thất bại</span>";
        return $alert;
    }
}
public function update($data, $files)
{
    // Thiết lập các giá trị của đối tượng thuyenvien từ dữ liệu được truyền vào
    $this->setTentv($data['tentv']);
    $this->setNgaysinh($data['ngaysinh']);
    $this->setNoisinh($data['noisinh']);
    $this->setcccd($data['cccd']);
    $this->setDiachi($data['diachi']);
    $this->setSdt($data['sdt']);
    $this->setCannang($data['cannang']);
    $this->setChieucao($data['chieucao']);
    $this->setNhommau($data['nhommau']);
    $this->setSizegiay($data['sizegiay']);
    $this->setTrangthai($data['trangthai']);
    $this->setEmail($data['email']);
    $this->setHonnhan($data['honnhan']);
    $this->setNgaynhanhs($data['ngaynhanhs']);

    // Lấy đường dẫn ảnh cũ
    $old_image = $data['anh'];
    // Tạo câu truy vấn SQL
    $query = "UPDATE thuyenvien SET 
                tenthuyenvien = '{$this->getTentv()}',
                ngaysinh = '{$this->getNgaysinh()}',
                noisinh = '{$this->getNoisinh()}',
                cccd = '{$this->getcccd()}',
                hokhauthuongtru = '{$this->getDiachi()}',
                sdt = '{$this->getSdt()}',
                cannang = '{$this->getCannang()}',
                chieucao = '{$this->getChieucao()}',
                nhommau = '{$this->getNhommau()}',
                sizegiay = '{$this->getSizegiay()}',
                trangthai = '{$this->getTrangthai()}',
                email = '{$this->getEmail()}',
                honnhan = '{$this->getHonnhan()}',
                ngaynhanhs = '{$this->getNgaynhanhs()}',
                anh = '$old_image'
              WHERE id_thuyenvien = '{$data['id_thuyenvien']}'";
    // Kiểm tra và di chuyển hình ảnh mới vào thư mục upload
    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "images/" . $unique_image;
        move_uploaded_file($file_temp, $uploaded_image);

        $query = "UPDATE thuyenvien SET 
                tenthuyenvien = '{$this->getTentv()}',
                ngaysinh = '{$this->getNgaysinh()}',
                noisinh = '{$this->getNoisinh()}',
                cccd = '{$this->getcccd()}',
                hokhauthuongtru = '{$this->getDiachi()}',
                sdt = '{$this->getSdt()}',
                cannang = '{$this->getCannang()}',
                chieucao = '{$this->getChieucao()}',
                nhommau = '{$this->getNhommau()}',
                sizegiay = '{$this->getSizegiay()}',
                trangthai = '{$this->getTrangthai()}',
                email = '{$this->getEmail()}',
                honnhan = '{$this->getHonnhan()}',
                ngaynhanhs = '{$this->getNgaynhanhs()}',
                anh = '$uploaded_image'
              WHERE id_thuyenvien = '{$data['id_thuyenvien']}'";
    }

    // Tạo câu truy vấn SQL
    

    // Thực hiện truy vấn và kiểm tra kết quả
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
     
    
    
    $query2 = "DELETE FROM kinhnghiemditau 
             WHERE id_thuyenvien = '$data' ";
    $result2 = $this->db->delete($query2);

    $query3 = "DELETE FROM truonghoc 
             WHERE id_thuyenvien = '$data' ";
    $result3 = $this->db->delete($query3);

    $query4 = "DELETE FROM nguoithan 
             WHERE id_thuyenvien = '$data' ";
    $result4 = $this->db->delete($query4);

    $query5 = "DELETE FROM khenthuongkyluat 
             WHERE id_thuyenvien = '$data' ";
    $result5 = $this->db->delete($query5);

    $query6 = "DELETE FROM chungchi
             WHERE id_thuyenvien = '$data' ";
    $result6 = $this->db->delete($query6);


    $query7 = "SELECT * FROM thuyenvien where id_thuyenvien = '$data' ";
     // Thực hiện truy vấn và xử lý kết quả
     $mysqli_result7 = $this->db->select($query7);
     $result7 = mysqli_fetch_all($mysqli_result7, MYSQLI_ASSOC);
     $madangky = $result7[0]['madangky'];
     $query8 = "DELETE FROM thongtindangky WHERE madangky = '$madangky'";
     $result8 = $this->db->delete($query8);



    $query = "DELETE FROM thuyenvien 
             WHERE id_thuyenvien = '$data' ";
    $result = $this->db->delete($query); 

    

    if ($result) {
        return true;
    } else {
        return false;
    }
}

public function getById($id)
{
    $query = "SELECT * FROM thuyenvien where id_thuyenvien = '$id'";
    $result = $this->db->select($query);
    return $result;
}

}


?>
