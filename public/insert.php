<?php

	header('Access-Control-Allow-Origin: *');
	require 'connect.php';
	ini_set("allow_url_fopen", 1);

    
    if(!empty($_POST))
    {
		$name = mysqli_real_escape_string($conn,$_POST["name"]);
		$day = mysqli_real_escape_string($conn,$_POST["day"]);

		//Convert to lowercase
		$name=strtolower($name);

	
		$url = "https://pokeapi.co/api/v2/pokemon/".$name."/";

		if($json = file_get_contents($url))
		{
			$obj = json_decode($json);
			$pokemonid = $obj->id;
		}
		else
		{
			$pokemonid = 0;
		}

		$query = "INSERT INTO captured(pokemonid,name,day) VALUES ('$pokemonid','$name','$day')";

		if(!mysqli_query($conn,$query))
			console.log("Erro Insert BD");	
		else
			console.log("Saved");
    }

?>
