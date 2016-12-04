<?php


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

    if (isset($_POST['item_id'])){
        $item_id = $_POST['item_id'];
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

    
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

    // если такого нет, то сохраняем данные
    $edited_event = mysql_query("UPDATE event SET type='$type',date='$date',name='$name',description='$description' WHERE id='$item_id'");


    if ($edited_event == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

?>