<?php

header('Access-Control-Allow-Origin: *');
require 'connect.php';

$id = $_GET['id'];
    
//$id = mysqli_real_escape_string($conn,$_POST["id"]);

$pokemon = [];
$sql = "SELECT id,pokemonid,name,day FROM captured WHERE id=$id";


$cr = 0;
if($result = mysqli_query($conn,$sql))
{

  while($row = mysqli_fetch_assoc($result))
  {
  	$pokemon[$cr]['id'] = $row['id'];
  	$pokemon[$cr]['pokemonid'] = $row['pokemonid'];
    $pokemon[$cr]['name'] = $row['name'];
    $pokemon[$cr]['day'] = $row['day'];
    $cr++;
  }

  $sql2 = "SELECT move FROM moves WHERE capturedid=$id";
  if($result = mysqli_query($conn,$sql2))
  {
    $index = 0;
    while($row = mysqli_fetch_assoc($result))
    {
      $pokemon[$cr]['move'][$index]['name'] = $row['move'];
      $index++;
    }

  }

  
  echo json_encode($pokemon);
}
else
{
  http_response_code(404);
}
?>
