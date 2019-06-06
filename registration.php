<?php
require_once 'db.php';

$username = ($_POST['username']);
$email = ($_POST['email']);
$password = $_POST['password'];

$error = '';
//проверка на длину пароля/имени/и что pass1==pass2


$salt = 'jsdfgvmnsrtioghdfv';
$password = md5($password . $salt);

$sql = 'INSERT INTO users(username, email, password) VALUES(?, ?, ?)';
$query = $connection->prepare($sql);
$query->execute([$username, $email, $password]);
echo 'OK';


