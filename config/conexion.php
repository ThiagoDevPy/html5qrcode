<?php
include "database.php";
// Configuración de la base de datos
$host = 'fra1.clusters.zeabur.com';
$port = '31149';
$user = 'root';
$pass = '3VpXdYRfe4gqJ5ZD1zt2Go0Oj9v78uT6';
$dbname = 'zeabur';


try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>