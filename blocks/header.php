<!doctype html>
<html lang="en">
<head>
    <!-- установка кодировки сайта -->
    <meta charset="utf-8">
    <!--  мета тег для мобильных утсройств, 100% ширина, !!!!,   -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script_add_post.js"></script>
    <script type="text/javascript" src="js/script_login.js"></script>
    <script type="text/javascript" src="js/script_reg.js"></script>
    <script type="text/javascript" src="js/script_comment.js"></script>

    <title>My Blog</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="index.php">MyBlog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse .justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная страница<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if ($_COOKIE['username'] == ''):
            ?>
                <li class='nav-item'>
                    <a class='nav-link' href='login.php'>Вход</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='reg.php'>Регистрация</a>
                </li>

            <?php else: ?>
                <li class='nav-item'>
                    <a class='nav-link' href='post.php'>Посты</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Выход(<?=$_COOKIE['username']?>)</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>




