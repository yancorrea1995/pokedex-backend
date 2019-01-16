<?php

	header('Access-Control-Allow-Origin: *');
	require 'connect.php';

	if(!empty($_POST))
	{
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		$sql = "DELETE FROM captured WHERE id='$id'";

		if(!mysqli_query($conn,$sql))
		{
			http_response_code(404);
		}
	}

?>
