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
	$obj = json_decode($json,true);


	$c = count($obj['flavor_text_entries']);
	$languageIndex = 0;

	//search for english description
	for ($i=0; $i < $c; $i++) { 
		if($obj['flavor_text_entries'][$i]['language']['name'] == 'en')
		{
			$languageIndex = $i;
			$i = $c; //to exit for
		}
	}

	
	$description = $obj['flavor_text_entries'][$languageIndex]['flavor_text'];
	$pokemon[0]['description'] = $description;
	//$pokemon[0]['nome']='Teste';

	echo json_encode($pokemon);

?>
