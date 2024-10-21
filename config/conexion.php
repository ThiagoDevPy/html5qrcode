<?php
include "database.php";
// Configuración de la base de datos
$host = 'fra1.clusters.zeabur.com';
$port = '31753';
$user = 'root';
$pass = '8Plwn04fh936bKBTzi7Gu1rQSD5YMs2t';
$dbname = 'zeabur';

try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>