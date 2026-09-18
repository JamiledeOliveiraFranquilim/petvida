<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
verificarSessao('tutor');

$pageTitle = 'PetVida | Cadastrar animal';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="card form-card">
            <h2>Cadastrar animal</h2>
            <form>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="especie">Espécie</label>
                    <input type="text" id="especie" name="especie">
                </div>
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" id="raca" name="raca">
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="text" id="idade" name="idade">
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
