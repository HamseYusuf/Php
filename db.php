<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sem6';


try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname" , $username , $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    echo 'connected';
}catch(PDOException $e) {
    echo 'connection failed  ' .$e->getMessage();
}



?>

