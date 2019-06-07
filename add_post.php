<?php
if (!isset($_COOKIE['username']))
    header ("Location: /index.php");

require_once 'db.php';

$title = trim(filter_var($_POST['title']),FILTER_SANITIZE_STRING);
$text = trim(filter_var($_POST['text']),FILTER_SANITIZE_STRING);
$author = $_COOKIE['username'];

//$error = '';
////проверка на пустоту

$sql = 'INSERT INTO post (title, text, author) VALUES (?, ?, ?)';
$query = $connection->prepare($sql);
$query->execute([$title, $text, $author]);
header("Location: /post.php");
exit();
//if ($query) {
//    $message = "Пост успешно добавлен";
//}
//else {
//    $error = "Ошибка";
//}
//
?>





