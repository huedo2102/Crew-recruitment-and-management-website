<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../lib/database.php');



?>

<?php
/**
 * 
 */
class user
{
	private $db;
	public function __construct()
	{  
		$this->db = new Database();
	}

	/*public function login($tendangnhap, $matkhau)
	{
		$query = "SELECT * FROM taikhoan WHERE tendangnhap = '$tendangnhap' AND matkhau = '$matkhau' AND trangthai = 1";
		$result = $this->db->select($query);
		$query2 = "SELECT * FROM quyen WHERE tendangnhap = '$tendangnhap'";
		$result2 = $this->db->select($query2);
		if ($result) {
			$value = $result->fetch_assoc();
			Session::set('user', true);
			Session::set('userId', $value['tendangnhap']);
			if ($result2) {
				$functions = [];
				$row = mysqli_fetch_all($result2, MYSQLI_ASSOC);

				// Tạo mảng chứa các giá trị từ cột machucnang
				$chucnang = [];
				foreach ($row as $item) {
					$chucnang[] = $item['machucnang'];
				}

				// Set mảng chucnang vào session
				Session::set('chucnang', $chucnang);
			}
			header("Location:index.php");
		} else {
			$alert = "Tên đăng nhập hoặc mật khẩu không đúng!";
			return $alert;
		}
	}*/
	public function login($tendangnhap, $matkhau)
	{
		// Kết nối đến cơ sở dữ liệu
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		// Kiểm tra kết nối
		if ($mysqli->connect_error) {
			die("Kết nối thất bại: " . $mysqli->connect_error);
		}

		// Chuẩn bị câu lệnh SQL với các tham số
		$stmt = $mysqli->prepare("SELECT * FROM taikhoan WHERE tendangnhap = ? AND matkhau = ? AND trangthai = 1");
		$stmt->bind_param("ss", $username, $password);

		// Gán giá trị cho các tham số
		$username = $tendangnhap;
		$password = $matkhau;

		// Thực thi câu lệnh
		$stmt->execute();

		// Kiểm tra kết quả
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$query2 = "SELECT * FROM quyen WHERE tendangnhap = '$tendangnhap'";
			$result2 = $this->db->select($query2);
			$value = $result->fetch_assoc();
			Session::set('user', true);
			Session::set('userId', $value['tendangnhap']);
			if ($result2) {
				$functions = [];
				$row = mysqli_fetch_all($result2, MYSQLI_ASSOC);

				// Tạo mảng chứa các giá trị từ cột machucnang
				$chucnang = [];
				foreach ($row as $item) {
					$chucnang[] = $item['machucnang'];
				}

				// Set mảng chucnang vào session
				Session::set('chucnang', $chucnang);
			}
			header("Location:index.php");
		} else {
			$alert = "Tên đăng nhập hoặc mật khẩu không đúng!";
			return $alert;
		}

