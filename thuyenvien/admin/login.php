<?php
include 'classes/user.php';
$user = new user();
$login_check="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Username'];
    $password = md5($_POST['Password']);
    $login_check = $user->login($email, $password);
	
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>CÔNG TY CỔ PHẦN VẬN TẢI BIỂN VÀ XNK NHẬT VIỆT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all">
	<link rel="icon" type="image/png" href="images/233logo.png">
	
</head>

<body>
	<h1>HỆ THỐNG QUẢN LÝ THUYỀN VIÊN</h1>
	<div class="w3layoutscontaineragileits">
		<h2>ĐĂNG NHẬP</h2>
            <p style="color: red;"><?php echo $login_check; ?></p>
		<form action="#" method="post">
			<input type="text" Name="Username" placeholder="Tên đăng nhập" required="">
			<input style="background: url(images/password.png) no-repeat 382px 11px;background-size: 25px;" type="password" id="passwordInput" Name="Password" placeholder="Mật khẩu" required="" >
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="showPassword" value="">
					<label for="showPassword"><span></span>Ẩn/hiện mật khẩu</label>
					<!-- <a href="#">Quên mật khẩu?</a> -->
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="ĐĂNG NHẬP">
			</div>
		</form>
	</div>
	<script>
        // JavaScript để thay đổi loại của trường nhập liệu mật khẩu
        const passwordInput = document.getElementById('passwordInput');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>

</html>