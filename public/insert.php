<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    
    if(!empty($_POST))
    {
		$name = mysqli_real_escape_string($conn,$_POST["name"]);
		$day = mysqli_real_escape_string($conn,$_POST["day"]);
		$query = "INSERT INTO captured(pokemonid,name,day) VALUES ('25','$name','$day')";

		if(!mysqli_query($conn,$query))
		{
			header("location:javascript://history.go(-1)");	
		}
    }

?>
