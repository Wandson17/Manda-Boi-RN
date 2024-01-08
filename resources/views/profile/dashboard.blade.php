@extends('layouts.base')

@section('title', 'Perfil')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

    @include('layouts.navbar')

    @include('layouts.flashMessage')

    <main>
        <div class="container mb-5">
            <section>
                <div class="text-center my-5">
                    <h2>Bem vindo(a), {{ Auth::user()->name }}</h2>
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <div class="p-5 text-light rounded-3"
                        style="background-color: #2A2A2A; margin-right: 10%; height: 100vh;">
                        <h2>Dados pessoais</h2>
                        {{-- <form action="{{ route('profile.update') }}" method="post" class="form"> --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo</label>
                                <input type="text" readonly name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ Auth::user()->name }}" placeholder="Digite seu nome">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" readonly name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ Auth::user()->email }}" placeholder="Digite seu email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" readonly name="cpf" id="cpf"
                                    class="form-control @error('cpf') is-invalid @enderror" value="{{ Auth::user()->cpf }}"
                                    placeholder="xxx.xxx.xxx-xx">
                                @error('cpf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" readonly name="celular" id="celular"
                                    class="form-control @error('celular') is-invalid @enderror"
                                    value="{{ Auth::user()->celular }}" placeholder="Digite seu telefone">
                                @error('celular')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <a class="btn" style="background-color: #FFB17B;" href="/profile/edit">Editar Perfil</a>
                            </div>
                        {{-- </form> --}}
                    </div>

                    <div class="botoes">
                        <div class="mb-3">
                            <button type="button" class="btn ms-3"
                                onclick="window.location.href='{{ route('profile.senhas') }}'"
                                style="width: 100%; height: 8vh; border: none; background-color: #FFB17B; font-size: larger; ">Minhas
                                senhas reservadas</button>
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn ms-3"
                                onclick="window.location.href='{{ route('profile.ingressos') }}'"
                                style="width: 100%; height: 8vh; border: none; background-color: #FFB17B; font-size: larger; ">Meus
                                ingressos reservados</button>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
