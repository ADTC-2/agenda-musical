<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../views/login.php');
    exit();
}

// Definindo o ano padrão ou o ano selecionado pelo usuário
$anoSelecionado = isset($_GET['ano']) ? (int)$_GET['ano'] : 2025; // Padrão é 2025
$anosDisponiveis = range(2020, 2030); // Definir um intervalo de anos disponíveis

// Meses do ano
$meses = [
    'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escalas <?php echo $anoSelecionado; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/dashboard_user.css">
    <link rel="stylesheet" href="../../assets/css/escalas/escalas.css">

    <style>
        /* Estilo para o botão de logout fora da navbar */
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Botão de Logout FORA da navbar -->
        <a href="../controllers/AuthController.php?action=logout" class="btn btn btn-light logout-btn">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>

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
                    </div>
                </div>
            </nav>
        </div>

        <!-- Logo -->
        <img src="../assets/img/logo.png" alt="Louvor - Agenda Musical" class="img-fluid" />

        <!-- Seção de Repertório -->
        <div class="repertorio-section">
            <h3>Escalas <?php echo $anoSelecionado; ?></h3>

            <!-- Formulário para seleção do ano -->
            <form action="" method="get" class="form-inline mb-4">
                <label for="ano" class="me-2">Selecione o ano:</label>
                <select name="ano" id="ano" class="form-select w-auto" onchange="this.form.submit()">
                    <?php foreach ($anosDisponiveis as $ano): ?>
                        <option value="<?php echo $ano; ?>" <?php echo $ano == $anoSelecionado ? 'selected' : ''; ?>><?php echo $ano; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>

            <!-- Exibindo os meses do ano selecionado -->
            <div class="meses-lista">
                <ul>
                    <?php foreach ($meses as $mes): ?>
                        <li><strong><?php echo $mes; ?></strong></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Menu inferior fixo para Admin -->
    <div class="menu-bottom">
        <a href="../views/escalas/index.php" class="menu-item" id="escalaMenu"><i class="fas fa-calendar-alt"></i> Escalas</a>
        <a href="#" class="menu-item" id="repertorioMenu"><i class="fas fa-book"></i> Repertório</a>
        <a href="#" class="menu-item" id="musicasMenu"><i class="fas fa-music"></i> Músicas</a>
        <a href="#" class="menu-item" id="usuariosMenu"><i class="fas fa-users"></i> Usuários</a>
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
