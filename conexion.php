<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'technology';
$port = 3307; // Change this to your specific port number

try {
    $conexion = new PDO("mysql:host=$server;port=$port;dbname=$database", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

