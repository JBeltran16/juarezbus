<?php
// reportar_incidente.php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_unidad = trim($_POST['unidad'] ?? '');
    $estacion = trim($_POST['estacion'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    // Validaciones
    if (empty($numero_unidad) || empty($estacion) || empty($descripcion)) {
        echo json_encode(['error' => 'Todos los campos son obligatorios']);
        exit;
    }

    if (!is_numeric($numero_unidad)) {
        echo json_encode(['error' => 'El número de unidad debe ser numérico']);
        exit;
    }

    if (strlen($descripcion) < 10) {
        echo json_encode(['error' => 'La descripción debe tener al menos 10 caracteres']);
        exit;
    }

    if (strlen($descripcion) > 1000) {
        echo json_encode(['error' => 'La descripción es demasiado larga']);
        exit;
    }

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO reportes (numero_unidad, estacion, descripcion) 
             VALUES (:numero_unidad, :estacion, :descripcion)"
        );
        $stmt->execute([
            ':numero_unidad' => $numero_unidad,
            ':estacion' => $estacion,
            ':descripcion' => $descripcion
        ]);

        echo json_encode(['exito' => 'Reporte enviado correctamente']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al guardar el reporte']);
    }
}
?>