
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA World Cup 2026 - Official Portal</title>
    
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <style>
        :root {
            --1: #004d98; /* Azul FIFA */
            --2: #ffffff;
            --dark: #0b0e14;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--dark);
            color: white;
            overflow-x: hidden;
        }

        .hero-section {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://digitalhub.fifa.com/transform/4e245a4b-9e4f-4a3a-9e3a-9e3a9e3a9e3a/FIFA-World-Cup-2026-Logo-Reveal'); /* Placeholder para imagem da Copa */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-content h1 {
            font-size: 5rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -2px;
            margin-bottom: 20px;
            text-shadow: 2px 4px 10px rgba(0,0,0,0.5);
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            font-weight: 400;
            opacity: 0.9;
        }

        .btn-fifa {
            background-color: var(--1);
            color: white;
            padding: 15px 40px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            margin: 10px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-fifa:hover {
            background-color: transparent;
            border-color: var(--2);
            color: white;
            transform: translateY(-5px);
            padding: 15px 60px;
        }

        .btn-fifa-outline {
            background-color: transparent;
            color: white;
            padding: 15px 40px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 50px;
            border: 2px solid var(--2);
            transition: all 0.3s ease;
            margin: 10px;
            text-decoration: none;
            display: inline-block;
        
        }

        .btn-fifa-outline:hover {
            background-color: var(--2);
            color: var(--primary-color);
            transform: translateY(-5px);
            color: var(--dark);
            padding: 15px 60px;
        }

        .features {
            padding: 100px 0;
            background-color: #1a1e26;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 20px;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-10px);
        }

        .feature-card i {
            font-size: 3rem;
            color: var(--1);
            margin-bottom: 20px;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8) !important;
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.8rem;
            color: white !important;
        }

        .footer {
            padding: 50px 0;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    
    </style>


</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">FIFA<span style="color: var(--primary-color);">26</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Sistema/View/Users/list.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sistema/View/Teams/listar.php">Seleções</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="Sistema/View/Games/listarJogos.php">Jogos</a>
                    </li>
                     <li class="nav-item">
                       <a class="nav-link" href="Sistema/View/Games/classificacaoGeral.php">Classificação Geral</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>COPA  26</h1>
                <p>Sistema de gerenciamento de Jogos</p>
                <div class="cta-buttons">
                    <a href="Sistema/View/Users/create.php" class="btn-fifa">
                        <i class="fas fa-user-plus me-2"></i>Registrar Usuário
                    </a>
                    <a href="Sistema/View/Games/listarJogos.php" class="btn-fifa-outline">
                        <i class="fas fa-game"></i>Ver Jogos
                    </a>
                </div>
            </div>
        </div>
    </header>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 FIFA World Cup Project - Desenvolvido </p>
            <div class="social-links mt-3">
               
                <a href="https://github.com/Vtr-Cardoso69/FIFA-26" class="text-white me-3"><i class="fab fa-github"></i></a>
            
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
