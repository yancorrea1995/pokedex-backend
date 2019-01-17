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

		if($move0 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move0')";
			mysqli_query($conn,$query2);
		}
		if($move1 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move1')";
			mysqli_query($conn,$query2);
		}
		if($move2 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move2')";
			mysqli_query($conn,$query2);
		}
		if($move3 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move3')";
			mysqli_query($conn,$query2);
		}
		if($move4 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move4')";
			mysqli_query($conn,$query2);
		}
		if($move5 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move5')";
			mysqli_query($conn,$query2);
		}
		if($move6 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move6')";
			mysqli_query($conn,$query2);
		}
		if($move7 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move7')";
			mysqli_query($conn,$query2);
		}
		if($move8 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move8')";
			mysqli_query($conn,$query2);
		}
		if($move9 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move9')";
			mysqli_query($conn,$query2);
		}
		if($move10 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move10')";
			mysqli_query($conn,$query2);
		}
		if($move11 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move11')";
			mysqli_query($conn,$query2);
		}
		if($move12 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move12')";
			mysqli_query($conn,$query2);
		}
		if($move13 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move13')";
			mysqli_query($conn,$query2);
		}
		if($move14 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move14')";
			mysqli_query($conn,$query2);
		}
		if($move15 != '')
		{
			$query2 = "INSERT INTO moves(capturedid,move) VALUES ('$lastID','$move15')";
			mysqli_query($conn,$query2);
		}
    }

?>
