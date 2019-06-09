<?php
require_once "blocks/header.php";
?>
<div class="d-flex justify-content-center">
<form action="authentication.php" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input id="username" class="form-control" type="text" name="username" placeholder="Введите Ваше имя" required autocomplete="off" minlength="6"
               maxlength="25">
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input id="password" class="form-control"  type="password" name="password" placeholder="Пароль" required autocomplete="off">
    </div>
    <div class="alert alert-danger" id="statusinfo"></div>
    <button type="button" id="login" class="btn btn-success">Войти</button>
    <a  class="btn btn-outline-success" id="reg" href="/reg.php">Регистрация</a>
</form>
</div>

<?php
include_once "blocks/footer.php";
?>





