<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de endereço</title>
    <link rel="stylesheet" href="{{ asset('css/style-endereco.css') }}">
    <link rel="icon" href="../../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h1 class="text-center shadows-into-light-regular mb-4">Registrar Endereço</h1>
                    <form action="{{ route('registro-endereco') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cep" class="form-label lora-font">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" required>
                        </div>
                        <div class="mb-3">
                            <label for="rua" class="form-label lora-font">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite o nome da rua" required>
                        </div>
                        <div class="mb-3">
                            <label for="bairro" class="form-label lora-font">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label lora-font">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o número" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 lora-font">Adicionar Endereço</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>