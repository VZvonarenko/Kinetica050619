<?php
if (!$_COOKIE ['username'])
header("Location: /index.php");
require_once "blocks/header.php";
?>
<div class="d-flex justify-content-center">
    <form action="add_post.php" method="post">
        <label for="title">Новый пост</label>
        <input id="title" type="text" name="title" class="form-control" autocomplete="off">
        <label for="text">Текст</label>
        <textarea name="text" id="text" cols="100" rows="3" class="form-control"></textarea>
        </br>
        <button type="submit" class="btn btn-success">Опубликовать</button>
        <a href="post.php" class="btn btn-success">К постам</a>
    </form>
    </br>
</div>
<?php
require_once 'db.php';

$count = 'SELECT COUNT * FROM table';

//добавить бы пагинацию!!!
$sql = 'SELECT * FROM `post` ORDER BY `id` DESC';
$query = $connection->query($sql);
while ($post = $query->fetch(PDO::FETCH_OBJ)) {
    ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="img/DSC03360.jpg" alt="Изображение">
                <h5 class="card-title">Автор: <?=$post->title?></h5>
                <p class="card-text">Пост: <?=$post->text?></p>
                <a href=/comment.php?id=<?=$post->id?>>Комментарии</a>
            </div>
        </div>
    </div>
<?php
}


include_once "blocks/footer.php";
?>

