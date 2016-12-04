<?php

    if (isset($_POST['itemId'])) {
        $item_id = $_POST['itemId'];
        if ($item_id == '') {
            unset($item_id);
        }
    } 
    

    if (empty($item_id)) {
        
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

    include ("bd.php");

    $delete = mysql_query("DELETE FROM contacts where id='$item_id'");

    if ($delete == 'TRUE')
    {
        $json['error'] = 0;

        echo json_encode($json);
    } else {
        $json['error'] = 'Упс, щось пішло не так';
        echo json_encode($json);
        die();
    }

?>