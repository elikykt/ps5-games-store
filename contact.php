<?php
include 'cart.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты | PS5 Игры</title>
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

    <!-- Contact Section -->
    <section class="contact-section">
        <h2>Свяжитесь с нами</h2>
        <p>У вас есть вопросы или пожелания? Напишите нам, и мы ответим вам в ближайшее время.</p>
        
        <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
            <p class="success-message">Ваше сообщение отправлено! Мы свяжемся с вами в ближайшее время.</p>
        <?php elseif (isset($_GET['error']) && $_GET['error'] === '1'): ?>
            <p class="error-message">Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте позже.</p>
        <?php endif; ?>
        
        <form id="contact-form" method="post" action="send_message.php">
            <label for="name">Ваше имя:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Ваш email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Ваше сообщение:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit" class="btn-primary">Отправить</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; 2024 PS5 Гейминг Мир. Все права защищены.</p>
    </footer>
</body>
</html>
