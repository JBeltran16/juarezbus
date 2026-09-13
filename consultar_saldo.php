<?php
// consultar_saldo.php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');

    if (empty($nombre)) {
        echo json_encode(['error' => 'Debes ingresar un nombre']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT saldo FROM tarjetas WHERE nombre_titular = :nombre");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            echo json_encode(['saldo' => $resultado['saldo']]);
        } else {
            echo json_encode(['error' => 'No se encontró ninguna tarjeta con ese nombre']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al consultar el saldo']);
    }
}
?>