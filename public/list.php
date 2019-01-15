<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';
    
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
    
  echo json_encode(['data'=>$pokemon]);
}
else
{
  http_response_code(404);
}
?>
