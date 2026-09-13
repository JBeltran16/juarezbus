document.getElementById('form_reporte').addEventListener('submit', async function(e) {
    e.preventDefault();

    const unidad = document.getElementById('unidad').value;
    const estacion = document.getElementById('estacion').value;
    const descripcion = document.getElementById('especificacion_reporte').value;
    const mensajeDiv = document.getElementById('mensaje_reporte');

    const formData = new FormData();
    formData.append('unidad', unidad);
    formData.append('estacion', estacion);
    formData.append('descripcion', descripcion);

    try {
        const response = await fetch('reportar_incidente.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.exito) {
            mensajeDiv.textContent = data.exito;
            mensajeDiv.style.color = 'green';
            document.getElementById('form_reporte').reset(); // limpia el formulario
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