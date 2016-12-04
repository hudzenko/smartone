<?php
    if (isset($_POST['login'])) {
        $login = $_POST['login'];

        if ($login == '') {
            unset($login);
        }

    } 
    //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) {

        $password = $_POST['password'];

        if ($password =='') {
            unset($password);
        }

    }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    $json = array();

    if (empty($login) or empty($password)) {
        //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);

    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    
    // подключаемся к базе
    include ("bd.php");

    // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM user WHERE login='$login'", $db);

    $myrow = mysql_fetch_array($result);

    if (!empty($myrow['id'])) {
        $json['error'] = 'Извините, введённый вами логин уже зарегистрирован. Введите другой логин.';
        echo json_encode($json);
        die();
    }

    // если такого нет, то сохраняем данные
    $new_user = mysql_query("INSERT INTO user (login,password) VALUES('$login','$password')");
    // Проверяем, есть ли ошибки
    if ($new_user == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Ошибка! Вы не зарегистрированы.';
        echo json_encode($json);
        die();
    }

?>