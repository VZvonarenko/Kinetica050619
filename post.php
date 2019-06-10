<?php
//если username POST  не существует редирект на index
if (!$_COOKIE ['username'])
header("Location: /index.php");

//подключение header
require_once "blocks/header.php";
?>
<!--форма добавления нового поста-->
<div class="d-flex justify-content-center">
    <form action="add_post.php" method="post">
        <label for="title">Новый пост</label>
        <input id="title" type="text" name="title" class="form-control" autocomplete="off">
        <label for="text">Текст</label>
        <textarea name="text" id="text" cols="100" rows="3" class="form-control"></textarea>
        </br>
        <button type="submit" class="btn btn-success">Опубликовать</button>
    </form>
    </br>
</div>
<?php
//подключение файла конфигурации подключения к БД
require_once 'db.php';

//sql запрос: выбрать 5 строк в таблице post отсортировать по id в обратном порядке
$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT 5';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса
$query->execute();

//возращаем масиив значений согласно запросу
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!--    форма вывода данных из массива $posts-->
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
//подключение footer
include_once "blocks/footer.php";
?>

