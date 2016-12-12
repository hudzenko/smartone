<?php
	include ("bd.php");
    $user_id = $_SESSION['id'];
    $result = mysql_query("SELECT e.id, e.name, e.type, e.date, e.description, et.name as type_name FROM event e left join event_type et on (e.type = et.id) where e.user_id='$user_id'", $db);