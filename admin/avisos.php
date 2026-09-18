<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('admin');

$pageTitle = 'PetVida | Avisos';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Avisos</h1>
        </div>

        <div class="card">
            <p>Central de comunicados e alertas do sistema.</p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
