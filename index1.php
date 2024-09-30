<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escanear QR</title>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
</head>
<body>
    <div id="reader" style="width: 600px;"></div>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Maneja el texto escaneado aquí
            console.log(`Código QR detectado: ${decodedText}`);
        }

        function onScanError(errorMessage) {
            // Maneja el error aquí
            console.warn(`Error de escaneo: ${errorMessage}`);
        }

        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start(
            { facingMode: "environment" }, // Usa la cámara trasera
            {
                fps: 10, // Cuadros por segundo
                qrbox: 250 // Tamaño del área de escaneo
            },
            onScanSuccess,
            onScanError)
        .catch(err => {
            // Maneja el error al iniciar la cámara
            console.error(`No se pudo iniciar: ${err}`);
        });
    </script>
</body>
</html>