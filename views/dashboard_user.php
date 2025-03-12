<?php
session_start();

// Verifica se o usuário é comum
if ($_SESSION['usuario_tipo'] != 'usuario') {
    header('Location: login.php'); // Redireciona para login se não for usuário comum
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louvor - Agenda Musical</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/dashboard_user.css">
</head>

<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i class="fas fa-home"></i></a>
                            </li>
                        </ul>
                        <!-- Botão de logout -->
                        <a href="../controllers/AuthController.php?action=logout" class="btn btn-light"><i
                                class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Logo -->
        <img src="../assets/img/logo.png" alt="Louvor - Agenda Musical" class="img-fluid" />

        <!-- Seção de eventos -->
        <div class="events">
            <div class="event">
                <div class="event-day">
                    <div class="day">Sex</div>
                    <div class="date">07/03</div>
                    <div class="time">19:00</div>
                </div>
                <div class="event-info">
                    <div class="event-title">Culto de Doutrina</div>
                    <div class="event-desc">Domingo Sergio</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu inferior fixo para Usuário -->
    <div class="menu-bottom">
        <a href="#" class="menu-item" id="escalaMenu"><i class="fas fa-calendar-alt"></i> Escalas</a>
        <a href="#" class="menu-item" id="repertorioMenu"><i class="fas fa-book"></i> Repertório</a>
        <a href="#" class="menu-item" id="avisosMenu"><i class="fas fa-bell"></i> Avisos</a>
    </div>

    <script>
    // Seleciona todos os itens do menu
    const menuItems = document.querySelectorAll('.menu-item');

    // Adiciona o evento de clique em cada item
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove a classe 'active' de todos os itens
            menuItems.forEach(i => i.classList.remove('active'));

            // Adiciona a classe 'active' no item clicado
            this.classList.add('active');
        });
    });
    </script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

