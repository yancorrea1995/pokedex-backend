<?php

$conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net:3306", "be1ac295a270bf", "8b76acd3", "heroku_1f10eb5821ace69");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Conectado ao MySQL<br />";

$sql = "INSERT INTO captured (idpokemon, day)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
