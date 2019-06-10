<?php
//подключение header
require_once "blocks/header.php";
?>
<!--создание контейнера bootstrap -->
<div class="container">
<!--    форма добавлен я комментариев и обработчки вводимых данных-->
    <form action="/add_comment.php?id=<?= $_GET['id'] ?>" method="post">
        <p> </p>
        <!-- метка связи с полем-->
       <label for="mess">Добавить комментарий</label>
<!--        поле формата textarea-->
        <textarea name="mess" id="mess" cols="10" rows="5" class="form-control" required></textarea>
        <p></p>
<!--        кнопка отправки данных-->
        <button type="submit" class="btn btn-success">Опубликовать</button>
<!--        ссылка стилизированныя под кнопку -->
        <a href="post.php" class="btn btn-success">К постам</a>
    </form>
        <p></p>

</div>
