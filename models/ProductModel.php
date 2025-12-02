<?php
// models/ProductModel.php

class ProductModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CẬP NHẬT: Thêm tham số $sort = 'default'
    public function getAllProducts($limit = 12, $offset = 0, $sort = 'default') {
        try {
            // 1. Khởi tạo câu truy vấn cơ bản
            $query = "SELECT * FROM products";
            
            // 2. Xử lý logic sắp xếp (Nối thêm ORDER BY vào chuỗi $query)
            // Lưu ý: Không dùng bindParam cho ORDER BY được, phải nối chuỗi an toàn như này
            switch ($sort) {
                case 'price_asc':
                    $query .= " ORDER BY price ASC"; // Giá thấp -> cao
                    break;
                case 'price_desc':
                    $query .= " ORDER BY price DESC"; // Giá cao -> thấp
                    break;
                case 'name_asc':
                    $query .= " ORDER BY name ASC";   // Tên A -> Z
                    break;
                default:
                    $query .= " ORDER BY created_at DESC"; // Mặc định: Mới nhất lên đầu
                    break;
            }

            // 3. Nối thêm phần phân trang
            $query .= " LIMIT :limit OFFSET :offset";
            
            // 4. Chuẩn bị và thực thi
            $stmt = $this->conn->prepare($query);
            
            // Bind số nguyên cho limit và offset
            $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
            
            $stmt->execute();
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Đếm tổng số sản phẩm (Giữ nguyên)
    public function countProducts() {
        $query = "SELECT COUNT(*) as total FROM products";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['total'];
    }
    
    // Lấy chi tiết 1 sản phẩm (Giữ nguyên)
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    //METHOD FILTER
    public function getFilteredProducts($filters = [], $limit = 12, $offset = 0, $sort = 'default') {
    $query = "SELECT * FROM products WHERE 1=1";
    $params = [];
    
    // Brand filter
    if (!empty($filters['brand'])) {
        $brands = $filters['brand']; // Array
        $placeholders = implode(',', array_fill(0, count($brands), '?'));
        $query .= " AND brand IN ($placeholders)";
        $params = array_merge($params, $brands);
    }
    
    // Price filter
    if (!empty($filters['price_min'])) {
        $query .= " AND price >= ?";
        $params[] = $filters['price_min'];
    }
    if (!empty($filters['price_max'])) {
        $query .= " AND price <= ?";
        $params[] = $filters['price_max'];
    }
    
    // Storage filter
    if (!empty($filters['storage'])) {
        $storages = $filters['storage'];
        $placeholders = implode(',', array_fill(0, count($storages), '?'));
        $query .= " AND storage IN ($placeholders)";
        $params = array_merge($params, $storages);
    }
    
    // Category filter
    if (!empty($filters['category'])) {
        $query .= " AND category = ?";
        $params[] = $filters['category'];
    }
    
    // Sorting
    switch ($sort) {
        case 'price_asc': $query .= " ORDER BY price ASC"; break;
        case 'price_desc': $query .= " ORDER BY price DESC"; break;
        case 'name_asc': $query .= " ORDER BY name ASC"; break;
        default: $query .= " ORDER BY created_at DESC";
    }
    
    $query .= " LIMIT ? OFFSET ?";
    $params[] = $limit;
    $params[] = $offset;
    
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
    }

    // Method lấy unique values cho filter dropdowns
    public function getFilterOptions() {
        return [
            'brands' => $this->conn->query("SELECT DISTINCT brand FROM products WHERE brand IS NOT NULL ORDER BY brand")->fetchAll(PDO::FETCH_COLUMN),
            'storages' => $this->conn->query("SELECT DISTINCT storage FROM products WHERE storage IS NOT NULL ORDER BY storage")->fetchAll(PDO::FETCH_COLUMN),
            'categories' => $this->conn->query("SELECT DISTINCT category FROM products ORDER BY category")->fetchAll(PDO::FETCH_COLUMN)
        ];
    }

}


    
?>