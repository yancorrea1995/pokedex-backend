<?php

	header('Access-Control-Allow-Origin: *');
	ini_set("allow_url_fopen", 1);

	$id = $_GET['id'];

	//$json = file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$id.'/');
	//$obj = json_decode($json);	
	//$name = $obj->moves[0]->move->name;
	//echo count($obj->moves);
	//echo $name;

	$pokemon = [];

	$json = file_get_contents('https://pokeapi.co/api/v2/pokemon-species/'.$id.'/');
	$obj = json_decode($json);
	
	$description = $obj->flavor_text_entries[2]->flavor_text;
	$pokemon[0]['description'] = $description;
	$pokemon[0]['nome']='Teste';

	echo json_encode($pokemon);

?>
