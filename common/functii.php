<?php

/**********************************************************************************
 * 
 * 		FUNCTII utile
 * 
 * 
 ************************************************************************************/


function filtreaza($text) {
    $data = trim(htmlentities(strip_tags($text)));
    if (get_magic_quotes_gpc())
    $data = stripslashes($text);
    $data = mysql_real_escape_string($text);
    return $text;
}


function clean($theValue, $theType,$quote=true, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      if($quote) $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	  $theValue=strip_tags($theValue);
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}


function trans($key) 
{
	//echo $_SESSION[cur_lang];
	$_SESSION['cur_lang'] = $_SESSION['lang'];
	if($key=="")
	if(!isset($_SESSION['cur_lang'])) $_SESSION['cur_lang']='ro';
	//$t = mysql_query("SELECT * FROM dictionar WHERE cheie=".clean(str_replace("'","\'",$key),"text")." AND lang='".$_SESSION['cur_lang']."'");
	//$j = @mysql_num_rows($t);
	
	
	//$db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexiune = new Conexiune();
	$c = $conexiune->redaConexiune();
	
	$query1 = 'SELECT * FROM `dictionar` WHERE `cheie` = ' .clean(str_replace("'","\'",$key),"text").' AND `lang` = "'.$_SESSION['cur_lang'].'"';
	//echo $query1;
	$stmt = $c->query($query1);
	$j = $stmt->rowCount();	
	
	if($j == 0) {
		return "_".$key;} /* aici era cu k_*/
	else {
		$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($r);
		return $r[0]["cuvant"];
		
	}
	$conexiune->closeDB();		// inchid conexiunea cu baza de date
	
}



function get_file_extension($filename) {
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	
	return $exts;
}

function validate_email($string) {
	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$", $string)) {
		return true;
	} else {
    	return false;
	}
}


function xss_clean($data)
{
	$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
	
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
	
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
	
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
	
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
	
	do
	{
		$old_data = $data;
		$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	}
	while ($old_data !== $data);
	
	return $data;
}



function vilcemail($numele, $email_from, $email_to, $subject="Mesaj nou", $mesaj="Mesaj gol"){
        	if($numele == "") $numele = $email_from; //daca nu este completat numele, inlocuiesc cu adresa de e-mail
                $headers = 'MIME-Version: 1.0'."\n";	
                $headers .= 'Content-type: text/html; charset=utf-8'."\n";	
                $headers .= 'From: '.$numele.' <'.$email_from.'>'."\n";
                
                $a = @mail($email_to, $subject, $mesaj, $headers);
                if($a){
                    return true;
                } else {
                    return false; //astea ca sa vad daca s-a trimis sau nu mesajul.
                }
} //function vilcemail()


?>