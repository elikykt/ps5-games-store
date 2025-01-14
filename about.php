<?php
include 'cart.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас | PS5 Игры</title>
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

    <!-- About Section -->
    <section class="about-section">
        <h2>О компании</h2>
        <p>Мы — команда геймеров и энтузиастов, которые знают, как важны качественные игры для полного погружения в мир PS5.</p>
        <p>Наша миссия — предложить вам лучшие продукты и сервис. Мы работаем с 2023 года и стремимся быть лидерами в индустрии.</p>
    </section>

    <!-- Our History -->
    <section class="history-section">
        <h2>Наша история</h2>
        <p>Компания была основана в 2023 году группой друзей, объединённых страстью к видеоиграм. Начав с небольшого магазина в Москве, мы быстро выросли, расширили ассортимент и начали доставлять товары по всей России.</p>
        <p>Сегодня PS5 Гейминг Мир — это не просто магазин, а место, где каждый может найти игры и вдохновение для новых приключений.</p>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us-section">
        <h2>Почему выбирают нас?</h2>
        <ul>
            <li>Мы предлагаем только оригинальную продукцию от проверенных поставщиков.</li>
            <li>У нас выгодные цены и регулярные скидки.</li>
            <li>Быстрая доставка по всей стране.</li>
            <li>Профессиональная поддержка клиентов 24/7.</li>
        </ul>
    </section>

    <!-- Customer Reviews -->
    <section class="reviews-section">
        <h2>Отзывы клиентов</h2>
        <div class="review">
            <p>"Отличный магазин с огромным выбором игр. Покупал здесь PS5 и несколько игр, всё пришло быстро и в идеальном состоянии!"</p>
            <span>— Иван, Санкт-Петербург</span>
        </div>
        <div class="review">
            <p>"Очень нравится, что у них всегда есть новинки. Плюс радуют акции и бонусы для постоянных покупателей."</p>
            <span>— Мария, Москва</span>
        </div>
        <div class="review">
            <p>"Лучший магазин для геймеров! Отличный сервис и дружелюбная поддержка."</p>
            <span>— Алексей, Казань</span>
        </div>
    </section>

    <!-- Our Team -->
    <section class="team-section">
        <h2>Наша команда</h2>
        <p>Мы — команда профессионалов, которые живут видеоиграми. Каждый из нас знает, насколько важны внимание к деталям и качественный сервис для геймеров.</p>
        <div class="team-members">
            <div class="team-member">
                <h3>Анна Иванова</h3>
                <p>Генеральный директор</p>
            </div>
            <div class="team-member">
                <h3>Максим Сидоров</h3>
                <p>Менеджер по закупкам</p>
            </div>
            <div class="team-member">
                <h3>Екатерина Смирнова</h3>
                <p>Специалист по поддержке клиентов</p>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <section class="contact-section">
        <h2>Контакты</h2>
        <p>У вас есть вопросы? Свяжитесь с нами!</p>
        <ul>
            <li>Email: support@ps5games.ru</li>
            <li>Телефон: +7 (495) 123-45-67</li>
            <li>Адрес: Москва, ул. Геймеров, д. 10</li>
        </ul>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; 2024 PS5 Гейминг Мир. Все права защищены.</p>
    </footer>
</body>
</html>
