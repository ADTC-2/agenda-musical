<?php
require_once 'BaseModel.php';

class Usuario extends BaseModel {
    public function __construct() {
        parent::__construct('usuarios'); // Nome da tabela no banco de dados
    }
}
?>

