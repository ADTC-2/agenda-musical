<?php
require_once '../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login($email, $senha) {
        $usuario = $this->usuarioModel->getByEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            return ['status' => 'success', 'message' => 'Login realizado com sucesso!'];
        }

        return ['status' => 'error', 'message' => 'Credenciais inválidas'];
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: /agenda_musical/views/login.php');
        exit();
    }
}

// Verifica se a ação de logout foi solicitada
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $authController = new AuthController();
    $authController->logout();
}
?>

