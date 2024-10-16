<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - LaPorto</title>
    <link rel="icon" href="../../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('inicio') }}">Início</a></li>
                <li><a href="{{ route('cardapio_burg') }}">Cardápio</a></li>
                <li><a href="{{ route('delivery')}}">Delivery</a></li>
                <li><a href="{{ route('sobre_nos') }}"><u class="sublinhado">Sobre nós</u></a></li>
            </ul>
        </nav>
    </header>

    <div class="map-sobre-nos container">
        <div class="text-section lora-font">
            <h2 class="shadows-into-light-regular pj" style="margin-left: 90px;">Quem somos?</h2>
            <p class="pj">A Hamburgueria La Porto, localizada em Lajeado - RS, é um pub que oferece uma experiência
                diferenciada
                para quem busca um ambiente descontraído durante a noite. Além de um cardápio variado de hambúrgueres
                artesanais, a La Porto também conta com serviço de delivery e uma seleção especial de drinks,
                proporcionando momentos únicos tanto para quem visita o local quanto para quem opta pelo conforto de
                casa.</p>
        </div>
        <div class="imagem-sobre-nos">
            <img src="../images/sobre-nos.jpg" alt="Imagem Laporto" width="500" height="300">
        </div>
    </div>

    <div class="map-sobre-nos container">
        <div class="imagem-sobre-nos2">
            <img src="../images/entrada-laporto.jpeg" alt="Imagem Laporto" height="400">
        </div>

        <div class="text-section lora-font">
            <h2 class="shadows-into-light-regular pj" style="margin-left: 90px;">Nossa História</h2>
            <p class="pj">A Hamburgueria La Porto, localizada em Lajeado - RS, é um ponto de encontro popular na cidade,
                oferecendo um ambiente descontraído e acolhedor durante as noites. Fundada com o intuito de trazer uma
                experiência única de pub para a região, o La Porto rapidamente se tornou conhecido por seus hambúrgueres
                artesanais, drinks exclusivos e serviço de delivery, ideal para quem busca conforto sem sair de casa.</p>

            <p class='pj'>O La Porto combina a autenticidade de um pub clássico com um toque moderno, criando um espaço perfeito
                tanto para quem deseja aproveitar a noite com amigos quanto para quem busca uma refeição saborosa no
                conforto de sua casa. Desde sua abertura, o estabelecimento vem cativando o público com seu cardápio
                variado e o ambiente vibrante, que faz jus ao título de pub.</p>
        </div>

    </div>

    <footer class="footer">
        <div class="container d-flex justify-content-between align-items-center lora-font"> <img
                src="../images/laporto.jpg" width="40px" height="40px" style="border-radius: 50px;" alt="Logo">
            <p>Copyright © 2024 <strong>LaPorto</strong>. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>