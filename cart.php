<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add games
function addToCart($productId, $quantity = 1) {
    $quantity = max(1, intval($quantity)); 
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity; 
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Deleting games from cart
function removeFromCart($productId) {
    unset($_SESSION['cart'][$productId]); 
}

// Clear cart
function clearCart() {
    $_SESSION['cart'] = []; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $productId = $_POST['product_id'] ?? null;

    switch ($action) {
        case 'add':
            addToCart($productId, $_POST['quantity'] ?? 1);
            break;

        case 'remove':
            if ($productId) removeFromCart($productId);
            break;

        case 'clear':
            clearCart();
            break;
    }

    header('Location: cart_view.php');
    exit();
}
?>
