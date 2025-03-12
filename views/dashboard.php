<?php
ob_start(); // Inicia o buffer de saída


session_start();

// Definir constantes para URLs
define('LOGIN_URL', '../views/login.php');
define('AUTH_CONTROLLER_URL', '../controllers/AuthController.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ' . LOGIN_URL);
    exit();
}

// Impede o cacheamento da página
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Inclui o header
require_once __DIR__ . '/partials/header.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome'], ENT_QUOTES, 'UTF-8'); ?>!</h1>
    <p>Você está logado como <?php echo htmlspecialchars($_SESSION['usuario_tipo'], ENT_QUOTES, 'UTF-8'); ?>.</p>
    <a href="/agenda_musical/controllers/AuthController.php?action=logout">Sair</a>

</body>
</html>
<?php
ob_end_flush(); // Envia o buffer de saída e desativa o buffer