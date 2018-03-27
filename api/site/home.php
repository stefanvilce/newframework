<?php

$lista = addslashes($_GET['lista']);

$sql='SELECT pagini.*, pagini_content.subtitlu, pagini_content.short_description FROM pagini, pagini_content 
						WHERE pagini.id = pagini_content.pagini_id AND pagini_content.lang="ro" AND pagini.categorie LIKE "%'.$lista.'%"';
						
						$sql2='SELECT pagini.id, pagini_content.subtitlu FROM pagini, pagini_content 
						WHERE pagini.id = pagini_content.pagini_id AND pagini_content.lang="ro" AND pagini.categorie LIKE "%'.$lista.'%"';
$rez = mysql_query($sql);
$data = array();
$status = 200;
$status_message = "jjj";

if(mysql_num_rows($rez)){
		while($q = mysql_fetch_array($rez)){

		$p1 = array();
		$p1['id'] = $q['id'];
		$p1['titlu'] 	= $q['titlu'];
		$p1['subtitlu']		= $q['subtitlu'];
		$p1['short_description']		= $q['short_description'];
		

		$data[] = $p1;
		}
		$status = 200;
		$status_message = "Good Answer";
} else {
		$status = 400;
		$status_message = "No user found";
		$data = $sql . " " . mysql_error();
}

delivery_response($status, $status_message, $data);
