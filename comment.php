<?php
require_once "blocks/header.php";
require_once 'db.php';

$sql = 'SELECT * FROM `post` WHERE `id` = :id';
$id = $_GET['id'];
$query = $connection->prepare($sql);
$query->execute(['id' => $id]);
$post = $query->fetch(PDO::FETCH_OBJ);
?>
    <div class="container">
        <div class="card">
               <img class="card-img-top" src="img/DSC03360.jpg" alt="Изображение">
               <h1>Заголовок: <?= $post->title ?></h1>
               <em>"<?= $post->text ?>"</em>
        </div>
    </div>

<?php
/*Запрос комментарий*/
$sql = 'SELECT * FROM `comments`  WHERE `post_id` = :id';
$query = $connection->prepare($sql);
$query->execute(['id' => $id]);
$comments = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($comments as $comment) {
    ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Автор: <?=$comment->author?></h5>
                <p class="card-text">Текст комментария: "<?=$comment->text?>"</p>
            </div>
        </div>
    </div>
<?php
}
if(isset($_COOKIE['username'])) {
    require_once 'blocks/form_comment.php';
}
include_once "blocks/footer.php";
?>









