<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('veterinario');

$pageTitle = 'PetVida | Prontuário';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Prontuário</h1>
        </div>

        <div class="card">
            <h3>Paciente: Rex</h3>
            <p>Diagnóstico: Sem alterações relevantes.</p>
            <p>Observações: Mantém rotina de exercícios e alimentação balanceada.</p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
