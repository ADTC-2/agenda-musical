<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login
    header('Location: /agenda_musical/views/login.php');
    exit();
}

// Se estiver logado, carrega a aplicação
require_once '../config/config.php';
require_once '../routes/web.php';
