<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('imgs/manda-logo.png') }}" height="80" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if (!Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <button type="button" class="btn ms-3" style="background-color: #FFB17B;"
                            onclick="window.location.href='{{ route('register') }}'">Cadastro</button>
                    @else
                        <button type="button" class="btn btn-secondary ms-3"
                            onclick="window.location.href='{{ route('logout') }}'">Sair</button>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <nav class="navbar navbar-expand-lg bg-light navbar-light bg-opacity-50" style="background-color: #FFB17B;">
        <div class="col-12 d-flex justify-content-center">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center mx-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{ route('about') }}"><i class="fas fa-plus-circle pe-2"></i>Quem Somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#!"><i class="fas fa-bell pe-2"></i>Como Funciona?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#!"><i class="fas fa-heart pe-2"></i>Fale Conosco</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
