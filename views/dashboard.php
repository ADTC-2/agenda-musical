<?php
session_start();
require_once '../controllers/AuthController.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Definir tempo de expiração da sessão (30 minutos)
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

// Dados dos eventos (geralmente vindo do banco de dados)
$eventos = [
    ["dia" => "Sex", "data" => "15/03", "hora" => "18:00", "titulo" => "Culto de Louvor", "descricao" => "Ministério Jovem"],
    ["dia" => "Dom", "data" => "17/03", "hora" => "10:00", "titulo" => "Escola Dominical", "descricao" => "Ensino Bíblico"],
    ["dia" => "Qua", "data" => "20/03", "hora" => "19:30", "titulo" => "Culto de Oração", "descricao" => "Igreja Central"]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louvor - Agenda Musical</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="fas fa-home"></i></a>
                            </li>
                        </ul>
                        <!-- Botão de logout -->
                        <a href="../controllers/AuthController.php?action=logout" class="btn btn-light"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </nav>
        </div>

        <img src="../assets/img/logo.png" alt="Louvor - Agenda Musical" class="img-fluid" />

        <!-- Seção de eventos -->
        <div class="events">
            <?php foreach ($eventos as $evento): ?>
                <div class="event">
                    <div class="event-day"><?php echo $evento["dia"]; ?><br><span><?php echo $evento["data"]; ?></span><br><?php echo $evento["hora"]; ?></div>
                    <div class="event-info">
                        <div class="event-title"><?php echo $evento["titulo"]; ?></div>
                        <div class="event-desc"><?php echo $evento["descricao"]; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Menu inferior fixo -->
    <div class="menu-bottom">
        <a href="#" class="menu-item active"><i class="fas fa-calendar-alt"></i> Escalas</a>
        <a href="#" class="menu-item"><i class="fas fa-book"></i> Repertório</a>
        <a href="#" class="menu-item"><i class="fas fa-music"></i> Músicas</a>
        <a href="#" class="menu-item"><i class="fas fa-users"></i> Usuários</a>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap Bundle (com Popper) -->
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>