<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('admin');

$pageTitle = 'PetVida | Estoque de vacinas';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Estoque de vacinas</h1>
        </div>

        <div class="card">
            <p>Controle de quantidade, validade e reposição de vacinas.</p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
