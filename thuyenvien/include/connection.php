<?php

$dbhost = "localhost";
$dbuser = "bsvpjgfl_qltv";
$dbpass = "zFG87pxB24uK9z27bLdB";
$dbname = "bsvpjgfl_qltv";

$conn = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);

if(!isset($conn)){
    echo die("Database connection failed");
}
// Thiết lập mã hóa ký tự cho kết nối
mysqli_set_charset($conn, "utf8mb4");

// Thiết lập header cho trang web
header('Content-Type: text/html; charset=utf-8');

?>