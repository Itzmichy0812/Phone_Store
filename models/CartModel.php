<?php
/**
 * CartModel - Quản lý giỏ hàng bằng PHP Session
 * Hỗ trợ guest checkout (không cần login)
 */
class CartModel {
    
    /**
     * Khởi tạo session nếu chưa có
     */
    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    /**
     * Thêm sản phẩm vào giỏ hàng
     * @param int $productId ID sản phẩm
     * @param int $quantity Số lượng
     * @param object $db Database connection
     * @return bool Success status
     */
    public static function addItem($productId, $quantity = 1, $db) {
        self::init();
        
        // Lấy thông tin sản phẩm từ database
        $stmt = $db->prepare("SELECT id, name, price, image, category FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            return false; // Sản phẩm không tồn tại
        }
        
        // Nếu sản phẩm đã có trong cart, tăng quantity
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào cart
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => (float)$product['price'],
                'image' => $product['image'],
                'category' => $product['category'],
                'quantity' => $quantity
            ];
        }
        
        return true;
    }
    
    /**
     * Cập nhật số lượng sản phẩm
     * @param int $productId
     * @param int $quantity Số lượng mới
     */
    public static function updateQuantity($productId, $quantity) {
        self::init();
        
        if ($quantity <= 0) {
            // Nếu quantity <= 0, xóa sản phẩm
            self::removeItem($productId);
        } else {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }
        }
    }
    
    /**
     * Xóa sản phẩm khỏi giỏ hàng
     * @param int $productId
     */
    public static function removeItem($productId) {
        self::init();
        unset($_SESSION['cart'][$productId]);
    }
    
    /**
     * Lấy toàn bộ giỏ hàng
     * @return array
     */
    public static function getCart() {
        self::init();
        return $_SESSION['cart'];
    }
    
    /**
     * Tính tổng tiền giỏ hàng
     * @return float
     */
    public static function getTotal() {
        self::init();
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    /**
     * Đếm tổng số lượng sản phẩm trong giỏ
     * @return int
     */
    public static function getItemCount() {
        self::init();
        $count = 0;
        foreach ($_SESSION['cart'] as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
    
    /**
     * Xóa toàn bộ giỏ hàng
     */
    public static function clearCart() {
        self::init();
        $_SESSION['cart'] = [];
    }
    
    /**
     * Kiểm tra giỏ hàng có trống không
     * @return bool
     */
    public static function isEmpty() {
        self::init();
        return empty($_SESSION['cart']);
    }
}
?>
