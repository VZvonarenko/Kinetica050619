<?php
//подключение файла конфигурации подключения к БД
require_once 'db.php';

//если переменная POST не пустая то:
if ($_POST['mess']!='') {
    //определяем переменные
    $name = $_COOKIE['username'];
    $mess = trim(filter_var($_POST['mess']),FILTER_SANITIZE_STRING);        //обрезаем пробелы, фильтр удаляет теги
    $post_id = trim(filter_var($_GET['id']), FILTER_SANITIZE_NUMBER_INT);   //обрезаем пробелы, фильтр оставляет цифры

    //запрос sql: вставить в таблицу comments в столбцы text, author, post_id значения переменных
    $sql = 'INSERT INTO comments (text, author, post_id) VALUES (?, ?, ?)';

    //подгатавливаем запрос к выполнению
    $query = $connection->prepare($sql);

    //запуск запроса с определением переменных
    $query->execute([$mess, $name, $post_id]);

    //редирект на страницу
    header("Location: /comment.php?id=$post_id");
    exit();
}