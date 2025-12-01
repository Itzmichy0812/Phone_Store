<?php
// index.php - Router đơn giản
define('BASE_PATH', __DIR__);

// 1. Lấy tham số "page" từ URL, mặc định là "home"
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 2. Định nghĩa đường dẫn tới folder chứa Views
$controllerFolder = 'controllers/';
$viewFolder = 'views/client/';
$adminFolder = 'views/admin/';

// 3. Điều hướng (Routing)
switch ($page) {
    // --- CLIENT SIDE ---
    case 'home':
        include $viewFolder . 'home.php';
        break;
    
    case 'shop':
        // Gọi Controller thay vì include file trực tiếp
        require_once 'controllers/ShopController.php';
        $controller = new ShopController();
        $controller->index();
        break;

    case 'about':
        include $viewFolder . 'about.php';
        break;

    case 'contact':
        include $viewFolder . 'contact.php';
        break;

    case 'qna':
        include $viewFolder . 'qna.php';
        break;

    case 'cart':
        include $viewFolder . 'cart.php';
        break;
    
    case 'product':
        require_once $controllerFolder . 'ProductController.php';
        $controller = new ProductController();
        $controller->show();
        break;
        
    // --- ADMIN SIDE ---
    case 'admin_dashboard':
        include $adminFolder . 'admin_dashboard.php';
        break;

    case 'manage_about_info':
        include $adminFolder . 'manage_about_info.php';
        break;

    case 'manage_contacts':
        include $adminFolder . 'manage_contacts.php';
        break;

    case 'manage_qna':
        include $adminFolder . 'manage_qna.php';
        break;

    case 'manage_info':
        include $adminFolder . 'manage_info.php';
        break;

    
    
    
    // --- 404 ERROR ---
    default:
        echo "<h1>404 - Page Not Found</h1>";
        break;
}
?>