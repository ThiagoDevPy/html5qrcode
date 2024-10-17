<?php
$host = 'autorack.proxy.rlwy.net'; // Ejemplo: 'mysql-123456.c.database.azure.com'
$port = '31433'; // Asegúrate de usar el puerto correcto
$user = 'root'; // Tu nombre de usuario
$pass = 'SttfjyiqKhWHXUzGiGbokHowQCWFWpOQ'; // Tu contraseña
$dbname = 'railway'; // El nombre de la base de datos
mysql://root:SttfjyiqKhWHXUzGiGbokHowQCWFWpOQ@autorack.proxy.rlwy.net:31433/railway
// Crear la conexión
$conexion = new mysqli($host, $user, $pass, $dbname, $port);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

