<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
require_once __DIR__ . '/../config/conexao.php';
verificarSessao('tutor');

$sucesso = isset($_GET['sucesso']) && $_GET['sucesso'] == '1';

try {
    $sql = 'SELECT * FROM petvida_animais WHERE tutor_id = :tutor_id ORDER BY criado_em DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':tutor_id' => $_SESSION['usuario_id']]);
    $animais = $stmt->fetchAll();
} catch (PDOException $e) {
    $animais = [];
}

$pageTitle = 'PetVida | Meus animais';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="page-header">
            <h1>Meus animais</h1>
            <a href="/petvida/tutor/cadastrar_animal.php" class="btn btn-primary">Cadastrar animal</a>
        </div>

        <?php if ($sucesso): ?>
            <div class="alert alert-success">Animal cadastrado com sucesso!</div>
        <?php endif; ?>

        <?php if (empty($animais)): ?>
            <div class="card">
                <p>Você ainda não cadastrou nenhum animal.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-3">
                <?php foreach ($animais as $animal): ?>
                    <div class="card">
                        <?php if (!empty($animal['foto'])): ?>
                            <img src="/petvida/assets/img/animais/<?php echo htmlspecialchars($animal['foto']); ?>" alt="<?php echo htmlspecialchars($animal['nome']); ?>" style="width:100%; max-height:180px; object-fit:cover; border-radius:8px; margin-bottom:12px;">
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($animal['nome']); ?></h3>
                        <p><?php echo ucfirst(htmlspecialchars($animal['especie'])); ?> • <?php echo htmlspecialchars($animal['raca'] ?: 'Sem raça'); ?> • <?php echo ucfirst(htmlspecialchars($animal['sexo'])); ?></p>
                        <p><?php echo !empty($animal['data_nascimento']) ? 'Nascimento: ' . date('d/m/Y', strtotime($animal['data_nascimento'])) : 'Data de nascimento não informada'; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
