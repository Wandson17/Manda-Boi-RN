@extends('layouts.base')

@section('title', 'Quem somos?')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemsobre')

<body style="background-image: url('/imgs/maovaq.jpg');">
    
@section('content')

    @include('layouts.navbar')

    <main>

        <section class="sobre">
            <div class="p-5 mt-5 mb-5 rounded">
                <h1 class="text-center">Quem Somos?</h1>

                <p class="text-center">
                    Seja bem-vindo ao Manda Boi, seu destino definitivo para a compra
                    antecipada de senhas de vaquejadas! Somos uma plataforma
                    especializada, apaixonada por conectar vaqueiros e entusiastas a
                    eventos inesquecíveis.
                </p>
                <p class="text-center">
                    No Manda Boi, oferecemos a solução mais completa para a aquisição,
                    gerenciamento e atualização de suas senhas. Com um sistema intuitivo,
                    atendemos às necessidades tanto dos vaqueiros quanto dos
                    organizadores, fornecendo informações em tempo real de forma ágil e
                    segura.
                </p>
                <p class="text-center">
                    É importante ressaltar que, embora sejamos a principal fonte para a
                    compra antecipada de senhas, não organizamos diretamente os eventos.
                    Somos uma entidade terceirizada contratada pelos organizadores para
                    facilitar as vendas antes das datas das vaquejadas. Portanto, nossa
                    atuação se concentra exclusivamente na gestão das vendas online, não
                    incluindo serviços de secretaria durante os eventos.
                </p>
                <p class="text-center">
                    Nossa missão é tornar sua experiência desde a compra até a
                    participação na vaquejada o mais simples e tranquila possível. No
                    Manda Boi, estamos comprometidos em oferecer uma conexão direta entre
                    vaqueiros, entusiastas e organizadores, facilitando o acesso a eventos
                    emocionantes e memoráveis.
                </p>
                <p class="text-center">
                    A equipe do Manda Boi está aqui para garantir que sua jornada seja
                    livre de complicações e repleta de entusiasmo em cada etapa do
                    processo.
                </p>
                <p class="text-center">Equipe Manda Boi.</p>
            </div>
            </div>
    </main>
@endSection
</body>