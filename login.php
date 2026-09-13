<?php
    session_start();
    require 'conexion.php';
    
    #Obtencion de correo y contraseña
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $correo = trim($_POST['correo'] ?? '');
        $contrasena = $_POST['contrasena'] ?? '';

        #Verificacion de la contraseña y correo (debe tener algun valor)
        if(empty($correo) || empty($contrasena)){
            echo json_encode(['error' => 'Correo y contraseña son obligatorios']);
            exit;
        }

        try{
            $stmt = $pdo -> prepare("SELECT id, nombre,contrasena FROM usuarios WHERE correo = :correo");
            $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            // Credenciales correctas
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];

            echo json_encode(['exito' => 'Inicio de sesión correcto', 'nombre' => $usuario['nombre']]);
            } else{
                // Mensaje genérico a propósito - no reveles si fue el correo o la contraseña
                echo json_encode(['error' => 'Correo o contraseña incorrectos']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al iniciar sesión']);
        }
    }
?>