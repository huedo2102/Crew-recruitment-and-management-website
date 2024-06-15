<?php 
  include_once('admin/lib/database.php');
  require_once 'admin/lib/vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
    require_once "include/header.php";
?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\admin\lib\database.php');

?>

<?php

include_once 'admin/classes/thongtindangky.php';
$thongtindangky = new thongtindangky();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $result = $thongtindangky->insert($_POST, $_FILES);
  // Nếu lưu thành công, thực hiện chuyển trang về trang trước đó
  if ($result) { // Điều kiện lưu thành công của bạn
      // Thêm mã gửi email thông báo ở đây
      try {
        

        // Lấy email từ dữ liệu người dùng
        $em = isset($_POST['email']) ? $_POST['email'] : null;

        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'hangdo50984@gmail.com'; // Tài khoản email
        $mail->Password = EMAIL_PASSWORD; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP là 465
        // Đặt mã hóa ký tự UTF-8
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('hangdo50984@gmail.com', 'CÔNG TY CỔ PHẦN VẬN TẢI BIỂN VÀ XNK NHẬT VIỆT'); // Địa chỉ email và tên người gửi
        $mail->addAddress($em, $em); // Địa chỉ mail và tên người nhận

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Xác nhận đăng ký thuyền viên'; // Tiêu đề
        $mail->Body = '
                <p><strong>Chào bạn,</strong></p>
                <p><strong>Công ty Cổ phần Vận tải Biển và XNK Nhật Việt</strong> xin chân thành cảm ơn bạn đã quan tâm và đăng ký làm thuyền viên tại công ty chúng tôi.</p>
                <p>Chúng tôi đã nhận được thông tin đăng ký của bạn và sẽ xem xét hồ sơ của bạn trong thời gian sớm nhất. Nếu hồ sơ của bạn phù hợp với yêu cầu của chúng tôi, chúng tôi sẽ liên hệ lại với bạn để tiến hành các bước tiếp theo trong quy trình tuyển dụng.</p>
                <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần thêm thông tin, xin vui lòng liên hệ với chúng tôi qua email này.</p>
                <p>Trân trọng,</p>
                <p><strong>Công ty Cổ phần Vận tải Biển và XNK Nhật Việt</strong></p>
            ';

        $mail->send();
        echo '<script>alert("Lưu thành công! Email thông báo đã được gửi.");</script>';
    } catch (Exception $e) {
        // Nếu gửi email thất bại, có thể hiển thị thông báo hoặc ghi log
        echo '<script>alert("Lưu thành công! Nhưng gửi email thông báo không thành công. Vui lòng xem lại địa chỉ email của bạn!");</script>';
    }
  }
}

?>
<section id="sliderSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slick_slider">

        <!-- adding carousel -------------------------------------------------------------------------->
        <?php
            for ($i = 1; $i <= 5; $i++) {
                ?>
                <div class="single_iteam"><img src="upload/show_images/<?php echo $i; ?>.jpg" ></div><?php
            }
            ?>
  <!-- end carousel----------------------------------------------------------------------------------------- -->
        </div>
      </div>
    </div>
</section>




<!-- <img src="upload/Screenshot 2024-04-16 121137.png" style="max-width: 100%; height: auto;" > -->
<style>
  /* Đặt kiểu chung cho toàn bộ form */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Kiểu cho các label */
form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Kiểu cho các input và select */
form input[type="text"],
form input[type="date"],
form input[type="number"],
form input[type="email"],
form input[type="file"],
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Kiểu cho các input khi tập trung */
form input[type="text"]:focus,
form input[type="date"]:focus,
form input[type="number"]:focus,
form input[type="email"]:focus,
form input[type="file"],
form select:focus {
    border-color: #66afe9;
    outline: none;
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
}

/* Kiểu cho nút submit */
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Kiểu cho nút submit khi di chuột qua */
form input[type="submit"]:hover {
    background-color: #0056b3;
}


