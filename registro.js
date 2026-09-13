document.getElementById('form_registro').addEventListener('submit', async function(e) {
    e.preventDefault(); // evita que la página se recargue

    const nombre = document.getElementById('nombre').value;
    const edad = document.getElementById('edad').value;
    const correo = document.getElementById('correo').value;
    const contrasena = document.getElementById('contraseña').value;

    // Obtener el valor del radio seleccionado
    const estudianteInput = document.querySelector('input[name="estudiante"]:checked');
    const estudiante = estudianteInput ? estudianteInput.value : '';

    const mensajeDiv = document.getElementById('mensaje_registro');

    const formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('edad', edad);
    formData.append('estudiante', estudiante);
    formData.append('correo', correo);
    formData.append('contrasena', contrasena);

    try {
        const response = await fetch('registro.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.exito) {
            mensajeDiv.textContent = data.exito;
            mensajeDiv.style.color = 'green';
            // Opcional: redirigir al login después de 1.5 segundos
            setTimeout(() => {
                window.location.href = 'Log_in.html';
            }, 1500);
        } else {
            mensajeDiv.textContent = data.error;
            mensajeDiv.style.color = 'red';
        }
    } catch (error) {
        mensajeDiv.textContent = 'Error al conectar con el servidor';
        mensajeDiv.style.color = 'red';
        console.error(error);
    }
});