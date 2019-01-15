<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';
    
$pokemon = [];
$sql = "SELECT id,idpokemon,name,day FROM captured";

if($result = mysqli_query($conn,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
  	$pokemon[$cr]['id']    = $row['id'];
  	$pokemon[$cr]['pokemonid']    = $row['pokemonid'];
    $pokemon[$cr]['name']    = $row['name'];
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
