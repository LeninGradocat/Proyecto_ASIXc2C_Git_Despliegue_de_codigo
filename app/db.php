<?php
$servername = "192.168.122.5";  // IP o dominio del servidor MySQL
$username = "sk";             // Usuario creado con acceso remoto
$password = "Sk123456!";         // Contraseña del usuario
$dbname = "crud_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
