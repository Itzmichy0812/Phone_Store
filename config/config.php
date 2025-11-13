<?php
$host = 'localhost';
$username = 'root';  // Username mặc định trong XAMPP
$password = '';      // Mật khẩu mặc định là trống
$dbname = 'phone_shop';  // Tên cơ sở dữ liệu

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
