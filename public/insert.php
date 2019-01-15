<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    

if(!empty($_POST))
{
	$output = '';
	$name = mysqli_real_escape_string($conn,$_POST["name"]);
	$day = mysqli_real_escape_string($conn,$_POST["day"]);

	$query = "INSERT INTO captured(idpokemon,day) VALUES ('$name','$day')";

	if (mysqli_query($conn,$query))
	{
		echo 'add ok';
	}
}


$pokemon = [];
$sql = "SELECT idpokemon, day FROM captured";

if($result = mysqli_query($conn,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $pokemon[$cr]['idpokemon']    = $row['idpokemon'];
    $pokemon[$cr]['day'] = $row['day'];
    $cr++;
  }
    
  echo json_encode($pokemon);
}
else
{
  http_response_code(404);
}
?>
