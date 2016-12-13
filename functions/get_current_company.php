<?php 
	include ("bd.php");

	$item_query = mysql_query("SELECT com.id, com.name, com.address, com.chief, com.email, com.telephone, c.fullname as chief_name FROM company com left join contacts c on (c.id = com.chief) WHERE com.id='$current_company'",$db);

	$item_row = mysql_fetch_assoc($item_query);
	mysql_free_result($item_query);

