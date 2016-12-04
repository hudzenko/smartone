<?php
    session_start();
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == '') {
            unset($login);
        }
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password =='') {
        unset($password);
        }
    }

    $json = array();

    if (empty($login) or empty($password)) {
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    include ("bd.php");

    $result = mysql_query("SELECT * FROM user WHERE login='$login'",$db);

    $user_row = mysql_fetch_array($result);
    if (empty($user_row['password'])) {
        $json['error'] = 'Извините, введённый вами login или пароль неверный.';
        echo json_encode($json);
        die();
    } else {

        if ($user_row['password'] == $password) {

            //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
            $_SESSION['login'] = $user_row['login'];

            $_SESSION['id'] = $user_row['id'];
            //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
            $json['error'] = 0; // oшибoк нe былo

            echo json_encode($json); // вывoдим мaссив oтвeтa
        } else {
            $json['error'] = 'Извините, введённый вами login или пароль неверный.';
            echo json_encode($json);
            die();
        }
    }

?>
