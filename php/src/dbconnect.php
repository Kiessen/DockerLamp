<?php
//mysql database connection
$host = "host.docker.internal";
$user = "root";
$pass = "secret";
$db = "db_crud";
$port = "3306";
$con = mysqli_connect($host, $user, $pass, $db, $port) or die("Error " . mysqli_error($con));
?>