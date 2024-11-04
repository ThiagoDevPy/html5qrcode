<?php
include "database.php";
// Configuración de la base de datos
$host = 'autorack.proxy.rlwy.net';
$port = '12006';
$user = 'alumnos';
$pass = 'Alumnos_Uninorte2024Ñ';
$dbname = 'railway';

mysql://root:VUIihnVjqOpUXZmCBzeOsOoUKPekFIEg@autorack.proxy.rlwy.net:12006/railway

try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>