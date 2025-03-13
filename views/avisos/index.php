<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário é admin ou regente
if (!isset($_SESSION['usuario_tipo']) || ($_SESSION['usuario_tipo'] !== 'admin' && $_SESSION['usuario_tipo'] !== 'regente')) {
    header('Location: login.php');
    exit();
}

$anoSelecionado = date('Y'); // Garante que $anoSelecionado tenha um valor padrão
$eventos = array_fill(0, 6, ['mes' => 'Março', 'status' => 'Finalizado']); // Simulação de eventos
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escalas</title>
    
    <!-- CSS -->
    <!-- Carregar o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Preload da fonte (apenas se necessário) -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">

    <!-- Carregar o Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Carregar o favicon -->
    <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">

    <!-- Carregar o CSS personalizado -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            justify-content: center;
            align-items: center;
            max-width: 500px;
            margin: 50px auto;
        }
        .card {
            background-color: #dc3545;
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card i {
            font-size: 40px;
            margin-bottom: 10px;
        }   
    </style>  
</head>

<body>
    <header class="header">
        <nav class="navbar bg-white shadow-sm fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Abrir menu"
                    style="border: none; outline: none; box-shadow: none;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Agenda Musical</a>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="menuLateral">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="menuLateral">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link active" href="../views/dashboard.php">
                                    <i class="fas fa-home"></i> Início
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/AuthController.php?action=logout">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <!-- Logo -->
        <div class="text-center">
            <img src="../../assets/img/logo_vermelho.png" alt="Louvor - Agenda Musical" class="img-fluid" id="logo_vermelho">
        </div>

        <!-- Seção de eventos -->
        <section class="events">
            <div class="card-container">
                <div class="card">
                    <i class="fas fa-plus-circle"></i>
                    <h3>Cadastro</h3>
                </div>
                <div class="card">
                    <i class="fas fa-search"></i>
                    <h3>Pesquisa</h3>
                </div>
                <div class="card">
                    <i class="fas fa-edit"></i>
                    <h3>Alteração</h3>
                </div>
                <div class="card">
                    <i class="fas fa-trash"></i>
                    <h3>Excluir</h3>
                </div>
            </div>
        </section>

    </main>

    <!-- Menu inferior fixo para Admin e Regente -->
    <footer class="menu-bottom">
        <nav>
            <a href="../escalas/index.php" class="menu-item" aria-label="Escalas">
                <i class="fas fa-calendar-alt"></i> Escalas
            </a>
            <a href="../repertorio/index.php" class="menu-item" aria-label="Repertório">
                <i class="fas fa-book"></i> Repertório
            </a>
            
            <?php if ($_SESSION['usuario_tipo'] === 'admin') : ?>
                <a href="../musicas/index.php" class="menu-item" aria-label="Músicas">
                    <i class="fas fa-music"></i> Músicas
                </a>
                <a href="../usuarios/index.php" class="menu-item" aria-label="Usuários">
                    <i class="fas fa-users"></i> Usuários
                </a>
            <?php endif; ?>

            <a href="../avisos/index.php" class="menu-item" aria-label="Avisos">
                <i class="fas fa-bell"></i> Avisos
            </a>
        </nav>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/evento_de_click.js"></script>
</body>
</html>
 