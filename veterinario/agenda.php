<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('veterinario');

$pageTitle = 'PetVida | Agenda';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Agenda</h1>
        </div>

        <div class="card">
            <ul>
                <li>09:00 — Consulta de Rex</li>
                <li>11:30 — Vacina de Luna</li>
                <li>14:00 — Avaliação de Bruce</li>
                <li>16:00 — Retorno de acompanhamento</li>
            </ul>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
