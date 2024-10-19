<?php
include "database.php";
// Configuración de la base de datos
$host = 'fra1.clusters.zeabur.com';
$port = '32505';
$user = 'root';
$pass = '1L0Vy8R52pu3hsjCHwF7xqYB6gd9c4Dt';
$dbname = 'zeabur';

try {
    // Crear una instancia de la clase Database
    $db = new Database($host, $port, $user, $pass, $dbname);
    $conexion = $db->getConnection();

    // Realiza operaciones en la base de datos aquí

} catch (Exception $e) {
    echo $e->getMessage(); // Muestra un mensaje genérico al usuario
}
?>