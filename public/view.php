<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';

$id = $_GET['id'];
    
//$id = mysqli_real_escape_string($conn,$_POST["id"]);

$pokemon = [];
$sql = "SELECT id,pokemonid,name,day FROM captured WHERE id=$id";


if($result = mysqli_query($conn,$sql))
{

  while($row = mysqli_fetch_assoc($result))
  {
  	$pokemon[0]['id'] = $row['id'];
  	$pokemon[0]['pokemonid'] = $row['pokemonid'];
    $pokemon[0]['name'] = $row['name'];
    $pokemon[0]['day'] = $row['day'];
  }

  $sql2 = "SELECT move FROM moves WHERE capturedid=$id";
  if($result = mysqli_query($conn,$sql2))
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $pokemon[0]['move']['name'] = $row['move'];
    }

  }
  
  echo json_encode($pokemon);
}
else
{
  http_response_code(404);
}
?>