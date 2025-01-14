<?php
include 'cart.php'; 

$conn = new mysqli('localhost', 'root', '', 'videogame_shop_ru');
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$productsInCart = array_keys($_SESSION['cart']); 
$productDetails = [];

if (!empty($productsInCart)) {
    $placeholders = implode(',', array_fill(0, count($productsInCart), '?'));
    $stmt = $conn->prepare("SELECT * FROM games WHERE id IN ($placeholders)");
    $stmt->bind_param(str_repeat('i', count($productsInCart)), ...$productsInCart);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $productDetails[] = $row;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина | PS5 Гейминг Мир</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <h1>Корзина</h1>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="shop.php">Магазин</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="cart-section">
            <h2>Ваши товары</h2>
            <?php if (!empty($productDetails)): ?>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Итого</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalPrice = 0;
                        foreach ($productDetails as $product): 
                            $subtotal = $product['price'] * $_SESSION['cart'][$product['id']];
                            $totalPrice += $subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div class="cart-item">
                                        <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" class="cart-img">
                                        <div class="cart-title"><?php echo htmlspecialchars($product['title']); ?></div>
                                    </div>
                                </td>
                                <td><?php echo number_format($product['price'], 2, '.', ''); ?> руб.</td>
                                <td><?php echo $_SESSION['cart'][$product['id']]; ?></td>
                                <td><?php echo number_format($subtotal, 2, '.', ''); ?> руб.</td>
                                <td>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn-secondary">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="total-text">Общая стоимость:</td>
                            <td colspan="2" class="total-price"><?php echo number_format($totalPrice, 2, '.', ''); ?> руб.</td>
                        </tr>
                    </tfoot>
                </table>
                <form method="post" action="cart.php">
                    <input type="hidden" name="action" value="clear">
                    <button type="submit" class="btn-clear">Очистить корзину</button>
                </form>
                <div class="back-shop">
                    <a href="javascript:history.back()" class="btn-primary">Вернуться назад</a>
                </div>
            <?php else: ?>
                <p class="empty-cart">Ваша корзина пуста.</p>
                <a href="shop.php" class="btn-primary">Вернуться в магазин</a>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
