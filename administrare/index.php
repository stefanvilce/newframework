<?php

/**********************************************
 *	Configuratii
 **********************************************/
if(!defined('ROOT')){
	define('ROOT',dirname(dirname(dirname(__FILE__))));
}
if(!defined('APP_ROOT')){
	define('APP_ROOT',basename(dirname(dirname(__FILE__))));
}
if(!defined('VIEW')){
	define('VIEW',"site/view");
}
if(!defined('MODEL')){
	define('MODEL',"site/model");
}
if(!defined('CONTROLLER')){
	define('CONTROLLER',"site/controller");
}
if(!defined('DS')){
	define('DS',"/");
}
if(!defined('TEMPLATE')){
	define('TEMPLATE',"site/view/templates/");
}



/***********************************************
 *	Site-ul propriu-zis
 ***********************************************/
ob_start();

	if(isset($_GET['p'])) {
		$p = stripslashes($_GET['p']);
	} else {
		$p = 'home';
	}
	
	if($p == "home"){
		include('templates/template.php');
	} elseif($p == "ajax") {
		include('templates/template03.php');	//	asta este butonul cu ajax... nu are cp inceput si cap sfarsit
	} else {
		include('templates/template.php');
	}
	
ob_end_flush();

//inchid conexiunea PDO cu baza de date
//$db = null;
$conexiune->closeDB();		//inchid conexiunea cu baza de date

?>