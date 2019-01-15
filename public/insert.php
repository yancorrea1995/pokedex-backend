<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    

if(!empty($_POST))
{
	$output = '';
	$name = mysqli_real_escape_string($conn,$_POST["name"]);
	$day = "0000-00-00";

	$query = "INSERT INTO captured(idpokemon,day) VALUES ('$name','$day')";

	if (mysqli_query($conn,$query))
	{
		echo 'add ok';
	}
	else
	{
		echo "Erro inserir"
	}
}
else
{
	echo "Erro Vazio";
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
