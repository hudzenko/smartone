<?php 
	include ("functions/bd.php");
	$result = mysql_query("SELECT id,fullname,telephone FROM contacts", $db);