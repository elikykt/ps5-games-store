<?php
include 'cart.php';
?>

<?php
$conn = new mysqli('localhost', 'root', '', 'videogame_shop_ru');
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$sql = "SELECT * FROM games";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS5 Игры</title>
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
            <a href="cart_view.php" class="cart-button">Корзина (<?php echo array_sum($_SESSION['cart']); ?>)</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h2>Лучшие игры для PS5</h2>
            <p>Только оригинальный товар. Играй сегодня!</p>
            <a href="shop.php" class="btn-primary">Купить игры</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; 2024 PS5 Гейминг Мир. Все права защищены.</p>
    </footer>
</body>
</html>
