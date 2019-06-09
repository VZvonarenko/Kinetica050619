<?php
include "../db.php";
$start = $_POST['start'];
$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT ?, 2';
$query = $connection->prepare($sql);
$query->bindParam(1, $start, PDO::PARAM_INT);
$query->execute();
$posts = array();
while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
	$posts[] = $result;
}
echo json_encode($posts);


