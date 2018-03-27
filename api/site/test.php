<?php
$test 	= addslashes($_POST['test']);
$masina 	= addslashes($_POST['masina']);

$p1 = array();
$p1['t'] = $test;
$p1['m'] = $masina;
$p1['x'] = "OKiiiiiiii...";

$data = $p1;

/*
echo "<pre>";
print_r($q);
echo "</pre>";
*/
delivery_response($status, $status_message, $data);