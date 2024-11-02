<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="#burgs"><button class="active"><i class="fas fa-hamburger"></i>&nbsp;Burgs</button></a>
                    <a href="#burgsBatata"><button><i class="fas fa-hamburger"></i>&nbsp;Burgs com
                            Batata</button> </a>
                    <a href="#entradas"><button><i class="fa-solid fa-bacon"></i>&nbsp;Entradas</button></a>
                    <a href="#rangos"><button><i class="fa-solid fa-drumstick-bite"></i>&nbsp;Rangos</button></a>
                    <a href="#drinks"><button><i class="fa-solid fa-martini-glass-citrus"></i>&nbsp;Drinks</button></a>
                </div>
            </div>
        </div>
        <div class="content">

            {{-- BURGS --}}
            <h1 id="burgs" class="lora-font" style="font-weight:bold;">Burgs</h1>
            <div class="posts lora-font">
                @foreach ($burgs as $item)
                    <div class="row">
                        <div class="post ">
                            <img src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ asset('storage/' . $item->imagem) }}">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p class="preco_produto" style="display:inline;">
                                {{ 'R$' . number_format($item->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>



            {{-- BURGS COM BATATA --}}
            <h1 id="burgsBatata" class="lora-font" style="font-weight:bold;">Burgs com Batata</h1>
            <div class="posts lora-font">
                @foreach ($burgsComBatata as $item)
                    <div class="row">
                        <div class="post ">
                            <img src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ asset('storage/' . $item->imagem) }}">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p class="preco_produto" style="display:inline;">
                                {{ 'R$' . number_format($item->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>



            {{-- ENTRADAS --}}
            <h1 id="entradas" class="lora-font" style="font-weight:bold;">Entradas</h1>
            <div class="posts lora-font">
                @foreach ($entradas as $item)
                    <div class="row">
                        <div class="post ">
                            <img src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ asset('storage/' . $item->imagem) }}">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p class="preco_produto" style="display:inline;">
                                {{ 'R$' . number_format($item->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>


            {{-- RANGOS --}}
            <h1 id="rangos" class="lora-font" style="font-weight:bold;">Rangos</h1>
            <div class="posts lora-font">
                @foreach ($rangos as $item)
                    <div class="row">
                        <div class="post ">
                            <img src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ asset('storage/' . $item->imagem) }}">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p class="preco_produto" style="display:inline;">
                                {{ 'R$' . number_format($item->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>



            {{-- DRINKS --}}
            <h1 id="drinks" class="lora-font" style="font-weight:bold;">Drinks</h1>
            <div class="posts lora-font">
                @foreach ($drinks as $item)
                    <div class="row">
                        <div class="post ">
                            <img src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ asset('storage/' . $item->imagem) }}">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p class="preco_produto" style="display:inline;">
                                {{ 'R$' . number_format($item->preco, 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>




    @include('templates.footer')

</body>

</html>
