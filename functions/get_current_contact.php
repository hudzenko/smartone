<?php 
	include ("bd.php");

	$item_query = mysql_query("SELECT c.id, c.fullname, c.telephone, c.email, c.birthday,c.company, com.name as company_name FROM contacts c left join company com on (c.company = com.id) WHERE c.id='$current_contact'",$db);

	$item_row = mysql_fetch_assoc($item_query);
	mysql_free_result($item_query);

