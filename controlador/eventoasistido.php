<?php

include '../conexion.php';
session_start(); 
$id= $_SESSION['user_id'];


$sql = "SELECT e.nombre, a.* ,e.estado , e.fecha AS fechaevento FROM asistencias a INNER JOIN eventos e ON a.id_evento = e.id WHERE a.alumno_id= '$id'";
$result = $conexion->query($sql);



$eventos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
}

$conexion->close();
echo json_encode($eventos);
?>