<?php
//подключение header
require_once "blocks/header.php";

//подключение файла конфигурации подключения к БД
require_once 'db.php';

//sql запрос: выбрать все значения в post где id = $id
$sql = 'SELECT * FROM `post` WHERE `id` = :id';
//переменная id берется get запроса
$id = $_GET['id'];

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса с определением переменных
$query->execute(['id' => $id]);

//возращаем объект значений согласно запросу
$post = $query->fetch(PDO::FETCH_OBJ);
?>
<!--форма вывода данных из объекта -->
    <div class="container">
        <div class="card">
               <h1>Заголовок: <?= $post->title ?></h1>
               <em>"<?= $post->text ?>"</em>
               <div class="alert alert-info" id="statusinfo"></div>
        </div>
    </div>

<?php
/*Запрос комментарий*/

//sql запрос: выбрать все значения в comments где id = $id
$sql = 'SELECT * FROM `comments`  WHERE `post_id` = :id';

//подгатавливаем запрос к выполнению
$query = $connection->prepare($sql);

//запуск запроса с определением переменных
$query->execute(['id' => $id]);

//возращаем объект значений согласно запросу
$comments = $query->fetchAll(PDO::FETCH_OBJ);

  foreach ($comments as $comment): ?>
      <!--форма вывода данных из объекта -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Автор: <?=$comment->author?></h5>
                <p class="card-text">Текст комментария: "<?=$comment->text?>"</p>
            </div>
        </div>
    </div>
     <?php endforeach; ?>  
<?php
//если username $_COOKIE  не существует то ридирект
if(isset($_COOKIE['username'])) {
    require_once 'blocks/form_comment.php';
}

include_once "blocks/footer.php";
?>









