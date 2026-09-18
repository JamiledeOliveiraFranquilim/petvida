<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('admin');

$pageTitle = 'PetVida | Admin - Dashboard';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Dashboard administrativo</h1>
        </div>

        <div class="grid grid-3">
            <div class="stats">
                <strong>120</strong>
                <span>Usuários ativos</span>
            </div>
            <div class="stats">
                <strong>18</strong>
                <span>Veterinários cadastrados</span>
            </div>
            <div class="stats">
                <strong>96%</strong>
                <span>Taxa de atendimento</span>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
