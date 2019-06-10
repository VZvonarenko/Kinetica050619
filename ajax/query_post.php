<?php
//подключение файла конфигурации подключения к БД
include "../db.php";

//переменная
$start = $_POST['start'];

//sql запрос: выбрать все записи в таблице post отсортированы по id в обратном порядке c $start и 2 записи
$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT ?, 2';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//связывает параметры с переменной (integer)
$query->bindParam(1, $start, PDO::PARAM_INT);

//запуск запроса
$query->execute();

//создание пустого массива
$posts = array();

//пока существует строка из БД (в формате массива) записываем ее в новый массив
while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
	$posts[] = $result;
}

//вывод нового массива в JSON формате для ajax запроса 
echo json_encode($posts);


