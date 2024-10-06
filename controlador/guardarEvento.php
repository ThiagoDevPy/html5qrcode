

<?php
include '../conexion.php'; 
session_start(); // Inicia la sesión

if (isset($_POST['evento_id'])) {
    $_SESSION['evento_id'] = $_POST['evento_id']; // Guarda el ID en la sesión
    
    header("guardarexito.php");
    echo $_SESSION['evento_id'];
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID no recibido.']);
}




?>