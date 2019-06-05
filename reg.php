<?php
$my_blog = "My Blog";
require_once "blocks/header.php"

?>
<!--        форма регистрации-->
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input id="username" class="form-control" type="text" name="username" placeholder="Введите Ваше имя">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Введите Ваш email">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input id="password" class="form-control"  type="password" name="password" placeholder="Пароль">
            </div>
            <div class="form-group">
                <label for="password2">Еще раз пароль</label>
                <input id="password2" class="form-control"  type="password" name="password2" placeholder="Повторите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
            <a href="index.php">На главную</a>
        </form>


<?php
include_once "blocks/footer.php";
?>