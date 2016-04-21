<?php
$user = 'postgres';
$passwd = '1234';
$db = "RapiHealth";
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx);
?>
