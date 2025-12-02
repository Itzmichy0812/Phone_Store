<?php
include 'views/layouts/header.php';
require_once 'models/CartModel.php';

$cartItems = CartModel::getCart();
$total = CartModel::getTotal();
?>

<!-- Cart Hero Section -->
<section class="shop-banner" style="background-image: url('assets/img/shop_banner.jpg');">
    <div class="shop-banner-content text-center">
        <h1>Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php?page=shop">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Cart Content -->
<div class="container cart-container my-5">
    <?php if (empty($cartItems)): ?>
        <!-- Empty Cart -->
        <div class="empty-cart text-center py-5">
            <i class="bi bi-cart-x" style="font-size: 80px; color: #ccc;"></i>
            <h3 class="mt-4">Your cart is empty</h3>
            <p class="text-muted">Add some products to get started!</p>
            <a href="?page=shop" class="btn btn-primary mt-3">
                <i class="bi bi-shop"></i> Continue Shopping
            </a>
        </div>
    <?php else: ?>
        <!-- Cart Table -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table cart-table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr data-product-id="<?= $item['id'] ?>">
                                        <td>
                                            <div class="cart-product-info d-flex align-items-center gap-3">
                                                <img src="<?= htmlspecialchars($item['image']) ?>" 
                                                     alt="<?= htmlspecialchars($item['name']) ?>" 
                                                     class="cart-product-img">
                                                <div>
                                                    <h6 class="mb-1"><?= htmlspecialchars($item['name']) ?></h6>
                                                    <small class="text-muted"><?= htmlspecialchars($item['category']) ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span class="product-price"><?= number_format($item['price'], 2) ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="quantity-input">
                                                <button class="qty-btn qty-minus" data-product-id="<?= $item['id'] ?>">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" 
                                                       class="qty-value" 
                                                       value="<?= $item['quantity'] ?>" 
                                                       min="1" 
                                                       data-product-id="<?= $item['id'] ?>"
                                                       readonly>
                                                <button class="qty-btn qty-plus" data-product-id="<?= $item['id'] ?>">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <strong class="product-subtotal"><?= number_format($item['price'] * $item['quantity'], 2) ?></strong>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-remove-item" data-product-id="<?= $item['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Cart Totals -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Cart Totals</h5>
                    </div>
                    <div class="card-body">
                        <div class="cart-summary">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span id="cartSubtotal"><?= number_format($total, 2) ?></span>
                            </div>
                            <hr>
                            <div class="summary-row total-row">
                                <strong>Total</strong>
                                <strong class="text-primary" id="cartTotal"><?= number_format($total, 2) ?></strong>
                            </div>
                        </div>
                        
                        <a href="?page=checkout" class="btn btn-primary w-100 mt-3">
                            <i class="bi bi-check-circle"></i> Check Out
                        </a>
                        
                        <a href="?page=shop" class="btn btn-outline-secondary w-100 mt-2">
                            <i class="bi bi-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Cart Page JavaScript -->
<script>
// Update quantity
document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        const input = document.querySelector(`.qty-value[data-product-id="${productId}"]`);
        let quantity = parseInt(input.value);
        
        if (this.classList.contains('qty-plus')) {
            quantity++;
        } else if (this.classList.contains('qty-minus') && quantity > 1) {
            quantity--;
        }
        
        input.value = quantity;
        updateCartQuantity(productId, quantity);
    });
});

// Remove item
document.querySelectorAll('.btn-remove-item').forEach(btn => {
    btn.addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        if (confirm('Remove this product from cart?')) {
            removeCartItem(productId);
        }
    });
});

// Update cart quantity via AJAX
async function updateCartQuantity(productId, quantity) {
    const formData = new FormData();
    formData.append('action', 'update');
    formData.append('product_id', productId);
    formData.append('quantity', quantity);
    
    const response = await fetch('ajax/cart_handler.php', {
        method: 'POST',
        body: formData
    });
    
    const data = await response.json();
    
    if (data.success) {
        location.reload(); // Reload để update UI
    }
}

// Remove cart item via AJAX
async function removeCartItem(productId) {
    const formData = new FormData();
    formData.append('action', 'remove');
    formData.append('product_id', productId);
    
    const response = await fetch('ajax/cart_handler.php', {
        method: 'POST',
        body: formData
    });
    
    const data = await response.json();
    
    if (data.success) {
        location.reload();
    }
}
</script>

<?php include 'views/layouts/footer.php'; ?>