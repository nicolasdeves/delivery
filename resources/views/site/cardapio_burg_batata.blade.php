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
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-cardapio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    @include('templates.header')

    <div class="container">
        <div class="sidebar">
            <div class="categorias">
                <h2 class="shadows-into-light-regular">Categorias</h2>
                <div class="botoes lora-font">
                    <a href="{{ route('cardapio_burg') }}"><button><i
                                class="fas fa-hamburger"></i>&nbsp;Burgs</button></a>
                    <a href="#"><button class="active"><i class="fas fa-hamburger"></i>&nbsp;Burgs com
                            Batata</button> </a>
                    <a href="{{ route('cardapio_entrada') }}"><button><i
                                class="fa-solid fa-bacon"></i>&nbsp;Entradas</button></a>
                    <a href="{{ route('cardapio_rango') }}"><button><i
                                class="fa-solid fa-drumstick-bite"></i>&nbsp;Rangos</button></a>
                    <a href="{{ route('cardapio_drink') }}"><button><i
                                class="fa-solid fa-martini-glass-citrus"></i>&nbsp;Drinks</button></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="posts lora-font">
                <div class="row">
                    <div class="post ">
                        <img src="../images/hamburguer2.jpg" alt="">
                        <h3>Hamburguer Pão e Ovo com 100g de Batata Frita</h3>
                        <p>O hamburguer possui ovo, queijo, bacon, picles, molho especial, cebola roxa e 140g de carne
                            bovina.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post ">
                        <img src="../images/hamburguer2.jpg" alt="">
                        <h3>Hamburguer Pão e Ovo com 100g de Batata Frita</h3>
                        <p>O hamburguer possui ovo, queijo, bacon, picles, molho especial, cebola roxa e 140g de carne
                            bovina.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post ">
                        <img src="../images/hamburguer2.jpg" alt="">
                        <h3>Hamburguer Pão e Ovo com 100g de Batata Frita</h3>
                        <p>O hamburguer possui ovo, queijo, bacon, picles, molho especial, cebola roxa e 140g de carne
                            bovina.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="post ">
                        <img src="../images/hamburguer2.jpg" alt="">
                        <h3>Hamburguer Pão e Ovo com 100g de Batata Frita</h3>
                        <p>O hamburguer possui ovo, queijo, bacon, picles, molho especial, cebola roxa e 140g de carne
                            bovina.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('templates.footer')
</body>

</html>
