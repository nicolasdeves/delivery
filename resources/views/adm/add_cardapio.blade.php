<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="icon" href="../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-adicionar.css">
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
                <li><a href="{{ route('cardapio_burg') }}"><u class="sublinhado">Cardápio</u></a></li>
                <li><a href="{{ route('delivery')}}">Delivery</a></li>
                <li><a href="{{ route('sobre_nos') }}">Sobre nós</a></li>
            </ul>
        </nav>
    </header>

    <div class="container-add">
        <div class="form-container lora-font">
            <h2 class="shadows-into-light-regular">Cadastro de Comidas</h2>
            <!-- Ver se funciona o php-->
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<p class="success-message">Post cadastrado com sucesso!</p>';
            }
            ?>
            <form method="POST" action="{{ route('produto.adicionar') }}" enctype="multipart/form-data">

                @csrf

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="nome" required>

                <label for="conteudo">Descrição:</label>
                <textarea id="conteudo" name="descricao" rows="4" required></textarea>

                <label for="preco">Preço:</label>
                <textarea id="preco" name="preco" required></textarea>

                <label for="opcao">Tipo:</label>
                <select name="tipo_produto_id" id="opcoes">
                    <option value="1">Hamburguer</option>
                    <option value="2">Hamburguer com Fritas</option>
                    <option value="3">Entrada</option>
                    <option value="4">Rangos</option>
                    <option value="5">Drinks</option>
                </select>

                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*" required>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>












    <footer class="footer fixed-bottom">
        <div class="container d-flex justify-content-between align-items-center lora-font">
            <img src="../images/laporto.jpg" width="40px" height="40px" style="border-radius: 50px;" alt="Logo">
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