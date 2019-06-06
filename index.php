<?php
        $my_blog = "My Blog";   //задал переменную - title
        require_once "blocks/header.php"        //подключил header
?>
<!--            форма авторизации-->
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Имя пользователя</label>
                    <input id="username" class="form-control" type="text" name="username" placeholder="Введите Ваше имя">
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" class="form-control"  type="password" name="password" placeholder="Пароль">
                </div>

                <button type="submit" class="btn btn-primary">Войти</button>
                <a  class="btn btn-outline-primary" href="/reg.php">Регистрация</a>
            </form>


<?php
 include_once "blocks/footer.php";
?>