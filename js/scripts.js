function registrarUsuario() {
    var nombre = document.getElementById('nombre').value.trim();
    var apellido = document.getElementById('apellido').value.trim();
    var cedula = document.getElementById('cedula').value.trim();
    var carrera = document.getElementById('carrera').value.trim();
    var telefono = document.getElementById('telefono').value.trim();
    var correo = document.getElementById('mail').value.trim();

    // Verificar que ningún campo esté vacío
    if (!nombre || !apellido || !cedula || !carrera || !telefono) {
        alert('Por favor, completa todos los campos.');
        return; // Detener la ejecución si algún campo está vacío
    }

    console.log(nombre + " " + apellido + " " + cedula + " " + carrera);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'registrarusuario.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            window.location.href = 'login.php';
        } else {
            alert('Error en la solicitud.');
        }
    };

    xhr.send(
        'nombre=' + encodeURIComponent(nombre) +
        '&apellido=' + encodeURIComponent(apellido) +
        '&cedula=' + encodeURIComponent(cedula) +
        '&carrera=' + encodeURIComponent(carrera) +
        '&telefono=' + encodeURIComponent(telefono) +
        '&mail=' + encodeURIComponent(correo)
    );

}





function login() {
    // Obtener los valores del formulario
    var cedula = document.getElementById('cedula').value;
   
   
    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'validarlogin.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   
    // Configurar el callback para manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
               var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = 'index1.php'; // Redirigir al dashboard
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




   
   function obtenerEventos() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'controlador/Asistencia.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var productos = JSON.parse(xhr.responseText);
            var select = document.getElementById('mi-select');

            // Limpiar el select antes de agregar nuevos productos
            select.innerHTML = '<option value="">Selecciona un evento</option>';

            productos.forEach(function(producto) {
                var option = document.createElement('option');
                option.value = producto.id; // Asignar el código como valor
                option.textContent = producto.nombre; // Nombre del producto
                select.appendChild(option);
            });
        }
    };
    
    xhr.send();
}

obtenerEventos();









document.getElementById('guardar').addEventListener('click', function() {
    var select = document.getElementById('mi-select');
    var selectedValue = select.value;

    if (selectedValue) {
        // Realiza una solicitud AJAX para guardar en la sesión
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'guardarEvento.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('ID guardado en sesión: ' + xhr.responseText);
                window.location.href="index3.php"
            }
        };
        xhr.send('id=' + encodeURIComponent(selectedValue));
    } else {
        alert('Por favor, selecciona un evento.');
    }
});



document.getElementById('eliminar').addEventListener('click', function() {
  

   
        // Realiza una solicitud AJAX para guardar en la sesión
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'controlador/eliminarevento.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
               alert(xhr.responseText);
            }
        };
        xhr.send();
    
});