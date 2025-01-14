<?php
include 'cart.php';

// Подключение к базе данных
$conn = new mysqli('localhost', 'root', '', 'videogame_shop_ru');

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Обработка добавления товара в корзину
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);
    addToCart($productId); 

    header("Location: shop.php");
    exit; 
}

// Получение списка товаров
$sql = "SELECT * FROM games";
$result = $conn->query($sql);
if (!$result) {
    die("Ошибка выполнения запроса: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин | PS5 Игры</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="logo">
            <h1>PS5 Игры</h1>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="shop.php">Магазин</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="cart_view.php" class="cart-button">
                Корзина (<?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>)
            </a>
        </div>
    </header>

    <!-- Products Section -->
    <section class="products-section">
        <h2>Все товары</h2>
        <div class="products-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong><?php echo number_format($row['price'], 2, '.', ''); ?> руб.</strong></p>
                        <form method="post" action="shop.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn-primary">Купить</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Товары не найдены.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; 2024 PS5 Гейминг Мир. Все права защищены.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
