<?php 
	include ("bd.php");

	$query = mysql_query("SELECT id, fullname FROM contacts WHERE company='$current_company'",$db);


