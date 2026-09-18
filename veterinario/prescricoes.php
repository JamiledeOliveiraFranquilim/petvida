<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('veterinario');

$pageTitle = 'PetVida | Prescrições';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Prescrições</h1>
        </div>

        <div class="card">
            <ul>
                <li>Rex: 1 comprimido ao dia durante 7 dias.</li>
                <li>Luna: administração de colírio 2x ao dia.</li>
                <li>Bruce: dieta controlada e acompanhamento em 15 dias.</li>
            </ul>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
