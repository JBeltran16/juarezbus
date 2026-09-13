<?php
// registro.php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $edad = $_POST['edad'] ?? null;
    $es_estudiante = isset($_POST['estudiante']) && $_POST['estudiante'] === 'Si' ? 1 : 0;
    $correo = trim($_POST['correo'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    // Validaciones básicas
    if (empty($nombre) || empty($correo) || empty($contrasena)) {
        echo json_encode(['error' => 'Todos los campos obligatorios deben llenarse']);
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => 'El correo no es válido']);
        exit;
    }

    if (strlen($contrasena) < 6) {
        echo json_encode(['error' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }

    // Encriptar la contraseña - NUNCA se guarda en texto plano
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO usuarios (nombre, edad, es_estudiante, correo, contrasena) 
             VALUES (:nombre, :edad, :es_estudiante, :correo, :contrasena)"
        );
        $stmt->execute([
            ':nombre' => $nombre,
            ':edad' => $edad,
            ':es_estudiante' => $es_estudiante,
            ':correo' => $correo,
            ':contrasena' => $contrasena_hash
        ]);

        echo json_encode(['exito' => 'Usuario registrado correctamente']);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // código de error de duplicado (correo UNIQUE)
            echo json_encode(['error' => 'Ese correo ya está registrado']);
        } else {
            echo json_encode(['error' => 'Error al registrar usuario']);
        }
    }
}
?>