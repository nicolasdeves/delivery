<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - LaPorto</title>
    <link rel="icon" href="../../images/laporto-icon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header class="lora-font">
        <div class="top-bar">
            <div class="contact-info">
                <span><i class="fas fa-phone-alt"></i> +55 51 997023202</span>
                <span><i class="fas fa-envelope"></i> laporto@gmail.com.br</span>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="/"><u class="sublinhado">Início</u></a></li>
                <li><a href="/cardapio/burger">Cardápio</a></li>
                <li><a href="#">Delivery</a></li>
                <li><a href="#">Sobre nós</a></li>
            </ul>
        </nav>
    </header>

    <div class="container lora-font">
        <div class="menu">
            <div class="menu-item">
                <h3>Adicionar Item ao Cardápio</h3>
                <a href="adicionar-cardapio">Adicionar</a>
            </div>
            <div class="menu-item">
                <h3>Listar Itens do Cardápio</h3>
                <a href="lista-cardapio">Listar</a>
            </div>
            <div class="menu-item">
                <h3>Gerenciar Pedidos</h3>
                <a href="#">Pedidos</a>
            </div>
            <div class="menu-item">
                <h3>Gerenciar Usuários</h3>
                <a href="#">Usuários</a>
            </div>
            <div class="menu-item">
                <h3>Reserva de Mesas</h3>
                <a href="#">Mesas</a>
            </div>
            <!-- Caso necessário é só adicionar mais coisas -->
        </div>
    </div>

    <footer class="footer fixed-bottom">
        <div class="container d-flex justify-content-between align-items-center lora-font" style="padding: 0px 0;">
            <img src="../images/laporto.jpg" width="40px" height="40px" style="border-radius: 50px;" alt="Logo">
            <p>Copyright © 2024 <strong>LaPorto</strong>. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>