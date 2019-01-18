<?php

	header('Access-Control-Allow-Origin: *');
	require 'connect.php';

	if(!empty($_POST))
	{
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		if($id == 0)
		{
			$sql = "DELETE FROM captured WHERE 1";

			if(!mysqli_query($conn,$sql))
			{
				http_response_code(404);
			}
		}
	}

?>
