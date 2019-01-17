<?php

	header('Access-Control-Allow-Origin: *');
	ini_set("allow_url_fopen", 1);

	$id = $_GET['id'];
	$pokemon = [];

	//JSON 1
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

	//JSON 2
	$json2 = file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$id.'/');
	$obj2 = json_decode($json2,true);
	$height = $obj2['height'];
	$weight = $obj2['weight'];
	$name = $obj2['name'];

	$d = count($obj2['types']);
	$pokemon[0]['types'][0]['count'] = $d; //number of pokemons type
	for ($j=0; $j < $d; $j++) {
		$pokemon[0]['types'][$j+1]['name'] = $obj2['types'][$j]['type']['name'];
	}

	$f = count($obj2['moves']);
	$pokemon[0]['moves'][0]['count'] = $f; //number of pokemons moves
	for ($k=0; $k < $f; $k++) {
		$pokemon[0]['moves'][$k+1]['name'] = $obj2['moves'][$k]['move']['name'];
	}

	$pokemon[0]['speed'] = $obj2['stats'][0]['base_stat'];
	$pokemon[0]['spdefense'] = $obj2['stats'][1]['base_stat'];
	$pokemon[0]['spattack'] = $obj2['stats'][2]['base_stat'];
	$pokemon[0]['defense'] = $obj2['stats'][3]['base_stat'];
	$pokemon[0]['attack'] = $obj2['stats'][4]['base_stat'];
	$pokemon[0]['hp'] = $obj2['stats'][5]['base_stat'];
	$pokemon[0]['description'] = $description;
	$pokemon[0]['height'] = $height;
	$pokemon[0]['weight'] = $weight;
	$pokemon[0]['name'] = $name;

	echo json_encode($pokemon);

?>
