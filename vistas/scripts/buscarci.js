
function buscarCi(){
    var cedula = document.getElementById('cedula').value;
    cedula = cedula.replace(/[.-]/g, '');  // Elimina puntos y guiones
    var alerta = document.getElementById('noregistrado');
    var alertacam = document.getElementById('rellenacampos');
    var alertaco = document.getElementById('rellenacorreo')
    $.ajax({
        url: '../controlador/validarlogin.php', // Cambia esto a la ruta de tu archivo PHP
        type: 'GET', // Cambia a 'POST' si lo necesitas
        data: { cedula: cedula }, // Envía la cédula
        dataType: 'json',
        success: function(response) {
            if (response) {
                limpiar();
                mostrardatos();
                $('#nombres').val(response.nombres);
                $('#apellidos').val(response.apellidos);
                $('#ci').val(response.ci);
                $('#telefono').val(response.telefono);
                $('#correo').val(response.correo);
                $('#carrera').val(response.carrera);
                $('#universidad').val(response.universidad);
                bloquearCampos();
                
            } else {
                limpiar();
                desbloquearCampos();
                alertacam.style.display = "none";
                alertaco.style.display = "none"; 
                alerta.style.display = "block";
                registrar();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la solicitud: ' + error);
        }
    });
}

function bloquearCampos(){
$('#nombres').prop('disabled', true);
$('#apellidos').prop('disabled', true);
$('#ci').prop('disabled', true);
$('#telefono').prop('disabled', true);
$('#carrera').prop('disabled', true);
$('#universidad').prop('disabled', true);
$('#correo').prop('disabled', true);
}

function desbloquearCampos(){
    $('#nombres').prop('disabled', false);
    $('#apellidos').prop('disabled', false);
    $('#ci').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#carrera').prop('disabled', false);
    $('#universidad').prop('disabled', false);
    $('#correo').prop('disabled', false);
}




function mostrardatos(){
    $('#campos-confirmacion').show();
    $('#campos-adicionales1').hide();
    $('#campos-adicionales').show();
}

function registrar(){
    $('#campos-adicionales1').show();
    $('#campos-confirmacion').show();
    $('#campos-adicionales').hide();
    
}


function ocultar(){
    $('#campos-adicionales1').hide();
    $('#campos-confirmacion').hide();
    $('#campos-adicionales').hide();
}

function limpiar(){
    $("#nombres").val("");
    $('#apellidos').val("");
    $('#telefono').val("");
    $('#carrera').val("");
    $('#universidad').val("");
    $('#correo').val("");

}



function login() {
    // Obtener los valores del formulario
    var cedula = document.getElementById('cedula').value;
   
   
    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controlador/validarlogin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   
    // Configurar el callback para manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
               var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = 'udn.php'; // Redirigir al dashboard
                } else {
                    alert("Datos Incorrectos");
                }
            } else {
                document.getElementById('message').textContent = 'Error en la solicitud.';
            }
        }
    };
   
    // Enviar los datos del formulario
    xhr.send('cedula=' + encodeURIComponent(cedula) );
   }




   function registrarUsuario() {
    var nombre = document.getElementById('nombres').value.trim();
    var apellido = document.getElementById('apellidos').value.trim();
    var cedula = document.getElementById('cedula').value.trim();
    cedula = cedula.replace(/[.-]/g, '');  // Elimina puntos y guiones
    var telefono = document.getElementById('telefono').value.trim();
    var correo = document.getElementById('correo').value.trim();
    var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo);
    
   

    var carreraSelect = document.getElementById('cmbcarrera');
    var carreraTexto = carreraSelect.options[carreraSelect.selectedIndex].text;

    var universidadSelect = document.getElementById('cmbuniversidad');
    var universidadTexto = universidadSelect.options[universidadSelect.selectedIndex].text;
    var alerta = document.getElementById('rellenacampos');
    var alertaco = document.getElementById('rellenacorreo');
    var alertanoreg = document.getElementById('noregistrado');
    var alertaregis = document.getElementById('registradoco');
    if (!correo) {
      
    }


    // Verificar que ningún campo esté vacío
    if (!nombre || !apellido || !cedula || !carreraTexto || !telefono || !universidadTexto || !correo) {
        alertaco.style.display = "none";
        alerta.style.display = "block";
        return; // Detener la ejecución si algún campo está vacío
    }

    if (!correoValido) {
        alerta.style.display = "none";
        alertaco.style.display = "block";
        return; // Detener la ejecución si algún campo está vacío
    }


    

    

    console.log(nombre + " " + apellido + " " + cedula + " " + carreraTexto + " " + universidadTexto);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controlador/registrarusuario.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            limpiar();
            ocultar();
            alertanoreg.style.display = "none"
            alerta.style.display = "none";
            alertaco.style.display = "none";

            alertaregis.style.display = "block";
            setTimeout(function() {
                alertaregis.style.display = "none";
            }, 3000);  // 3000 ms = 3 segundos
            

        } else {
            alert('Error en la solicitud.');
        }
    };

    xhr.send(
        'nombre=' + encodeURIComponent(nombre) +
        '&apellido=' + encodeURIComponent(apellido) +
        '&cedula=' + encodeURIComponent(cedula) +
        '&carrera=' + encodeURIComponent(carreraTexto) + // Usar el texto de la carrera
        '&telefono=' + encodeURIComponent(telefono) +
        '&mail=' + encodeURIComponent(correo) +
        '&universidad=' + encodeURIComponent(universidadTexto) // Usar el texto de la universidad
    );
}