</style>   
<div>
    <div>
        <center><h1>Đăng ký thuyền viên</h1></center>
    </div>
    
    <div>
        <form action="dangkythuyenvien.php" method="post" enctype="multipart/form-data" onsubmit="onSubmitHandler()">
            
            <label for="hoten">Họ tên :<span style="color: red;"> *</span></label>
            <input type="text" id="hoten" name="hoten" placeholder="Họ tên.." required><br>

            <label for="ngaysinh">Ngày sinh :<span style="color: red;"> *</span></label>
            <input type="date" id="ngaysinh" name="ngaysinh" placeholder="Ngày sinh.." required onblur="validateBirthDate()" >
            <span id="ngaysinhError" style = "display:none;color: red; text-align: center;"></span><br>

            <label for="noisinh">Nơi sinh :<span style="color: red;"> *</span></label>
            <input type="text" id="noisinh" name="noisinh" placeholder="Nơi sinh.." required><br>

            <label for="cccd">Số CCCD :<span style="color: red;"> *</span></label>
            <input type="number" id="cccd" name="cccd" placeholder="Số CCCD.." required onblur="validatecccd()">
            <span id="cccdError" style = "display:none;color: red; text-align: center;">Số cccd phải có đúng 12 chữ số.</span><br>

            <label for="diachi">Địa chỉ :<span style="color: red;"> *</span></label>
            <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ.." required><br>

            <label for="sdt">Số điện thoại :<span style="color: red;"> *</span></label>
            <input type="number" id="sdt" name="sdt" placeholder="Số điện thoại.." required onblur="validatePhone()">
            <span id="sdtError" style = "display:none;color: red; text-align: center;">Số điện thoại phải có 10 hoặc 11 chữ số.</span><br>
            <label for="email">Email :<span style="color: red;"> *</span></label>
            <input type="email" id="email" name="email" placeholder="Email.." required><br>

            
            <label for="file_cv">Tải CV :<span style="color: red;"> *</span></label>
                <input type="file" accept=".pdf" id="file_cv" name="file_cv" required>
                <span id="imageError" style = "display:none;color: red; text-align: center;"></span><br>
            <input type="submit" value="Lưu" name="submit"><br>
        </form>
    </div>
    
</div>  

<script>
        const imageInput = document.getElementById('file_cv');
        const imageError = document.getElementById('imageError');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            const allowedExtensions = ['pdf'];
            const extension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(extension)) {
                imageError.textContent = 'Vui lòng chọn tệp có định dạng PDF.';
                imageError.style.display = 'block';
                this.value = ''; // Clear file selection
                return; // Prevent further processing
            }else{
                imageError.style.display = 'none';
            }

            // Proceed with other processing or file handling if the extension is valid
            // ...
        });

        function capitalizeName(name) {
            // Xóa dấu cách ở đầu và cuối, và dấu cách thừa giữa các từ
            name = name.trim().replace(/\s+/g, ' ');

            // Viết hoa chữ cái đầu của mỗi từ
            return name.split(' ').map(function(word) {
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            }).join(' ');
        }

        function normalizeName() {
            var input = document.getElementById("hoten");
            input.value = capitalizeName(input.value);
        }
        function validatecccd() {
            var input = document.getElementById("cccd");
            var error = document.getElementById("cccdError");
            if (input.value.length !== 12) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }
        }
        function validatePhone() {
            var input = document.getElementById("sdt");
            var error = document.getElementById("sdtError");
            if (input.value.length !== 10 && input.value.length !== 11) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }
        }
        function validateBirthDate() {
            var input = document.getElementById("ngaysinh");
            var error = document.getElementById("ngaysinhError");
            var birthDate = new Date(input.value);
            var today = new Date();

            // Kiểm tra tuổi có ít nhất là 18 không
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDifference = today.getMonth() - birthDate.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 18) {
                input.value = ""; // Xóa nội dung trường nhập liệu
                error.style.display = "block"; // Hiển thị thông báo lỗi
                error.innerText = "Ngày sinh cho thấy bạn phải ít nhất 18 tuổi.";
            } else {
                error.style.display = "none"; // Ẩn thông báo lỗi nếu hợp lệ
            }

        }
        function onSubmitHandler() {
            normalizeName();
            
        }
</script>





















<br><br>

<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInDown">
            <h2>Danh mục</h2>
            <ul class="tag_nav">
            <!-- <li><a href="#">Log-in / Sign-Up</a></li> -->
               <!-- adding category----------------------------------------------------------------- -->
               <?php 
                // require_once "connection.php";

                $get_category = "SELECT * FROM danhmuc";
                $result = mysqli_query($conn , $get_category);
                if($result){
                  while ( $rows =  mysqli_fetch_assoc($result) ){
                    $c_name = $rows["tendanhmuc"];
                   
              ?> 
                <li><a href="read-category.php?category=<?php echo $c_name; ?> "> <?php echo ucwords($c_name); ?> </a></li>
                      <?php
                        }
                    }
                  ?>
                <!-- end of adding category---------------------------------------------------------  -->
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Liên hệ</h2>
            <address>
          
              <P> Địa chỉ : Số 69, Đường Số 4, Khu đô Thị Waterfront, Vĩnh Niệm, Lê Chân, Hải Phòng</P>
              <P>  Điện thoại: <a  style="color:rgb(218,218,218);" href="tel:+ 097 5779783"> + 097 5779783 </a></P>
              <p>Email : <a style="color:rgb(218,218,218);" href = "mailto:Info@nhatvietsh"> Info@nhatvietsh </a> </p>
              <p>Fax : <a style="color:rgb(218,218,218);" href="fax:+913463463546"> +913463463546 </a> </p>
            </address>


          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; <?php echo date("Y" , strtotime("now") ); ?> <a href="./index.php">NewsFeed</a></p>
      <p class="developer" style="color:white;">Developed By HVH</p>
      <!-- Wpfreeware -->
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>