<?php
session_start();

function verificarSessao($perfilNecessario = null) {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: /petvida/index.php');
        exit;
    }

    if ($perfilNecessario !== null && (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== $perfilNecessario)) {
        header('Location: /petvida/index.php');
        exit;
    }
}
?>
