<?
	include ("functions/bd.php");
	$user_id = $_SESSION['id'];
    $companiesQuery = mysql_query("SELECT id,name FROM company where user_id='$user_id'", $db);