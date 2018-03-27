<?php
//CERERE TIP POST
header("Content-Type:application/json");

include "common/conectare.php";
include "common/functii.php";

$curl_post_data = array(
		"email" 		=> "stefan@yahoo.com",
		"password" 		=> "OKiDoki",
		"name"			=> "Popescu Ilie",
		"phone"			=> "0040725693896"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://209.124.34.147/services/?p=newaccount&access_token=ACCESvrDl236kn888999uio");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
$result = curl_exec($ch);


print_r($result);
curl_close($ch);