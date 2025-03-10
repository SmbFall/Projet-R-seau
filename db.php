<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);



$host = 'localhost';
$dbname = 'smarttech_db';
$username = 'root';
$password = 'root'; 
$port = 3306; 
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
