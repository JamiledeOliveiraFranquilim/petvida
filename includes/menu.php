<?php
$usuarioLogado = isset($_SESSION['usuario_id']);
$tipoUsuario = $_SESSION['tipo_usuario'] ?? null;
?>
<nav class="main-nav">
    <div class="container nav-inner">
        <a href="/petvida/index.php" class="brand">PetVida</a>

        <div class="nav-links">
            <?php if (!$usuarioLogado): ?>
                <a href="/petvida/index.php">Home</a>
                <a href="/petvida/auth/login.php">Login</a>
                <a href="/petvida/auth/cadastro.php">Cadastro</a>
            <?php else: ?>
                <?php if ($tipoUsuario === 'tutor'): ?>
                    <a href="/petvida/tutor/dashboard.php">Dashboard</a>
                    <a href="/petvida/tutor/meus_animais.php">Meus animais</a>
                    <a href="/petvida/tutor/agendamentos.php">Agendamentos</a>
                    <a href="/petvida/tutor/carteira_vacinacao.php">Carteira</a>
                    <a href="/petvida/tutor/avisos.php">Avisos</a>
                <?php elseif ($tipoUsuario === 'veterinario'): ?>
                    <a href="/petvida/veterinario/dashboard.php">Dashboard</a>
                    <a href="/petvida/veterinario/agenda.php">Agenda</a>
                    <a href="/petvida/veterinario/prontuario.php">Prontuário</a>
                    <a href="/petvida/veterinario/vacinas.php">Vacinas</a>
                    <a href="/petvida/veterinario/prescricoes.php">Prescrições</a>
                <?php elseif ($tipoUsuario === 'admin'): ?>
                    <a href="/petvida/admin/dashboard.php">Dashboard</a>
                    <a href="/petvida/admin/usuarios.php">Usuários</a>
                    <a href="/petvida/admin/veterinarios.php">Veterinários</a>
                    <a href="/petvida/admin/servicos.php">Serviços</a>
                    <a href="/petvida/admin/avisos.php">Avisos</a>
                    <a href="/petvida/admin/relatorios.php">Relatórios</a>
                <?php endif; ?>
                <a href="/petvida/auth/logout.php">Sair</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
