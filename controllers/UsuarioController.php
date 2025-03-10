<?php
require_once 'BaseController.php';
require_once '../models/Usuario.php';

class UsuarioController extends BaseController {
    public function __construct() {
        parent::__construct(new Usuario());
    }
}
?>

