<?php

	header('Access-Control-Allow-Origin: *');
	ini_set("allow_url_fopen", 1);

	$id = $_GET['id'];

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

	$json2 = file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$id.'/');
	$obj2 = json_decode($json2,true);
	$height = $obj2['height'];
	$weight = $obj2['weight'];

	$d = count($obj2['types']);

	for ($j=0; $j < $d; $j++) {
		$pokemon[0]['types'][$j] = $obj2['types'][$j]['type']['name'];
	}

	
	$pokemon[0]['description'] = $description;
	$pokemon[0]['height'] = $height;
	$pokemon[0]['weight'] = $weight;

	echo json_encode($pokemon);

?>
