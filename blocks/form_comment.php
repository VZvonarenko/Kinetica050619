<?php
require_once "blocks/header.php";
?>
<div class="container">

    <form action="/add_comment.php?id=<?= $_GET['id'] ?>" method="post">
        <p> </p>
        <label for="mess">Добавить комментарий</label>
        <textarea name="mess" id="mess" cols="10" rows="5" class="form-control" required></textarea>
        <p></p>
        <button type="submit" class="btn btn-success">Опубликовать</button>
        <a href="post.php" class="btn btn-success">К постам</a>
    </form>
        <p></p>

</div>
