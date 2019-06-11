<?php
//подключение файла конфигурации подключения к БД
require_once 'db.php';

function datachecking($data) {          //функция обработки вводимых данных
    $data = trim($data);                //обрезаем пробелы
    $data = stripcslashes($data);       //удаляет экранирование символов
    $data = htmlspecialchars($data);    //преобразует теги
    return $data;
}

//если сущесвуют переменные POST
if (isset($_POST['username']) && isset($_POST['password'])) {

    function datachecking($data) {          //функция обработки вводимых данных
        $data = trim($data);                //обрезаем пробелы
        $data = stripcslashes($data);       //удаляет экранирование символов
        $data = htmlspecialchars($data);    //преобразует теги
        return $data;
    }

    //задаем и обрабатываем пременные
    $username = datachecking($_POST['username']);
    $email = datachecking($_POST['email']);
    $password = datachecking($_POST['password']);

    /*проверка что пользователя нет в БД*/

    //sql запрос: выбрать всех из траблицы users где username или email соответсвуют переменным
    $sql_check = 'SELECT * FROM `users` WHERE `username` = :username OR `email` = :email';

    //подгатавливаем запрос к выполнению
    $query_check = $connection->prepare($sql_check);

    //связывает параметры с переменными (string)
    $query_check->bindValue(':username', $username, PDO::PARAM_STR);
    $query_check->bindValue(':email', $email, PDO::PARAM_STR);

    //запуск запроса
    $query_check->execute();

    //если сущесвует нумерованная строка то выдается сообщение
    if ($query_check->fetch(PDO::FETCH_NUM)) 
        echo 'Такой пользователь зарегистрирован';
    else {

        /*выполняется регистрация*/

    //случайная строка для хэширования
    $salt = 'jsdfgvmnsrtioghdfv';

    //хэш пароля по md5
    $password = md5($password . $salt);

    //sql запрос: вставить в таблицу users данные в столбцы username, email, password
    $sql = 'INSERT INTO users(username, email, password) VALUES(?, ?, ?)';

    //подгатавливаем запрос к выполнению
    $query = $connection->prepare($sql);

    //запуск запроса с определением переменных
    $query->execute([$username, $email, $password]);

    //установка куки на 24 часа (лучше бы сделать на сессиях)
    setcookie("username", $username, time() + 3600 * 24, "/");
    echo "Готово";
    }

}
