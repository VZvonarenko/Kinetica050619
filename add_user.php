<?php
require_once 'db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = trim(filter_var($_POST['username']),FILTER_SANITIZE_STRING);
    $email = trim(filter_var($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password = trim(filter_var($_POST['password']),FILTER_SANITIZE_STRING);

    $error = '';
    //проверка на длину пароля/имени/и что pass1==pass2

    $salt = 'jsdfgvmnsrtioghdfv';
    $password = md5($password . $salt);

    $sql = 'INSERT INTO users(username, email, password) VALUES(?, ?, ?)';
    $query = $connection->prepare($sql);
    $query->execute([$username, $email, $password]);
    setcookie("username", $username, time() + 3600, "/");
    header('Location: /post.php');
    exit();


}
