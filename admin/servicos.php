<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('admin');

$pageTitle = 'PetVida | Serviços';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Serviços</h1>
        </div>

        <div class="card">
            <p>Cadastro e manutenção de serviços disponíveis.</p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
