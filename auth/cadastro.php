<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

$sucesso = null;
$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = trim($_POST['telefone'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $tipoUsuario = $_POST['tipo'] ?? 'tutor';

    if ($nome && $email && $senha) {
        try {
            $verifica = $pdo->prepare('SELECT id FROM petvida_usuarios WHERE email = :email LIMIT 1');
            $verifica->execute([':email' => $email]);

            if ($verifica->fetch()) {
                $erro = 'Este e-mail já está cadastrado.';
            } else {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $sql = 'INSERT INTO petvida_usuarios (nome, email, senha, telefone, tipo) VALUES (:nome, :email, :senha, :telefone, :tipo)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $hash,
                    ':telefone' => $telefone,
                    ':tipo' => $tipoUsuario,
                ]);

                $sucesso = 'Cadastro realizado com sucesso! Faça login para continuar.';
                $_POST = [];
            }
        } catch (PDOException $e) {
            $erro = 'Erro ao cadastrar usuário. Verifique os dados e tente novamente.';
        }
    } else {
        $erro = 'Preencha todos os campos obrigatórios.';
    }
}

$pageTitle = 'PetVida | Cadastro';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="card form-card">
            <h2>Criar conta</h2>

            <?php if ($sucesso): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($sucesso); ?></div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" placeholder="(11) 99999-9999">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de usuário</label>
                    <select id="tipo" name="tipo">
                        <option value="tutor">Tutor</option>
                        <option value="veterinario">Veterinário</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <button type="submit">Cadastrar</button>
            </form>

            <p style="margin-top: 16px; text-align: center;">
                Já possui conta?
                <a href="/petvida/auth/login.php">Entrar</a>
            </p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
