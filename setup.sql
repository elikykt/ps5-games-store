CREATE DATABASE IF NOT EXISTS videogame_shop_ru;

USE videogame_shop_ru;

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
);

INSERT INTO games (title, description, price, image) VALUES
('The Last of Us Part II', 'Продолжение легендарной приключенческой игры с глубоким сюжетом.', 4499, 'last_of_us_2.jpg'),
('God of War: Ragnarok', 'Новое эпическое путешествие Кратоса и Атрея по скандинавским мифам.', 5999, 'god_of_war_ragnarok.jpg'),
('Horizon Forbidden West', 'Приключения Элой в захватывающем мире роботов.', 5499, 'horizon_forbidden_west.jpg'),
('Spider-Man: Miles Morales', 'История нового Человека-Паука в Нью-Йорке.', 3999, 'spider_man_miles_morales.jpg'),
('Elden Ring', 'Ролевая игра в открытом мире от создателей Dark Souls.', 5999, 'elden_ring.jpg'),
('Call of Duty: Modern Warfare II', 'Интенсивный военный шутер с захватывающим сюжетом.', 6499, 'call_of_duty_mw2.jpg'),
('Gran Turismo 7', 'Симулятор автогонок с реалистичной графикой.', 4999, 'gran_turismo_7.jpg'),
('Resident Evil 4 Remake', 'Ремейк культового хоррора с улучшенной графикой.', 4699, 'resident_evil_4_remake.jpg'),
('Final Fantasy XVI', 'Фэнтезийная ролевая игра с эпическим сюжетом.', 5999, 'final_fantasy_16.jpg'),
('Demon\'s Souls', 'Ремейк культовой игры в жанре dark fantasy.', 5499, 'demons_souls.jpg');