<?php

    session_start();

    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        if ($name == '') {
            unset($name);
        }

    } 
    
    if (isset($_POST['type'])) {

        $type = $_POST['type'];

        if ($type =='') {
            unset($type);
        }
    }
    if (isset($_POST['date'])) {

        $date = $_POST['date'];

        if ($date =='') {
            unset($date);
        }
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        $description = '';
    }

    
    
    
    $json = array();

    if (empty($name) or empty($type) or empty($date)) {
        
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }
    $name = stripslashes($name);
    $name = htmlspecialchars($name);

    $description = htmlspecialchars($description);


    
    // подключаемся к базе
    include ("bd.php");

    $user_id = $_SESSION['id'];

    $new_event = mysql_query("INSERT INTO event (type,date,name,description,user_id) VALUES('$type','$date','$name','$description','$user_id')");
    if ($new_event == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Ошибка!';
        echo json_encode($json);
        die();
    }

?>