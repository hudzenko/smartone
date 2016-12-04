<?php

    session_start();

    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];

        if ($fullname == '') {
            unset($fullname);
        }

    } 
    
    if (isset($_POST['telephone'])) {

        $telephone = $_POST['telephone'];

        if ($telephone =='') {
            unset($telephone);
        }
    }

    if (isset($_POST['birthday'])) {

        $birthday = $_POST['birthday'];
        
    } else {
        $birthday = '';

    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = '';
    }

    if (isset($_POST['company']) && $_POST['company'] != 0) {
        $company = $_POST['company'];
    } else {
        $company = '';
    }

    
    
    
    $json = array();

    if (empty($fullname) or empty($telephone)) {
        
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }

    $fullname = stripslashes($fullname);
    $fullname = htmlspecialchars($fullname);
    
    
    
    // подключаемся к базе
    include ("bd.php");

    $user_id = $_SESSION['id'];

    if($company){
        $new_contact = mysql_query("INSERT INTO contacts (fullname,birthday,company,telephone,email,user_id) VALUES('$fullname','$birthday','$company','$telephone','$email','$user_id')");
     } else {
        $new_contact = mysql_query("INSERT INTO contacts (fullname,birthday,telephone,email,user_id) VALUES('$fullname','$birthday','$telephone','$email','$user_id')");
     }
   

    if ($new_contact == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так!';
        echo json_encode($json);
        die();
    }

?>