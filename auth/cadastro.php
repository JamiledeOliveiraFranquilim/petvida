<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

$sucesso = null;
$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $tipoUsuario = $_POST['tipo_usuario'] ?? 'tutor';

    if ($nome && $email && $senha) {
        try {
            $verifica = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email LIMIT 1');
            $verifica->execute([':email' => $email]);

            if ($verifica->fetch()) {
                $erro = 'Este e-mail já está cadastrado.';
            } else {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $sql = 'INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $hash,
                    ':tipo_usuario' => $tipoUsuario,
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
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <label for="tipo_usuario">Tipo de usuário</label>
                    <select id="tipo_usuario" name="tipo_usuario">
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
