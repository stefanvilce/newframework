<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=primar;charset=utf8mb4', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


$sursa_r='/';

GLOBAL $lnk;
$lnk = "/index.php";    //acesta este linkul global... il folosesc la construirea linkurilor din meniu

?>