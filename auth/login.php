<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if ($email && $senha) {
        try {
            $sql = 'SELECT id, nome, email, senha, tipo FROM petvida_usuarios WHERE email = :email LIMIT 1';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = (int) $usuario['id'];
                $_SESSION['nome_usuario'] = $usuario['nome'];
                $_SESSION['tipo_usuario'] = $usuario['tipo'];

                if ($usuario['tipo'] === 'admin') {
                    header('Location: /petvida/admin/dashboard.php');
                } elseif ($usuario['tipo'] === 'veterinario') {
                    header('Location: /petvida/veterinario/dashboard.php');
                } else {
                    header('Location: /petvida/tutor/dashboard.php');
                }
                exit;
            }

            $erro = 'E-mail ou senha inválidos.';
        } catch (PDOException $e) {
            $erro = 'Erro ao tentar fazer login. Tente novamente mais tarde.';
        }
    } else {
        $erro = 'Preencha e-mail e senha.';
    }
}

$pageTitle = 'PetVida | Login';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="card form-card">
            <h2>Entrar</h2>

            <?php if ($erro): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <button type="submit">Entrar</button>
            </form>

            <p style="margin-top: 16px; text-align: center;">
                Ainda não tem conta?
                <a href="/petvida/auth/cadastro.php">Cadastre-se</a>
            </p>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
