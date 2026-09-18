<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Meus animais';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Meus animais</h1>
            <a href="/petvida/tutor/cadastrar_animal.php" class="btn btn-primary">Cadastrar animal</a>
        </div>

        <div class="grid grid-3">
            <div class="card">
                <h3>Rex</h3>
                <p>Cachorro • Labrador • 3 anos</p>
            </div>
            <div class="card">
                <h3>Luna</h3>
                <p>Gato • Persa • 2 anos</p>
            </div>
            <div class="card">
                <h3>Bruce</h3>
                <p>Cachorro • Vira-lata • 5 anos</p>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
