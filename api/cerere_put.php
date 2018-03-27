<?php
//CERERE TIP POST
header("Content-Type:application/json");

include "common/conectare.php";
include "common/functii.php";

$curl_post_data = array(
		"email" 		=> "stefan@yahoo.com",
		"phone"			=> "0725693896"
);

$data = json_encode($curl_post_data);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://209.124.34.147/services/?p=modphone&access_token=ACCESvrDl236kn888999uio");
/*
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // note the PUT here
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
*/
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curl_post_data));

$result = curl_exec($ch);

//echo "<pre>";
print_r($result);
curl_close($ch);