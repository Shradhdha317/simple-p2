<?php

		$host = "tcp:localhost17.database.windows.net,1433";
		$user = "patels18@localhost17";
		$pwd  = "Cloudif9bre";
		$db   = "patels18_db";
	    	$conn = new PDO("sqlsrv:Server = $host; Database = $db", $user, $pwd);
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>