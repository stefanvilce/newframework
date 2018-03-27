<?php

$pagini_id = (integer)$_GET['pagini_id'];
//$rez = mysql_query('SELECT * FROM pagini_content WHERE `pagini_id`='.$pagini_id.' AND `lang`="ro"');

$rez = getPagina($db, $pagini_id);
//print_r($rez);
//echo "<hr /> <Br /> ... ";
if($rez != NULL){
		$q = $rez;
		$p1 = array();
		$p1['titlu'] = $q['titlu'];
		$p1['subtitlu'] 	= $q['subtitlu'];
		$p1['short_description']		= $q['short_description'];
		$p1['content']		= $q['content'];
		$data = $p1;

		$status = 200;
		$status_message = "Am gasit pagina";
} else {
		$status = 400;
		$status_message = "No page found";
		$data = NULL;
}

function getPagina($db, $pagini_id) {
   $qry = 'SELECT * FROM pagini_content WHERE `pagini_id`='.$pagini_id.' AND `lang`="ro"';
   $stmt = $db->query($qry);
   //return $qry;
   return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
}


delivery_response($status, $status_message, $data);