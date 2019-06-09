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
    </form>
    </br>
</div>
<?php
require_once 'db.php';

$sql = 'SELECT * FROM `post` ORDER BY `id` DESC LIMIT 5';
$query = $connection->prepare($sql);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container ">
        <div class="card">
            <div class="card-body" id="posts">
                <?php foreach ($posts as $onepost): ?>
                <h2 class='card-title'><?=$onepost['title']?></h2>
                <p class='card-text'><?=$onepost['text']?></p>
                <h6 class='card-subtitle'>Автор поста: <em><?=$onepost['author']?></em></h5>
                <a class='card-link' href=/comment.php?id=<?=$onepost['id']?>>Читать комментарии</a>
                <hr align='center' width="90%" size="50" color="#dddddd" />
                <?php endforeach;?>
            </div>
           </div>
        </div>
    </div>


include_once "blocks/footer.php";
?>

