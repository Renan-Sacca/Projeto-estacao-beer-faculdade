<?php
$server = 'localhost';
$dbname = 'aula';
$user = 'root';
$pass = '';

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
}catch(PDOException $e){
    echo "Error:". $e->getMessage();
}


?>