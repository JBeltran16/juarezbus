document.getElementById('form_consulta_saldo').addEventListener('submit', async function(e) {
    e.preventDefault();

    const nombre = document.getElementById('nombre_tarjeta').value;
    const resultadoDiv = document.getElementById('resultado_saldo');

    const formData = new FormData();
    formData.append('nombre', nombre);

    try {
        const response = await fetch('consultar_saldo.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.saldo !== undefined) {
            resultadoDiv.textContent = `Saldo disponible: $${data.saldo}`;
            resultadoDiv.style.color = 'green';
        } else {
            resultadoDiv.textContent = data.error;
            resultadoDiv.style.color = 'red';
        }
    } catch (error) {
        resultadoDiv.textContent = 'Error al conectar con el servidor';
        resultadoDiv.style.color = 'red';
        console.error(error);
    }
});