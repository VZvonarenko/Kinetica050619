<?php
require_once "blocks/header.php";
require_once 'db.php';

//добавить пагинацию!!! выводить только по 5-10 постов

$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT 7';
$query = $connection->query($sql);
while ($post = $query->fetch(PDO::FETCH_OBJ)) {?>

    <div class="container ">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="img/DSC03360.jpg" alt="Изображение">
                <h2 class="card-title"><?=$post->title?></h2>
                <p class="card-text"><?=$post->text?></p>
                <h6 class="card-subtitle">Автор поста: <?=$post->author?></h6>
                <a class="card-link" href=/comment.php?id=<?=$post->id?>>Читать комментарии</a>
            </div>
        </div>
    </div>
<?php
}

include_once "blocks/footer.php";
?>