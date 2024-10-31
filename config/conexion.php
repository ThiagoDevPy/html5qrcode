<?php
include "database.php";
// Configuración de la base de datos
$host = 'autorack.proxy.rlwy.net';
$port = '22430';
$user = 'root';
$pass = 'IXLqTwmjWQBXbYLhgIKQGVBmxAyMESYV';
$dbname = 'railway';



try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>