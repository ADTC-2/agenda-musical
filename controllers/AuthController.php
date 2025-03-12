<?php
// controllers/AuthController.php

session_start();
require_once '../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function run() {
        // Verifica qual ação foi passada na URL (ex: /?action=logout)
        if (isset($_GET['action']) && $_GET['action'] === 'logout') {
            $this->logout();
        } else {
            // Exibe a página de login se não houver ação de logout
            $this->loginView();
        }
    }

    // Função para exibir a página de login
    public function loginView() {
        require_once '../views/login.php';
    }

    // Função para realizar o login
    public function login($email, $senha) {
        $usuario = $this->usuarioModel->autenticar($email, $senha);

        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            return [
                'status' => 'success',
                'message' => 'Login bem-sucedido!'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'E-mail ou senha incorretos.'
            ];
        }
    }

    // Função para realizar o logout
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }

    // Função para verificar se o usuário está autenticado
    public function verificarAutenticacao() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /login');
            exit();
        }
    }
}
?>