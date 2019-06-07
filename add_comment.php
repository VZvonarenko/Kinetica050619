<?php
require_once 'db.php';

if ($_POST['mess']!='') {
    $name = $_COOKIE['username'];
    $mess = trim(filter_var($_POST['mess']),FILTER_SANITIZE_STRING);
    $post_id = trim(filter_var($_GET['id']), FILTER_SANITIZE_NUMBER_INT);


    $sql = 'INSERT INTO comments (text, author, post_id) VALUES (?, ?, ?)';
    $query = $connection->prepare($sql);
    $query->execute([$mess, $name, $post_id]);
    header("Location: /comment.php?id=$post_id");
    exit();
}