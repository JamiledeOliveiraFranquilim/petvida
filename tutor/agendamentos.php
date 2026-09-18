<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Agendamentos';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Agendamentos</h1>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <h3>Consulta geral</h3>
                <p>Pet: Rex</p>
                <p>Data: 25/09/2026</p>
                <p>Horário: 15:30</p>
            </div>
            <div class="card">
                <h3>Vacina antirrábica</h3>
                <p>Pet: Luna</p>
                <p>Data: 30/09/2026</p>
                <p>Horário: 10:00</p>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
