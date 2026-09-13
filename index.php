<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuarezBus - HomePage</title>
    <link rel="shortcut icon" href="images/JuarezBus_logo.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="logo">
            <img id="juarezbus_logo" src="images/JUAREZBUS_LOGO.png" alt="">
        </div>
        <nav>
            <div id="contenedor_navegador">
                <a id="link_nav" href="index.php#ancla_consulta_y_recarga"><strong>Consultar saldo</strong></a>
                <a id="link_nav" href="index.php#ancla_de_reporte"><strong>Reportar incidente</strong></a>
                <a id="link_nav" href="Log_in.php"><strong>Iniciar sesion / Registrarse</strong></a>
            </div>
        </nav>
    </header>
    <div id="shortcut_planificar_ruta">
        <div id="texto_planificacion">
            <h1 style="color: #fff;">
                ¿Ocurrió un incidente?
            </h1>
            <h2 style="color: #fff;">
                Reportalo y ayuda a mejorar el servicio.
            </h2>
            <a id="boton_planificar" href="index.php#ancla_de_reporte">Reportar incidente</a>
        </div>
    </div>
    <div id="contenedor_reporte_e_imagen">
        <div id="contenedor_imagen_reporte">
            <img id="imagen_reporte" src="images/camiones.jpg" alt="Camiones de JuárezBus">
        </div>
        <div id="contenedor_reporte">
            <form action="" id="form_reporte">
                <div id="formulario_reporte">
                    <h2 id="ancla_de_reporte">
                        Ingresa la información del reporte
                    </h2>
                    <label for="unidad">Ingresa el número de la unidad</label>
                    <input type="number" id="unidad">
                    <label for="estacion">Ingresa el nombre de la estación</label>
                    <input type="text" id="estacion">
                    <label for="especificacion_reporte">Describe el incidente</label>
                    <textarea id="especificacion_reporte"></textarea>
                    <input type="submit" value="Enviar reporte">
                    <div id="mensaje_reporte"></div>
                </div>
            </form>
        </div>
    </div>
    <div id="contenedor_saldo_e_imagen">
        <form action="" id="form_consulta_saldo">
            <div id="consultar_saldo">
                <h2 id="ancla_consulta_y_recarga">
                    Consulta el saldo de tu tarjeta preferencial.
                </h2>
                <label for="nombre_tarjeta">
                    Ingresa el nombre del usuario de la tarjeta preferencial
                </label>
                <input type="text" id="nombre_tarjeta">
                <input type="submit" value="Buscar tarjeta preferencial">
                <div id="resultado_saldo"></div>
            </div>
        </form>
        <div id="contenedor_imagen_tarjeta">
            <img id="imagen_tarjeta" src="images/tarjeta.jpg" alt="Tarjeta preferencial JuárezBus">
        </div>
    </div>
    <div id="pie_pagina">
        <footer>
            <div id="logo">
                <img id="juarezbus_logo" src="images/JUAREZBUS_LOGO.png" alt="">
            </div>
            <div id="informacion_estudiante">
                <p>Alumno: Beltrán Herrada Jared Gustavo.</p>
                <p>Matricula: 234878</p>
                <p>Materia: Seguridad en computo I</p>
                <p>Universidad Autónoma de Ciudad Juárez</p>
                <p>PAGINA SOLO DE PRACTICA</p>
            </div>
        </footer>
    </div>
    <script src="consultar_saldo.js"></script>
    <script src="reporte.js"></script>
</body>
</html>