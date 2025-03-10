<?php
require_once '../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function login($email, $senha) {
        // Usa o método getByEmail herdado de BaseModel
        $usuario = $this->usuarioModel->getByEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            return ['status' => 'success', 'message' => 'Login realizado com sucesso!'];
        }

        return ['status' => 'error', 'message' => 'Credenciais inválidas'];
    }
}
?>

