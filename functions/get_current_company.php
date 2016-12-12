<?php 
	include ("bd.php");

	$item_query = mysql_query("SELECT * FROM company WHERE id='$current_company'",$db);

	$item_row = mysql_fetch_assoc($item_query);
	mysql_free_result($item_query);

