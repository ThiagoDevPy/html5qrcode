<?php
include "database.php";
// Configuración de la base de datos
$host = 'fra1.clusters.zeabur.com';
$port = '31686';
$user = 'root';
$pass = 'dv712uY6im84sxEH5hkAUy90PXLwR3ot';
$dbname = 'zeabur';

try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>