<?php

//если username POST  не существует редирект на index
if (!isset($_COOKIE['username']))
    header ("Location: /index.php");

//подключение файла конфигурации подключения к БД
require_once 'db.php';

function datachecking($data) {          //функция обработки вводимых данных
    $data = trim($data);                //обрезаем пробелы
    $data = stripcslashes($data);       //удаляет экранирование символов
    $data = htmlspecialchars($data);    //преобразует теги
    return $data;
}

//задаем и обрабатываем пременные
$title = datachecking($_POST['title']);
$text = datachecking($_POST['text']);
$author = $_COOKIE['username'];

//запрос sql: вставить в таблицу post в столбцы title, text, author значения переменных
$sql = 'INSERT INTO post (title, text, author) VALUES (?, ?, ?)';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса с определением переменных
$query->execute([$title, $text, $author]);

//редирект на страницу
header("Location: /post.php");
exit();

?>





