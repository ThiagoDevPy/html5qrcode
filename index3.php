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
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Sistema Ventas</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js"></script>
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

      
        .cont {
            display: flex;
            justify-content: center;
            /* Centra horizontalmente */
            align-items: center;
            /* Centra verticalmente */
            height: 60vh;
            /* Opcional: ajusta la altura del contenedor */
        }
       


        /* Estilo para el lector QR */
        #reader {
            width: 100%; /* Ancho completo */
            height: auto; /* Altura automática para mantener la relación */
            max-width: 600px; /* Ancho máximo */
            margin: 0 auto; /* Centrar */
            border: 2px solid #ccc; /* Ejemplo de borde */
            border-radius: 10px; /* Bordes redondeados */
            overflow: hidden; /* Ocultar desbordamiento */
            
        }

        footer{
            bottom: 0;
        }
    
    </style>
</head>

<body>
    <header class="bg-header py-4">
        <div class="container">
            <h1 class="text-center text-white"><img src="img/Logos-uninorte-05-1.png" alt=""></h1> <!-- Cambia esto por tu logo -->
        </div>
    </header>


            <main>
                <div >
                    <div>

                    <div class="cont">
                        <div id="camara">
                            <div>
                                <div id="cuadro">
                                <div id="reader" width="600px"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </main>
  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="scripts/asistencia.js" ?<?php echo time(); ?>></script>
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
            fps: 20,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        true
    );

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

       // Renderizar el escáner
       const observer = new MutationObserver(() => {
            const button = document.getElementById('start-scanning-button');
            const comboBox = document.getElementById('camera-selection');

            if (button && comboBox) {
                button.textContent = 'Start sdaasdasd'; // Cambiar texto del botón
                const label = comboBox.querySelector('label');
                if (label) {
                    label.textContent = 'Select sadada'; // Cambiar texto del combo box
                }
                observer.disconnect(); // Dejar de observar una vez que se hayan encontrado los elementos
            }
        });

        // Iniciar la observación del DOM
        observer.observe(document.body, { childList: true, subtree: true }); 
</script>
</body>



</html>


<?php
ob_end_flush();
?>