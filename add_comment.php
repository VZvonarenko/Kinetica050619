<?php
//подключение файла конфигурации подключения к БД
require_once 'db.php';

//если переменная POST не пустая то:
if ($_POST['mess']!='') {
    //определяем переменные

    function datachecking($data) {          //функция обработки вводимых данных
        $data = trim($data);                //обрезаем пробелы
        $data = stripcslashes($data);       //удаляет экранирование символов
        $data = htmlspecialchars($data);    //преобразует теги
        return $data;
    }

    $name = $_COOKIE['username'];
    $mess = datachecking($_POST['mess']);           //переменная после обработки
    $post_id = $_GET['id'];

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