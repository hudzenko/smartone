<?
	include ("functions/bd.php");
	$user_id = $_SESSION['id'];
    $result = mysql_query("SELECT id,name,address FROM company where user_id='$user_id'", $db);