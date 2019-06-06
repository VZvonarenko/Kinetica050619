<?php

//тут будет авторизация

require_once 'db.php';

$username = ($_POST['username']);
$password = $_POST['password'];


$error = '';
//проверка на длину пароля/имени/и что pass1==pass2

$salt = 'jsdfgvmnsrtioghdfv';
$password = md5($password . $salt);

$sql = 'SELECT `id` FROM `users` WHERE `username` = :username && `password` = :password';
$query = $connection->prepare($sql);
$query->execute(['username'=>$username, 'password' => $password]);
$user = $query->fetch(PDO::FETCH_OBJ);

if ($user->id == 0) {
    echo 'Такого пользователя нет';
}
    else {
        setcookie('username' , $username, time()+3600*24*30, "/");
        echo "Добро пожаловать $username";
    }




