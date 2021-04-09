<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:localhost17.database.windows.net,1433; Database = patels18_db", "patels18", "Cloudif9bre");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "patels18", "pwd" => "Cloudif9bre", "Database" => "patels18_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:localhost17.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>