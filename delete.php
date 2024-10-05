<?php 
include('db.php');

$id = $_GET['id'];

$sql = 'DELETE FROM students WHERE ID = :id';

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id' , $id);
$stmt->execute();
header('Location: index.php');



?>