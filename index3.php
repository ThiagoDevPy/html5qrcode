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
if (!isset($_SESSION['evento_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    header('Location: index1.php'); // Cambia 'login.html' por el nombre de tu página de inicio de sesión
    exit(); // Asegúrate de salir del script después de redirigir

}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Asistencia</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>



    <style>
        body {
            background-color: #f8f9fa;
            /* Color de fondo del body */
            height: 100%;
        }

        .bg-header {
            background-color: #007bff;
            /* Color azul para el header */
        }

        .bg-footer {
            background-color: #007bff;

            /* Color azul para el footer */
            color: white;
            /* Color del texto en el footer */
        }


        footer {
            bottom: 0;
        }

        #html5-qrcode-button-camera-permission {
            background-color: #28a745;
            /* Color de fondo verde */
            color: white;
            /* Color del texto blanco */
            border: none;
            /* Sin borde */
            padding: 10px 20px;
            /* Espaciado interno */
            border-radius: 5px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cursor tipo puntero */
            transition: background-color 0.3s;
            /* Transición suave */
            margin-top: 15px;
            /* Añadir separación superior */
        }

        #html5-qrcode-button-camera-permission:hover {
            background-color: #218838;
            /* Color de fondo al pasar el mouse */
        }

        /* Estilo para el botón de encender cámara */
        #html5-qrcode-button-camera-start {
            background-color: #28a745;
            /* Color de fondo verde */
            color: white;
            /* Color del texto blanco */
            border: none;
            /* Sin borde */
            padding: 8px 20px;
            /* Espaciado interno */
            border-radius: 5px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cursor tipo puntero */
            transition: background-color 0.3s;
            /* Transición suave */
            margin-top: 15px;
            /* Añadir separación superior */
        }


        #html5-qrcode-button-camera-start:hover {
            background-color: #218838;
            /* Color de fondo al pasar el mouse */
        }

        /* Estilo para el selector de cámara */
        #html5-qrcode-select-camera {
            border: 1px solid #ced4da;
            /* Borde gris claro */
            border-radius: 5px;
            /* Bordes redondeados */
            padding: 10px;
            /* Espaciado interno */

            /* Ancho completo */
            margin-top: 10px;
            /* Margen superior */
        }


        #html5-qrcode-button-camera-stop {
            background-color: #28a745;
            /* Color de fondo verde */
            color: white;
            /* Color del texto blanco */
            border: none;
            /* Sin borde */
            padding: 10px 20px;
            /* Espaciado interno */
            border-radius: 5px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cursor tipo puntero */
            transition: background-color 0.3s;
            /* Transición suave */
            margin-top: 15px;
            /* Añadir separación superior */
        }

        #html5-qrcode-button-camera-stop:hover {
            background-color: #218838;
            /* Color de fondo al pasar el mouse */
        }


        #html5-qrcode-anchor-scan-type-change {
            font-size: 0;
        }

        #reader img {
            display: none;

        }
    </style>
</head>

<body>


    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div>
                    <div>

                        <div class="cont">
                            <div id="camara">
                                <div>
                                    <div id="cuadro">
                                        <div id="reader" width="600px" style="border: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
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

        const html5QrCode = new Html5Qrcode("reader");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
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
        };
        const config = { fps: 10, qrbox: { width: 250, height: 250 } };

        html5QrCode.start({
            facingMode: {
                exact: "environment"
            }
        }, config, qrCodeSuccessCallback);

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>



</html>


<?php
ob_end_flush();
?>