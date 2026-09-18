<?php
require_once __DIR__ . '/../auth/verifica_sessao.php';
require_once __DIR__ . '/../config/conexao.php';
verificarSessao('tutor');

$erro = null;
$sucesso = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $especie = $_POST['especie'] ?? '';
    $raca = trim($_POST['raca'] ?? '');
    $sexo = $_POST['sexo'] ?? '';
    $dataNascimento = $_POST['data_nascimento'] ?? null;

    if ($nome === '' || !in_array($especie, ['cachorro', 'gato'], true) || !in_array($sexo, ['macho', 'femea'], true)) {
        $erro = 'Preencha nome, espécie e sexo corretamente.';
    } else {
        $fotoNome = null;

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
                $erro = 'Erro ao enviar a foto do animal.';
            } else {
                $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

                if (!in_array($extensao, $permitidas, true)) {
                    $erro = 'Formato de foto inválido. Use JPG, JPEG, PNG ou WEBP.';
                } else {
                    $tamanhoMaximo = 2 * 1024 * 1024;
                    if ($_FILES['foto']['size'] > $tamanhoMaximo) {
                        $erro = 'A foto deve ter no máximo 2MB.';
                    } else {
                        $pastaDestino = __DIR__ . '/../assets/img/animais';
                        if (!is_dir($pastaDestino)) {
                            mkdir($pastaDestino, 0777, true);
                        }

                        $fotoNome = 'animal_' . time() . '_' . uniqid() . '.' . $extensao;
                        $destino = $pastaDestino . '/' . $fotoNome;

                        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
                            $erro = 'Não foi possível salvar a foto do animal.';
                        }
                    }
                }
            }
        }

        if (!$erro) {
            try {
                $sql = 'INSERT INTO petvida_animais (tutor_id, nome, especie, raca, sexo, data_nascimento, foto) VALUES (:tutor_id, :nome, :especie, :raca, :sexo, :data_nascimento, :foto)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':tutor_id' => $_SESSION['usuario_id'],
                    ':nome' => $nome,
                    ':especie' => $especie,
                    ':raca' => $raca,
                    ':sexo' => $sexo,
                    ':data_nascimento' => $dataNascimento ?: null,
                    ':foto' => $fotoNome,
                ]);

                $sucesso = 'Animal cadastrado com sucesso!';
                header('Location: /petvida/tutor/meus_animais.php?sucesso=1');
                exit;
            } catch (PDOException $e) {
                $erro = 'Erro ao cadastrar animal. Tente novamente.';
            }
        }
    }
}

$pageTitle = 'PetVida | Cadastrar animal';
include __DIR__ . '/../includes/header.php';
?>

<main class="page-content">
    <div class="container">
        <div class="card form-card">
            <h2>Cadastrar animal</h2>

            <?php if ($erro): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($erro); ?></div>
            <?php endif; ?>

            <?php if ($sucesso): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($sucesso); ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="especie">Espécie</label>
                    <select id="especie" name="especie" required>
                        <option value="">Selecione</option>
                        <option value="cachorro">Cachorro</option>
                        <option value="gato">Gato</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" id="raca" name="raca" placeholder="Ex: Labrador, Persa...">
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecione</option>
                        <option value="macho">Macho</option>
                        <option value="femea">Fêmea</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="form-group">
                    <label for="foto">Foto do animal</label>
                    <input type="file" id="foto" name="foto" accept="image/*">
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
