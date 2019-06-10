<?php
//подключение файла конфигурации подключения к БД
require_once 'db.php';

//определяем переменные, обрезаем пробелы, фильтруем как строки
$username = trim(filter_var($_POST['username']),FILTER_SANITIZE_STRING);
$password = trim(filter_var($_POST['password']),FILTER_SANITIZE_STRING);

//случайная строка для хэширования
$salt = 'jsdfgvmnsrtioghdfv';

//хэш пароля по md5
$password = md5($password . $salt);

//sql запрос: выбрать всех из траблицы users где username или email соответсвуют переменным
$sql = 'SELECT `id` FROM `users` WHERE `username` = :username && `password` = :password';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса с определением переменных
$query->execute(['username'=>$username, 'password' => $password]);

//возращаем объект
$user = $query->fetch(PDO::FETCH_OBJ);

//если id в объекте нет - пользваотеля нет такого
if($user->id == 0)
    echo 'Такого пользователя нет или введены неправильные данные';
else {

    //установка куки на 24 часа (лучше бы сделать на сессиях)
    setcookie("username", $username, time() + 3600 * 24, "/");

    echo 'Готово';

}