<?php
//session_start();              //если бы было на сессиях
//session_destroy();            //если бы было на сессиях
setcookie('username' , $username, time()-3600*24, "/"); //анулирование cookie gentv отрицательного задания времени

//редирект
header("Location: /index.php");
exit();