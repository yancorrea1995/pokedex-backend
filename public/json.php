$json = file_get_contents('https://pokeapi.co/api/v2/pokemon/pikachu/');
$obj = json_decode($json);
echo $obj->access_token;
