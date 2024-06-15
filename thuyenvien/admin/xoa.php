<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '\lib\database.php');

?>

<?php


include_once 'classes/chungchi.php';
include_once 'classes/user.php';
if (isset($_GET['id_giayto'])) {
    $chungchi = new chungchi();
    $result = $chungchi->delete($_GET['id_giayto']);
    if ($result) {
        echo '<script type="text/javascript">alert("Xóa thành công!"); ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo '<script type="text/javascript">alert("Xóa thất bại!"); ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
if (isset($_GET['tendangnhap'])) {
    $user = new user();
    $result = $user->delete($_GET['tendangnhap']);
    if ($result) {
        echo '<script type="text/javascript">alert("Xóa thành công!"); ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo '<script type="text/javascript">alert("Xóa thất bại!"); ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}
if (isset($_GET['idtamkhoa'])) {
    $user = new user();
    $result = $user->khoa($_GET['idtamkhoa']);
    if ($result) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}