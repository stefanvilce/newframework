<?php
/****************************************************************************

		This script create new account in DB

*****************************************************************************/
$email 		= addslashes($_POST['email']);
$password 	= addslashes($_POST['password']);
$name		= addslashes($_POST['name']);
$phone		= addslashes($_POST['phone']);

//initializare date 
$status = 201;
$status_message = "OK";
$data = array('email'=>$email, 'password'=>$password, 'name'=>$name, 'phone'=>$phone);


//verificari
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$status = 400;
	$status_message = "The email is not correct.";
	$data = NULL;
	//delivery_response($status, $status_message, $data);
} else {	// daca mailul este corect, verific daca mai exista in baza de date
	$sql = 'SELECT * FROM users_pop WHERE user = "'.$email.'"';
	$rez = mysql_query($sql);
	if(mysql_num_rows($rez) > 0){
		$status = 400;
		$status_message = "This email exists already in our database";
		$data = NULL;
	} else {
		if(strlen($password) < 7){
			$status = 400;
			$status_message = "The password is too short. You should have minimum 6 chars.";
			$data = NULL;
		} else {
			$sql = 'INSERT INTO `users_pop`(`user`, `passwrd`, `name`, `phone`, `active`) VALUES("'.$email.'", "'.$password.'", "'.$name.'", "'.$phone.'", "1")';
			$rez = mysql_query($sql);
			if($rez){
				$status = 201;
				$status_message = "The data have been saved.";				
			}
		}
	}
}


/*
echo "<pre>";
print_r($q);
echo "</pre>";
*/
delivery_response($status, $status_message, $data);