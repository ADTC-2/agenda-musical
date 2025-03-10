<?php
require_once '../controllers/UsuarioController.php';
require_once '../controllers/CultoController.php';
require_once '../controllers/MusicaController.php';
require_once '../controllers/RepertorioController.php';
require_once '../controllers/EscalaController.php';
require_once '../controllers/AuthController.php';

// Exemplo de rota
$router->get('/', function() {
    require_once '../views/dashboard.php';
});

// Rota para o login
$router->post('/login', function() {
    $authController = new AuthController();
    $authController->login($_POST['email'], $_POST['senha']);
});
?>