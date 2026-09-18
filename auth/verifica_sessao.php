<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function verificarSessao($perfilNecessario = null) {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: /petvida/auth/login.php');
        exit;
    }

    if ($perfilNecessario !== null && (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== $perfilNecessario)) {
        header('Location: /petvida/auth/login.php');
        exit;
    }
}
?>
