document.getElementById('form_login').addEventListener('submit', async function(e) {
    e.preventDefault();

    const correo = document.getElementById('correo_login').value;
    const contrasena = document.getElementById('contrasena_login').value;
    const mensajeDiv = document.getElementById('mensaje_login');

    const formData = new FormData();
    formData.append('correo', correo);
    formData.append('contrasena', contrasena);

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.exito) {
            mensajeDiv.textContent = `Bienvenido, ${data.nombre}`;
            mensajeDiv.style.color = 'green';
            setTimeout(() => {
                window.location.href = 'index.html';
            }, 1000);
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