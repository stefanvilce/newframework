<?php

function delivery_response($status, $status_message, $data){
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('User-Agent: Mozilla/5.0 (Linux; Android 4.2.2; Nexus 4 Build/JDQ39) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header('Content-type: application/json');	
	header("HTTP/1.1 $status $status_message");
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
}


function delivery_response_withCache($status, $status_message, $data){
	$cacheDuration = 300; // atatea secunde
	header('Cache-Control: public,max-age='.$cacheDuration.' must-revalidate');
	header('Expires: '.gmdate('D, d M Y H:i:s',($_SERVER['REQUEST_TIME']+$cacheDuration)).' GMT');
	header('Last-modified: '.gmdate('D, d M Y H:i:s',$_SERVER['REQUEST_TIME']).' GMT');
	//header('User-Agent: Mozilla/5.0 (Linux; Android 4.2.2; Nexus 4 Build/JDQ39) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19');
	//header('User-Agent: *');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header('Content-type: application/json');	
	header("HTTP/1.1 $status $status_message");
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
}