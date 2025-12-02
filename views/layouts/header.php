<?php
// Start session để lấy cart count
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'models/CartModel.php';
$cartCount = CartModel::getItemCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneStore</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="main-header">
    <div class="nav-container">
      <div class="nav-logo">
        <a href="index.php?page=home">
            <img src="assets/img/logo.png" alt="PhoneStore Logo">
        </a>
      </div>

      <nav class="nav-menu">
        <a href="index.php?page=home" class="nav-link">Home</a>
        <a href="index.php?page=shop" class="nav-link">Shop</a>
        <a href="index.php?page=about" class="nav-link">About</a>
        <a href="index.php?page=contact" class="nav-link">Contact</a>
        <a href="index.php?page=qna" class="nav-link">Q&A</a>
        
        <a href="index.php?page=admin_dashboard" class="nav-link text-danger fw-bold">Admin</a>
        <div class="cart-dropdown-wrapper">
                <button class="cart-icon-btn" id="cartIconBtn" type="button">
                    <i class="bi bi-cart3"></i>
                    <span class="cart-badge" id="cartBadge"><?= $cartCount ?></span>
                </button>
                
                <!-- Mini Cart Dropdown -->
                <div class="cart-dropdown" id="cartDropdown">
                    <div class="cart-dropdown-header">
                        <h6>Shopping Cart</h6>
                        <span class="cart-item-count" id="cartItemCount"><?= $cartCount ?> items</span>
                    </div>
                    
                    <div class="cart-dropdown-body" id="cartDropdownBody">
                        <!-- Will be populated by JavaScript -->
                        <div class="cart-empty-message">
                            <i class="bi bi-cart-x"></i>
                            <p>Your cart is empty</p>
                        </div>
                    </div>
                    
                    <div class="cart-dropdown-footer">
                        <div class="cart-total">
                            <span>Total:</span>
                            <strong id="cartTotalAmount">0.00</strong>
                        </div>
                        <div class="cart-actions">
                            <a href="?page=cart" class="btn btn-outline">View Cart</a>
                            <a href="?page=checkout" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        <a href="#" class="nav-link nav-signup">Sign up</a>
      </nav>
    </div>
</header>

