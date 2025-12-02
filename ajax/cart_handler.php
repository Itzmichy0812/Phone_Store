<?php
/**
 * AJAX Handler cho Shopping Cart
 * Xử lý: add, update, remove, get cart
 */

// Start session
session_start();

// Include dependencies
require_once '../config/db.php';
require_once '../models/CartModel.php';

// Set JSON header
header('Content-Type: application/json');

// Get action from POST
$action = $_POST['action'] ?? '';

// Initialize database
$database = new Database();
$db = $database->connect();

// Process action
switch ($action) {
    
    case 'add':
        // Thêm sản phẩm vào cart
        $productId = (int)$_POST['product_id'];
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        if ($productId > 0 && $quantity > 0) {
            $result = CartModel::addItem($productId, $quantity, $db);
            
            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Product added to cart!',
                    'itemCount' => CartModel::getItemCount(),
                    'total' => CartModel::getTotal()
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Product not found!'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid product or quantity!'
            ]);
        }
        break;
    
    case 'update':
        // Cập nhật số lượng sản phẩm
        $productId = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        
        CartModel::updateQuantity($productId, $quantity);
        
        echo json_encode([
            'success' => true,
            'message' => 'Cart updated!',
            'total' => CartModel::getTotal(),
            'itemCount' => CartModel::getItemCount()
        ]);
        break;
    
    case 'remove':
        // Xóa sản phẩm khỏi cart
        $productId = (int)$_POST['product_id'];
        
        CartModel::removeItem($productId);
        
        echo json_encode([
            'success' => true,
            'message' => 'Product removed!',
            'itemCount' => CartModel::getItemCount(),
            'total' => CartModel::getTotal()
        ]);
        break;
    
    case 'get':
        // Lấy toàn bộ giỏ hàng (dùng cho mini cart)
        echo json_encode([
            'success' => true,
            'cart' => CartModel::getCart(),
            'total' => CartModel::getTotal(),
            'itemCount' => CartModel::getItemCount()
        ]);
        break;
    
    case 'clear':
        // Xóa toàn bộ giỏ hàng
        CartModel::clearCart();
        
        echo json_encode([
            'success' => true,
            'message' => 'Cart cleared!'
        ]);
        break;
    
    default:
        echo json_encode([
            'success' => false,
            'message' => 'Invalid action!'
        ]);
        break;
}
?>
