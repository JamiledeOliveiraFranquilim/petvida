<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Carteira de vacinação';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Carteira de vacinação</h1>
        </div>

        <div class="card">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Animal</th>
                        <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Vacina</th>
                        <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Próxima dose</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">Rex</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">V8/V10</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">15/10/2026</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">Luna</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">Tríplice felina</td>
                        <td style="padding: 10px; border-bottom: 1px solid #ddd;">02/11/2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
