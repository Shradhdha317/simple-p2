<?php
$con=mysqli_init(); 
mysqli_ssl_set($con, NULL, NULL, "C:/Users/shrad/Desktop/Github for cloud management/DigiCertGlobalRootG2.crt.pem", NULL, NULL); 
mysqli_real_connect($con, "patels18.mysql.database.azure.com", "patels18@patels18", "Krishna@0115", "patels18_db", 3306);

?>