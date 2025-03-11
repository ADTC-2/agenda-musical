<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /agenda_musical/views/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h1>
    <p>Você está logado como <?php echo $_SESSION['usuario_tipo']; ?>.</p>
    <a href="/agenda_musical/controllers/AuthController.php?action=logout">Sair</a>
</body>
</html>