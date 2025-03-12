<?php
session_start();
require_once '../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function loginView() {
        require_once '../views/login.php';
    }

    public function login($email, $senha) {
        $usuario = $this->usuarioModel->autenticar($email, $senha);

        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            header('Location: ../views/dashboard.php'); // Redireciona para o dashboard
            exit();
        } else {
            $_SESSION['erro_login'] = 'E-mail ou senha incorretos.';
            header('Location: ../views/login.php'); // Retorna para o login com erro
            exit();
        }
    }

    public function logout() {
        session_start(); // Garante que a sessão foi iniciada
        session_unset();
        session_destroy();
        header('Location: ../views/login.php');
        exit();
    }

    public function verificarAutenticacao() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ../views/login.php');
            exit();
        }
    }
}

// Captura a ação e executa a função correspondente
if (isset($_GET['action'])) {
    $authController = new AuthController();

    if ($_GET['action'] === 'logout') {
        $authController->logout();
    } elseif ($_GET['action'] === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $authController->login($email, $senha);
    }
}