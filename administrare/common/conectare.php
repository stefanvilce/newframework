<?php
session_start();


if(!isset($_SESSION['cur_lang'])){
  $_SESSION['cur_lang']='ro';
}
$_SESSION['lang'] = $_SESSION['cur_lang'];

$sursa_r='/';

GLOBAL $lnk;
$lnk = "/index.php"; //acesta este linkul global... il folosesc la construirea linkurilor din meniu

//conexiunea cu PDO
class Conexiune{
  
    var $db;
    var $user="root";
    var $password="";
    var $database="primar";
    var $host="localhost";
    
    function __construct(){
	$this->db = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", $this->user, $this->password);
	$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function redaConexiune(){
        return $this->db;
    }
    
    function closeDB(){
	$this->db = null; //close the connection with DB
    }
  
}

$conexiune = new Conexiune();
//GLOBAL $con;
$con = $conexiune->redaConexiune();

?>