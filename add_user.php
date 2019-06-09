<?php
require_once 'db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = trim(filter_var($_POST['username']),FILTER_SANITIZE_STRING);
    $email = trim(filter_var($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password = trim(filter_var($_POST['password']),FILTER_SANITIZE_STRING);

    /*проверка что пользователя нет в БД*/
    $sql_check = 'SELECT * FROM `users` WHERE `username` = :username OR `email` = :email';
    $query_check = $connection->prepare($sql_check);
    $query_check->bindValue(':username', $username, PDO::PARAM_STR);
    $query_check->bindValue(':email', $email, PDO::PARAM_STR);
    $query_check->execute();
    
    if ($query_check->fetch(PDO::FETCH_NUM)) 
        echo 'Такой пользователь зарегистрирован';
    else {

    $salt = 'jsdfgvmnsrtioghdfv';
    $password = md5($password . $salt);

    $sql = 'INSERT INTO users(username, email, password) VALUES(?, ?, ?)';
    $query = $connection->prepare($sql);
    $query->execute([$username, $email, $password]);
    setcookie("username", $username, time() + 3600, "/");
    echo "Готово";
    }

}
