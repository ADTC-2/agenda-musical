<?php
session_start();
require_once '../controllers/AuthController.php';

$authController = new AuthController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $result = $authController->login($email, $senha);
        if ($result['status'] === 'success') {
            header('Location: ../views/dashboard.php');
        } else {
            $_SESSION['erro'] = $result['message'];
            header('Location: ../views/login.php');
        }
        break;

    case 'logout':
        $authController->logout();
        break;

    default:
        header('Location: ../views/login.php');
        break;
}
?>