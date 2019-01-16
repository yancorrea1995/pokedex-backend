<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';

echo $_GET['id'];
    
//$id = mysqli_real_escape_string($conn,$_POST["id"]);

$pokemon = [];
$sql = "SELECT id,pokemonid,name,day FROM captured WHERE id=811";

if($result = mysqli_query($conn,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
  	$pokemon[$cr]['id'] = $row['id'];
  	$pokemon[$cr]['pokemonid'] = $row['pokemonid'];
    $pokemon[$cr]['name'] = $row['name'];
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
