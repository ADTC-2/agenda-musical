<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php'); // Redireciona se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Bem-vindo, <?= $_SESSION['usuario_nome']; ?>!</h2>
                <p class="text-center">Você está logado como <?= $_SESSION['usuario_tipo']; ?>.</p>
                <a href="routes/web.php?action=logout" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </div>
</body>
</html>