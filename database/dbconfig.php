<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "artistique";

$connection = "mysql:host=$server;dbname=$db";

try{
    $conn = new PDO($connection, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection Failed: ". $e->getMessage();
}

?>