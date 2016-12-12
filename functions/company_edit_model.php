<?php


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

    if (isset($_POST['item_id'])){
        $item_id = $_POST['item_id'];
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

    
    if (empty($name)) {
        
        $json['error'] = 'Ви заповнили не всі поля, обманути вирішили? =)';
        echo json_encode($json);
        die();
    }

    $name = stripslashes($name);
    $name = htmlspecialchars($name);



    
    // подключаемся к базе
    include ("bd.php");



    if($chief){
        $edited_company = mysql_query("UPDATE company SET name='$name',address='$address',chief='$chief',telephone='$telephone',email='$email' WHERE id='$item_id'");
     } else {
        $edited_company = mysql_query("UPDATE company SET name='$name',address='$address',telephone='$telephone',email='$email' WHERE id='$item_id'");
     }


    if ($edited_company == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

?>