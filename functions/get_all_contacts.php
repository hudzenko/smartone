<?php 
	include ("functions/bd.php");
    $user_id = $_SESSION['id'];
	$result = mysql_query("SELECT id,fullname,telephone FROM contacts where user_id='$user_id'", $db);