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
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            isRedirecting = true;
            window.location.href = decodedText;
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 500,
                    height: 500
                },
                // Especificar la cámara trasera
                rememberLastUsedCamera: false,
                preferredCamera: "environment" // Usar la cámara trasera
            },
            /* verbose= */
            true);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>

</html>


<?php
ob_end_flush();
?>