		// Đóng kết nối
		$stmt->close();
		$mysqli->close();
	}


	public function insert($data)
	{
		$fullName = $data['tendangnhap'];
		$password = md5($data['matkhau']);


		$query = "INSERT INTO taikhoan VALUES ('$fullName', '$password', 1) ";
		$result = $this->db->insert($query);
		if ($result) {
			echo '<script type="text/javascript">alert("Đăng ký thành công!");</script>';
			//header("Location:index.php");
			//return true;
			
		} else {
			return 'Tài khoản đã tồn tại!';
		}
	}
	public function xemthongtin()
    {
        $query = "SELECT taikhoan.tendangnhap, 
		CASE 
			WHEN taikhoan.trangthai = 1 THEN 'Đang hoạt động' 
			WHEN taikhoan.trangthai = 0 THEN 'Tạm khóa' 
			ELSE 'Không xác định' 
		END AS trangthai,
		GROUP_CONCAT(DISTINCT chucnang.tenchucnang ORDER BY chucnang.tenchucnang SEPARATOR ', ') AS tenchucnang
		FROM taikhoan
		LEFT JOIN quyen ON taikhoan.tendangnhap = quyen.tendangnhap
		LEFT JOIN chucnang ON quyen.machucnang = chucnang.id
		GROUP BY taikhoan.tendangnhap, taikhoan.trangthai;
			";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
	public function get()
	{
		$userId = Session::get('userId');
		$query = "SELECT * FROM users WHERE id = '$userId' LIMIT 1";
		$mysqli_result = $this->db->select($query);
		if ($mysqli_result) {
			$result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC)[0];
			return $result;
		}
		return false;
	}

	public function getLastUserId()
	{
		$query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
		$mysqli_result = $this->db->select($query);
		if ($mysqli_result) {
			$result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC)[0];
			return $result;
		}
		return false;
	}
	public function delete($data)
    {
		$query2 = "DELETE FROM quyen
                WHERE tendangnhap = '$data' ";
        $result2 = $this->db->delete($query2);

        $query = "DELETE FROM taikhoan
                WHERE tendangnhap = '$data' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	public function khoa($data)
    {
        // Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
        $query = "UPDATE taikhoan
		SET trangthai = CASE 
							WHEN trangthai = 0 THEN 1 
							WHEN trangthai = 1 THEN 0 
						 END
		WHERE tendangnhap = '$data';
		";

        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'>Cập nhật thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Cập nhật thất bại</span>";
            return $alert;
        }
    }
	public function doimatkhau($tendangnhap, $data)
	{
		$password = md5($data['matkhaumoi']);
		// Sửa câu lệnh SQL thành câu lệnh UPDATE và chỉ định rõ ràng các trường và điều kiện
		$query = "UPDATE taikhoan
		SET matkhau = '$password'
		WHERE tendangnhap = '$tendangnhap';
		";

		$result = $this->db->update($query);
		if ($result) {
			$alert = "<span class='success'>Cập nhật thành công!</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Cập nhật thất bại!</span>";
			return $alert;
		}
	}
	public function themquyen($data)
	{
		$id = $data['tendangnhap'];
		$tenchucnang = $data['machucnang'];


		$query = "INSERT INTO quyen VALUES ('$id', '$tenchucnang') ";
		$result = $this->db->insert($query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	public function xoaquyen($data)
	{
		$id = $data['tendangnhap'];
		$tenchucnang = $data['machucnang'];

		$query = "DELETE FROM quyen
                WHERE tendangnhap = '$id' AND machucnang = '$tenchucnang' ";
        $result = $this->db->delete($query);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
	}
	public function xemthongtin2()
    {
        $query = "SELECT 
		taikhoan.tendangnhap, 
		CASE 
			WHEN taikhoan.trangthai = 1 THEN 'Đang hoạt động' 
			WHEN taikhoan.trangthai = 0 THEN 'Tạm khóa' 
			ELSE 'Không xác định' 
		END AS trangthai,
		GROUP_CONCAT(DISTINCT chucnang.tenchucnang ORDER BY chucnang.tenchucnang SEPARATOR ', ') AS tenchucnang
	FROM 
		taikhoan
	LEFT JOIN 
		quyen ON taikhoan.tendangnhap = quyen.tendangnhap
	LEFT JOIN 
		chucnang ON quyen.machucnang = chucnang.id
	WHERE
		taikhoan.trangthai = 1 -- Thêm điều kiện WHERE ở đây để chỉ lấy các tài khoản đang hoạt động
	GROUP BY 
		taikhoan.tendangnhap, taikhoan.trangthai;
	
			";
        
        $mysqli_result = $this->db->select($query);
        
        if ($mysqli_result) {
            $result = mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC);
            return $result;
        }
        
        return false;
    }
	public function kiemTraMatKhauHienTai($tendangnhap, $mkhientai) {
        $query = "SELECT matkhau FROM taikhoan WHERE tendangnhap = '$tendangnhap'";
        $stmt = $this->db->link->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
		$mkhientai = md5($mkhientai);
        if ($row['matkhau']==$mkhientai) {
            return true;
        }
        return false;
    }
}
?>