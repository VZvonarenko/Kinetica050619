<?php
//session_start();
//session_destroy();
setcookie('username' , $username, time()-3600*24, "/");
header("Location: /index.php");
exit();