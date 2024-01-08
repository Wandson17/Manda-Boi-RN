<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Mapa de Senhas</title>
    <style>
        .senha-grid {
            display: grid;
            grid-template-columns: repeat(15, 1fr); /* 10 colunas no grid */
            gap: 5px;
            margin: 0;
            padding: 0;
        }

        .senha {
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border: 1px solid #ddd;
            margin: 0;
            padding: 0;
        }

        .senha-comprada {
            background-color: red;
            color: white;
        }

        .senha-selecionada {
            background-color: green;
            color: white;
        }

    </style>
</head>
<body>

    <input type="hidden" id="inputSenhaSelecionada" name="senha_selecionada">

<div class="container mt-4">
    <h2 class="mb-3">Mapa de Senhas</h2>

    <div class="row mx-0">
        <div class="senha-grid">
            @for ($i = 1; $i <= 100; $i++)
                {{-- <div class="senha {{ in_array($i, $senhasCompradas) ? 'senha-comprada' : '' }}"> --}}
                <div class="senha @if($i == 9) senha-comprada @endif " data-numero="{{ $i }}">
                    {{ $i }}
                </div>
            @endfor
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
        $('.senha').on('click', function () {
            var numeroSenha = $(this).data('numero');

            if (!$(this).hasClass('senha-comprada')) {
                $('.senha').removeClass('senha-selecionada');
                $(this).addClass('senha-selecionada');
                $('#inputSenhaSelecionada').val(numeroSenha);
            }
        });
    });
</script>

</body>
</html>
