<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - LaPorto</title>
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

    @include('templates.header')

    <div class="container text-center mt-5">
        <h1 class="shadows-into-light-regular">LaPorto</h1>

        <p class="mt-3 pj lora-font">Bem-vindo ao LaPorto, onde tradição e inovação se encontram para proporcionar a
            você uma experiência única! Descubra nossa hamburgueria artesanal, onde cada mordida é uma explosão de sabor
            e saboreie nossos drinks exclusivos no pub mais animado da cidade. No LaPorto, o prazer e a elegância
            caminham juntos para fazer do seu momento algo inesquecível!</p>
        <div class="row ms-5 lora-font">
            <div class="col">
                <div class="card-container">
                    <div class="image-placeholder">
                        <img src="../images/hamburguer1.jpg" class="img-fluid" alt="Hamburguer Image">
                    </div>
                    <div class="card-content">
                        <h3>Cardápio</h3>
                        <p>Conheça as variedades que temos para você.</p>
                        <a href="{{ route('cardapio') }}" class="learn-more">Ver Cardápio <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-container">
                    <div class="image-placeholder">
                        <img src="../../images/hamburguer2.jpg" alt="Hamburguer Image">
                    </div>
                    <div class="card-content">
                        <h3>Delivery</h3>
                        <p>Faça o seu pedido e deguste ele no conforto de sua casa.</p>
                        <a href="{{ route('inicio-delivery') }}" class="learn-more">Delivery <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-container">
                    <div class="image-placeholder">
                        <img src="../images/hamburguer3.jpg" alt="Hamburguer Image">
                    </div>
                    <div class="card-content">
                        <h3>Sobre nós</h3>
                        <p>Conheça um pouco mais sobre nossa história.</p>
                        <a href="{{ route('sobre_nos') }}" class="learn-more">Sobre nós <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-text-wrapper container">
        <div class="text-section lora-font pj text-center">
            <h2 class="shadows-into-light-regular pj">Visite-nos no LaPorto!</h2>
            <p class="pj">Descubra o ambiente incrível de nossa hamburgueria, pub e barbearia. Estamos localizados em um ponto de
                fácil acesso, esperando por você para uma experiência inesquecível. Clique no mapa para ver a rota
                completa.</p>
        </div>
        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.4318922577872!2d-51.95234482453159!3d-29.445396303756503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951c61e69ae6577f%3A0x302ae6688fe9fa12!2sLaPorto!5e0!3m2!1spt-BR!2sbr!4v1725389007331!5m2!1spt-BR!2sbr"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    @include('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>