<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - LaPorto</title>
    <link rel="icon" href="../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-cardapio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
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
            <li><a href="{{ route('inicio') }}">Início</a></li>
            <li><a href="{{ route('cardapio_burg') }}"><u class="sublinhado">Cardápio</u></a></li>
            <li><a href="{{ route('delivery')}}">Delivery</a></li>
            <li><a href="{{ route('sobre_nos') }}">Sobre nós</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="categorias">
                <h2 class="shadows-into-light-regular">Categorias</h2>
                <div class="botoes lora-font">
                    <a href="{{ route('cardapio_burg') }}"><button><i class="fas fa-hamburger"></i>&nbsp;Burgs</button></a>
                    <a href="{{ route('cardapio_burg_batata') }}"><button><i class="fas fa-hamburger"></i>&nbsp;Burgs com Batata</button> </a>
                    <a href="#"><button class="active"><i class="fa-solid fa-bacon"></i>&nbsp;Entradas</button></a>
                    <a href="{{ route('cardapio_rango') }}"><button><i class="fa-solid fa-drumstick-bite"></i>&nbsp;Rangos</button></a>
                    <a href="{{ route('cardapio_drink') }}"><button><i class="fa-solid fa-martini-glass-citrus"></i>&nbsp;Drinks</button></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="posts lora-font">
                <div class="row">
                    <div class="post ">
                        <img src="../images/batata1.jpg" alt="">
                        <h3>Porção de Fritas</h3>
                        <p>300g de batata frita, acompanhado com ketchup e maionese, temperada com alho.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post">
                        <img src="../images/batata2.jpg" alt="">
                        <h3>Fritas com Cheddar e Bacon</h3>
                        <p>400g de batata frita, banhadas ao cheddar juntamente com pedaços de bacon e temperos.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post">
                        <img src="../images/batata3.jpg" alt="">
                        <h3>Fritas com Cheddar e Bacon</h3>
                        <p>500g de batata frita, banhadas ao cheddar juntamente com pedaços de bacon e temperos.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post">
                        <img src="../images/batata2.jpg" alt="">
                        <h3>Hamburguer Pão e Ovo</h3>
                        <p>O hamburguer possui ovo, queijo, bacon, picles, molho especial, cebola roxa e 140g de carne bovina.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container d-flex justify-content-between align-items-center lora-font" style="padding: 0px 0;"> <img src="../images/laporto.jpg" width="40px" height="40px" style="border-radius: 50px;" alt="Logo">
            <p>Copyright © 2024 <strong>LaPorto</strong>. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>