<?php
$host	= 'localhost';  //хост где хранится БД
$user = 'root';         //пользователь БД
$password = '';         //пароль к учетке root
$db = 'test050619';        //имя базы данных

try {

    $connection = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
} catch (PDOException $e) {
    echo 'Не удалось соедениться с базой ' . $e->getMessage();
}



