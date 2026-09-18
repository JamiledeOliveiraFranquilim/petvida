<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('admin');

$pageTitle = 'PetVida | Veterinários';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Veterinários</h1>
        </div>

        <div class="card">
            <p>Gestão dos profissionais da clínica.</p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
