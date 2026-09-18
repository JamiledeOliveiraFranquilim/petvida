<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('veterinario');

$pageTitle = 'PetVida | Vacinas';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Vacinas</h1>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <h3>V8/V10</h3>
                <p>Disponível para cães</p>
            </div>
            <div class="card">
                <h3>Tríplice felina</h3>
                <p>Disponível para gatos</p>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
