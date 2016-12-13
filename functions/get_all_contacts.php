<?php 
	include ("functions/bd.php");
    $user_id = $_SESSION['id'];
	$result = mysql_query("SELECT c.id,c.fullname,c.telephone,month(c.birthday) as birthday_month, com.name as company_name FROM contacts c left join company com on (c.company = com.id) where c.user_id='$user_id'", $db);