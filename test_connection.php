<?php

// Подключение к MySQL
$conn = new mysqli('localhost', 'root', '', 'videogame_shop_ru');

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
echo "Подключение успешно!<br>";

// Выполнение SQL-запроса
$sql = "SELECT * FROM games";
$result = $conn->query($sql);

// Проверка результата
if ($result->num_rows > 0) {
    echo "Данные в таблице games:<br>";
    while ($row = $result->fetch_assoc()) {
        echo "Игра: " . $row['title'] . " - Цена: " . $row['price'] . " руб.<br>";
    }
} else {
    echo "Таблица games пуста.";
}

$conn->close();
?>
