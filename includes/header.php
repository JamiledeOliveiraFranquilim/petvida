<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'PetVida'; ?></title>
    <link rel="stylesheet" href="/petvida/assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>
