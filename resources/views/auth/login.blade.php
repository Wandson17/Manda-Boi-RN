@extends('layouts.base')

@section('title', 'Login')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <style>
        body {
            background-image: url('{{ asset('imgs/fundo.jpg') }}');
        }
    </style>
@endsection

@section('content')

    @include('layouts.navbar')

    @if ($errors->any())

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-10 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                            <div class="d-flex justify-content-center ">

                            </div>

                            <div class="card mb-3 bg-light navbar-light bg-opacity-75" style="height: 70vh; width: 30vw;">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h1 class=" text-center ">Login</h1>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation">

                                        @csrf

                                        <div class="col-12">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" name="cpf" class="form-control" id="cpf"
                                                value="{{ old('cpf') }}" required placeholder="000.000.000-00"
                                                onkeyup="handleCpf(event)" maxlength="14">
                                            <div class="invalid-feedback">Por favor, coloque seu cpf!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Senha</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required placeholder="************">
                                            <div class="invalid-feedback">Por favor, coloque seu senha!</div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn btn-secondary w-50" type="submit">Entrar</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small p-3">Não tem uma conta? <a
                                                    href="{{ route('register') }}">Cadastre-se</a></p>
                                        </div>

                                </div>

                                
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </section>

        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('js/input-masks.js') }}"></script>

@endsection

