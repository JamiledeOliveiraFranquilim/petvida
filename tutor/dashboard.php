<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Tutor - Dashboard';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Dashboard do tutor</h1>
        </div>

        <div class="grid grid-3">
            <div class="stats">
                <strong>3</strong>
                <span>Animais cadastrados</span>
            </div>
            <div class="stats">
                <strong>2</strong>
                <span>Consultas agendadas</span>
            </div>
            <div class="stats">
                <strong>1</strong>
                <span>Vacina pendente</span>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
