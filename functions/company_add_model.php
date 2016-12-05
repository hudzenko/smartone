<?php

    session_start();

    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        if ($name == '') {
            unset($name);
        }

    } 
    
    if (isset($_POST['telephone'])) {
        $telephone = $_POST['telephone'];
    } else{
        $telephone = '';
    }

    if (isset($_POST['address'])) {

        $address = $_POST['address'];
        
    } else {
        $address = '';

    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = '';
    }

    if (isset($_POST['chief']) && $_POST['chief'] != 0) {
        $chief = $_POST['chief'];
    } else {
        $chief = '';
    }

    
    
    
    $json = array();

    if (empty($name)) {
        
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }

    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    
    
    
    // подключаемся к базе
    include ("bd.php");

    $user_id = $_SESSION['id'];

    if($chief){
        $new_company = mysql_query("INSERT INTO company (name,address,chief,telephone,email,user_id) VALUES('$name','$address','$chief','$telephone','$email','$user_id')");
     } else {
        $new_company = mysql_query("INSERT INTO company (name,address,telephone,email,user_id) VALUES('$name','$address','$telephone','$email','$user_id')");
     }
   

    if ($new_company == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так!';
        echo json_encode($json);
        die();
    }

?>