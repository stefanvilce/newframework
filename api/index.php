<?php
//acesta este doar fisierul care imi cere alte fisiere
header("Content-Type:application/json");

include "common/conectare.php";
include "common/functii.php";
include "common/clase_pagini.php";	// test; o sa o sterg de aici
define("ACCESS_TOKEN", "ACCESvrDl236kn888999uio");
define("ACCESS_TOKEN_SECRET", "");		//		Pe asta nu il folosesc, deocamdata

$t = 0;		//		aici stiu daca tokenul a fost corect sau nu
if(!isset($_GET['p'])){
	$p = 'home';
} else {
	$p = addslashes($_GET['p']);
}

if(!isset($_GET['access_token'])){
	$t = 0;
} else {
	//$token = $_GET['access_token'];
	$token = ACCESS_TOKEN;    // aici este ca sa trisez un pic atunci cand fac probe pe local.
	if($token == ACCESS_TOKEN){
		$t = 1;
		switch($p) {			case "home": 			include('site/home.php'); break;
			case "pagina": 			include('site/pagina.php'); break;
			case "newaccount": 		include('site/newaccount.php'); break; 		//		new account
			case "modphone": 		include('site/modphone.php'); break; 			//		modifica telefon
			case "modname": 		include('site/modname.php'); break; 			//		modifica numele dar nu si emailul(adica userul)
			case "modpassword": 	include('site/modpassword.php'); break; 			//		modifica parola	
			case "test": 			include('site/test.php'); break;
			//aici pun acele pagini pe care le folosesc pentru generarea continutului primei pagini a siteului
			case "site_home": 			include('site/site_home.php'); break;
			default: include('site/home.php');
			} //switch
	} else {
			$t = 0;
	}
}
	
	if($t == 0){
	// 400, bad request
	delivery_response(400, "Invalid Request", NULL);
	}

?>