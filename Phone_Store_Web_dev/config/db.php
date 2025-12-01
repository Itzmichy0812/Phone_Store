<?php
// config/db.php

class Database {
    private $host = '127.0.0.1';
    private $db_name = 'phone_shop'; // Tên database bạn tạo trong phpMyAdmin
    private $username = 'root';
    private $password = '';             // Để trống nếu XAMPP không đặt pass
    private $port = '3306';             // <--- THÊM PORT 3307 TẠI ĐÂY

    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            // SỬA LẠI DÒNG DSN: Thêm ";port=" vào chuỗi
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);

        } catch(PDOException $e) {
            echo "Lỗi kết nối Database: " . $e->getMessage();
            exit();
        }

        return $this->conn;
    }
}
?>