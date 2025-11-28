<?php
// index.php - Main router
session_start();

define('BASE_PATH', __DIR__);

// Include AuthController
require_once __DIR__ . '/controllers/AuthController.php';
$auth = new AuthController();

// Include page/function restriction
require_once __DIR__ . '/helpers/page_restriction.php';

// 1. Get "page" parameter from URL, default to "home"
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 2. Define folders for views
$viewFolder = 'views/client/';
$adminFolder = 'views/admin/';

// 3. Define public pages and restricted pages for specific users 
$publicPages = ['login_signup'];

$restrictedPages = ['contact'];

// 4. Force login if NOT a guest
if (!in_array($page, $publicPages)) {
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['is_guest'])) {
        header("Location: index.php?page=login_signup");
        exit();
    }
}

// Only restrict guests from certain pages
if (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true) {
    restrictPages($restrictedPages, 'guest');
}

// 6. Routing
switch ($page) {
    // --- CLIENT SIDE ---
    case 'login_signup':
        include $viewFolder . 'login_signup.php';
        break;

    case 'home':
        include $viewFolder . 'home.php';
        break;

    case 'shop':
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

    case 'logout':
        $auth->logout(); // This will destroy the session and redirect
        break;

    // --- ADMIN SIDE ---
    case 'admin_dashboard':
    case 'manage_about_info':
    case 'manage_contacts':
    case 'manage_qna':
    case 'manage_info':
        // Only allow admin users
        if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            header("Location: index.php?page=home");
            exit();
        }
        include $adminFolder . $page . '.php';
        break;

    // --- 404 ERROR ---
    default:
        echo "<h1>404 - Page Not Found</h1>";
        break;
}
?>
