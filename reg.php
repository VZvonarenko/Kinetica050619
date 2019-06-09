<?php
require_once "blocks/header.php";
?>
    <div class="d-flex justify-content-center">
        <form action="add_user.php" method="POST">
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input id="username" class="form-control" type="text" name="username" placeholder="Введите Ваше имя" autocomplete="off" minlength="3"
                       maxlength="25">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Введите Ваш email" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input id="password" class="form-control"  type="password" name="password" placeholder="Пароль" autocomplete="off" minlength="6"
                       maxlength="25">
            </div>
            <div class="alert alert-danger" id="statusinfo"></div>
            <button type="button" id="reg" class="btn btn-success">Регистрация</button>
            <a class="btn btn-success" href="index.php">На главную</a>
        </form>
    </div>

<?php
include_once "blocks/footer.php";
?>
