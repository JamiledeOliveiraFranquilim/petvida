<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Avisos';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Avisos</h1>
        </div>

        <div class="card">
            <ul>
                <li>Vacina de Rex vence em 5 dias.</li>
                <li>Consulta de Luna foi confirmada.</li>
                <li>Novas recomendações do veterinário disponíveis.</li>
            </ul>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
