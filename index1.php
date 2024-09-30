<?php
ob_start();
session_start();
require 'conexion.php';
require 'phpqrcode/qrlib.php';

if (!isset($_SESSION['user_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header('Location: login.php'); // Cambia 'login.html' por el nombre de tu página de inicio de sesión
    exit(); // Asegúrate de salir del script después de redirigir
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

</head>

<body>
    <div id="reader" width="600px" height="600px"></div>

    <script>
    let isRedirecting = false; // Declarar la bandera fuera de la función

    function onScanSuccess(decodedText, decodedResult) {
        if (!isRedirecting) { // Verificar si no se ha redirigido ya
            isRedirecting = true; // Marcar como redirigiendo

            // Detener el escáner
            html5QrcodeScanner.clear().then(() => {
                // Redirigir a la URL escaneada
                window.location.href = decodedText;
            }).catch((err) => {
                console.error('Error al detener el escáner:', err);
            });
        }
    }

    function onScanFailure(error) {
        console.warn(`Código de escaneo error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 500,
                height: 500
            },
            rememberLastUsedCamera: false,
            preferredCamera: "environment"
        },
        true
    );

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</body>

</html>


<?php
ob_end_flush();
?>