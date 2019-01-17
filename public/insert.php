<?php

	header('Access-Control-Allow-Origin: *');
	require 'connect.php';
	ini_set("allow_url_fopen", 1);

    
    if(!empty($_POST))
    {
		$name = mysqli_real_escape_string($conn,$_POST["name"]);
		$day = mysqli_real_escape_string($conn,$_POST["day"]);
		$move0 = mysqli_real_escape_string($conn,$_POST['move0']);
		$move1 = mysqli_real_escape_string($conn,$_POST['move1']);
		$move2 = mysqli_real_escape_string($conn,$_POST['move2']);
		$move3 = mysqli_real_escape_string($conn,$_POST['move3']);
		$move4 = mysqli_real_escape_string($conn,$_POST['move4']);
		$move5 = mysqli_real_escape_string($conn,$_POST['move5']);
		$move6 = mysqli_real_escape_string($conn,$_POST['move6']);
		$move7 = mysqli_real_escape_string($conn,$_POST['move7']);
		$move8 = mysqli_real_escape_string($conn,$_POST['move8']);
		$move9 = mysqli_real_escape_string($conn,$_POST['move9']);
		$move10 = mysqli_real_escape_string($conn,$_POST['move10']);
		$move11 = mysqli_real_escape_string($conn,$_POST['move11']);
		$move12 = mysqli_real_escape_string($conn,$_POST['move12']);
		$move13 = mysqli_real_escape_string($conn,$_POST['move13']);
		$move14 = mysqli_real_escape_string($conn,$_POST['move14']);
		$move15 = mysqli_real_escape_string($conn,$_POST['move15']);


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


		//get last id
		$sql = "SELECT id FROM captured ORDER BY id DESC LIMIT 1";
		$lastID = 0;
		if($result = mysqli_query($conn,$sql))
		{
		  while($row = mysqli_fetch_assoc($result))
		  {
		  	$lastID = $row['id'];
		  }
		}

		for ($i=0; $i < 16 ; $i++) {
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move.$i')";

			if(!mysqli_query($conn,$query2))
				console.log("Erro Insert BD");	
			else
				console.log("Saved");
		}
    }

?>
