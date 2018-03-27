<?php
/****************************************************************************

		This script change Phone in DB

*****************************************************************************/

//initializare date 
$status = 201;
$status_message = "OK";
$data = array();

parse_str(file_get_contents("php://input"),$post_vars);

$data_primite = $post_vars;
$email = addslashes($data_primite['email']);
$name = addslashes($data_primite['name']);

$sql = 'UPDATE `users_pop` SET `name`="'.$name.'" WHERE `user` LIKE "'.$email.'" LIMIT 1'; 	// ca sa nu afecteze mai multe randuri din baza de date o eventuala greseala sau injectie
$rez = mysql_query($sql);

if(strlen(mysql_error())>4){
		$status=400;
		$status_message = "The data weren't saved";
		$data['message'] = mysql_error();
		$data['sqlul'] = $sql;
}  else {
		$status = 201;
		$status_message = "The data have been changed";
		$data['user'] = $data_primite['email'];
		$data['name'] = $data_primite['name'];
}

delivery_response($status, $status_message, $data);