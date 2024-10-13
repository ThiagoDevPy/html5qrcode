<?php
$host = 'fra1.clusters.zeabur.com'; // Ejemplo: 'mysql-123456.c.database.azure.com'
$port = '30089'; // Asegúrate de usar el puerto correcto
$user = 'root'; // Tu nombre de usuario
$pass = 'F1452gwrd7t6MYJXEBAZz0pu98vWN3yj'; // Tu contraseña
$dbname = 'railway'; // El nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $user, $pass, $dbname, $port);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

