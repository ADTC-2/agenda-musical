<?php
require_once 'BaseModel.php';

class Usuario extends BaseModel {
    public function __construct() {
        parent::__construct('usuarios'); // Nome da tabela no banco de dados
    }

    // Função para autenticar o usuário
    public function autenticar($email, $senha) {
        $usuario = $this->getByEmail($email);
        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario; // Retorna os dados do usuário autenticado
        }
        return false; // Retorna falso se as credenciais forem inválidas
    }
}
?>