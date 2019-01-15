<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    
    if(!empty($_POST))
    {
    	$output = '';
		$name2 = mysqli_real_escape_string($conn,$_POST["name"]);
		$name = 'meu nome';
		$day = "0000-00-00";
		$query = "INSERT INTO captured(pokemonid,name,day) VALUES ('25','$name','$day')";

		if(mysqli_query($conn,$query))
		{
			echo 'OK';	
		}
    }

?>
