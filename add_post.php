<?php

//если username POST  не существует редирект на index
if (!isset($_COOKIE['username']))
    header ("Location: /index.php");

//подключение файла конфигурации подключения к БД
require_once 'db.php';

//определяем переменные
$title = trim(filter_var($_POST['title']),FILTER_SANITIZE_STRING);  //обрезаем пробелы, фильтр удаляет теги
$text = trim(filter_var($_POST['text']),FILTER_SANITIZE_STRING);    //обрезаем пробелы, фильтр удаляет теги
$author = $_COOKIE['username'];                                             //берем из cookie

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





