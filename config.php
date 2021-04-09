<?php
$connectionInfo = array("UID" => "patels18", "pwd" => "Cloudif9bre", "Database" => "patels18_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:localhost17.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>