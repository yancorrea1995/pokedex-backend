<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    
    if(!empty($_POST))
    {
		//Load vars
		$name = mysqli_real_escape_string($conn,$_POST["name"]);
		$day = mysqli_real_escape_string($conn,$_POST["day"]);


		//String To Lower
		$name = strtolower($name);

		//Get pokemon id
		$json = file_get_contents("https://pokeapi.co/api/v2/pokemon/'$name'/");
		$obj = json_decode($json);
		$pokemonid = $obj->id;




		$query = "INSERT INTO captured(pokemonid,name,day) VALUES ('$pokemonid','$name','$day')";

		if(!mysqli_query($conn,$query))
		{
			die('BD Insert Error');	
		}
    }

?>
