<?php


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

    if (isset($_POST['item_id'])){
        $item_id = $_POST['item_id'];
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

    
    if (empty($fullname) or empty($telephone)) {
        
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }

    $fullname = stripslashes($fullname);
    $fullname = htmlspecialchars($fullname);



    
    // подключаемся к базе
    include ("bd.php");

    $edited_contact = mysql_query("UPDATE contacts SET type='$type',date='$date',name='$name',description='$description' WHERE id='$item_id'");

    if($company){
        $edited_contact = mysql_query("UPDATE contacts SET fullname='$fullname',birthday='$birthday',company='$company',telephone='$telephone',email='$email' WHERE id='$item_id'");
     } else {
        $edited_contact = mysql_query("UPDATE contacts SET fullname='$fullname',birthday='$birthday',telephone='$telephone',email='$email' WHERE id='$item_id'");
     }


    if ($edited_contact == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

?>