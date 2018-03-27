<?php

$us 	= addslashes($_GET['us']);
$psw 	= addslashes($_GET['psw']);

$rez = mysql_query('SELECT * FROM users_pop WHERE `user`="'.$us.'" AND `passwrd`="'.$psw.'"');
if(mysql_num_rows($rez)){
		$q = mysql_fetch_array($rez);

		$p1 = array();
		$p1['username'] = $q['user'];
		$p1['phone'] 	= $q['phone'];
		$p1['name']		= $q['name'];

		$data = $p1;

		$status = 200;
		$status_message = "Good Question";
} else {
		$status = 400;
		$status_message = "No user found";
		$data = NULL;
}
/*
echo "<pre>";
print_r($q);
echo "</pre>";
*/
delivery_response($status, $status_message, $data);

