<?php
//подключение header
include "blocks/header.php";
//подключение файла конфигурации подключения к БД
include 'db.php';

//sql запрос: выбрать 5 строк в таблице post отсортировать по id в обратном порядке
$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT 5';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса
$query->execute();

//возращаем масиив значений согласно запросу
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

    <!--    форма вывода данных из массива $query-->
    <div class="container ">
        <div class="card">
            <div class="card-body" id="posts">
                <?php foreach ($posts as $onepost): ?>
                <h2 class='card-title'><?=$onepost['title']?></h2>
                <p class='card-text'><?=$onepost['text']?></p>
                <h5 class='card-subtitle'>Автор поста: <em><?=$onepost['author']?></em></h5>
                <a class='card-link' href=/comment.php?id=<?=$onepost['id']?>>Читать комментарии</a>
                <hr align='center' width="90%" size="50" color="#dddddd" />
                <?php endforeach;?>
            
            </div>
           </div>
        </div>
    </div>
<?php
include "blocks/footer.php";
?>