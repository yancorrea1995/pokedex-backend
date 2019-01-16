<?php

	header('Access-Control-Allow-Origin: *');
	require 'connect.php';
	ini_set("allow_url_fopen", 1);

	$json = file_get_contents('https://pokeapi.co/api/v2/pokemon/25/');
	$obj = json_decode($json);
	echo $obj->moves;

?>
