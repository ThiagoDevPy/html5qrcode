<?php
// Conectar a la base de datos
include 'conexion.php';
// Datos del nuevo usuario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$carrera = $_POST['carrera'];

$stmt = $conexion->prepare("SELECT * FROM empleados WHERE documento_numero = ?");
$stmt->bind_param("s", $cedula);
$stmt->execute();
$result = $stmt->get_result();



    $stmt = $conexion->prepare("SELECT * FROM empleados WHERE documento_numero = ?");
    $stmt->bind_param("s", $cedula );
    $stmt->execute();
    $resulta = $stmt->get_result();

    if ($resulta->num_rows >= 1) {
      echo  "Ya estas registrado";
    } elseif ($resulta->num_rows == 0) {
        // Aquí va la lógica para guardar los datos

        $sql = "INSERT INTO empleados (nombre,apellidos,documento_numero,telefono,carrera) VALUES (?,?,?,?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('sssss', $nombre, $apellido, $cedula, $telefono,$carrera);
        
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        }else{
            echo "Error al insertar" . $stmt->error;
        }
    }



?>