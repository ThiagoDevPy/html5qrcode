<?php
$host = 'junction.proxy.rlwy.net'; // Ejemplo: 'mysql-123456.c.database.azure.com'
$port = '57690'; // Asegúrate de usar el puerto correcto
$user = 'root'; // Tu nombre de usuario
$pass = 'jTegmeDUEAScouxevhaXXazZTThvNptv'; // Tu contraseña
$dbname = 'railway'; // El nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $user, $pass, $dbname, $port);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
