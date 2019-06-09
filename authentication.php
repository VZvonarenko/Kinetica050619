<?php
require_once 'db.php';
//if (isset($_POST['username']) && isset($_POST['password'])) {}
$username = trim(filter_var($_POST['username']),FILTER_SANITIZE_STRING);
$password = trim(filter_var($_POST['password']),FILTER_SANITIZE_STRING);
$error = '';
//проверка на длину пароля/имени/и что pass1==pass2
$salt = 'jsdfgvmnsrtioghdfv';
$password = md5($password . $salt);
$sql = 'SELECT `id` FROM `users` WHERE `username` = :username && `password` = :password';
$query = $connection->prepare($sql);
$query->execute(['username'=>$username, 'password' => $password]);
$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0)
    echo 'Такого пользователя нет или введены неправильные данные';
else {
    setcookie("username", $username, time() + 3600 * 24, "/");
    // header('Location: /post.php');
    echo 'Готово';
    // exit();
}