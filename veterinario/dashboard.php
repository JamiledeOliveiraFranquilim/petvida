<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('veterinario');

$pageTitle = 'PetVida | Veterinário - Dashboard';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Dashboard do veterinário</h1>
        </div>

        <div class="grid grid-3">
            <div class="stats">
                <strong>18</strong>
                <span>Consultas hoje</span>
            </div>
            <div class="stats">
                <strong>7</strong>
                <span>Prontuários em aberto</span>
            </div>
            <div class="stats">
                <strong>12</strong>
                <span>Vacinas aplicadas</span>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
