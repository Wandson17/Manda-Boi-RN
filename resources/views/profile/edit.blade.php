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
                <div class="d-flex mt-5 align-items-center justify-content-center">
                    <div class="p-5 text-light rounded-3"
                        style="background-color: #2A2A2A; margin-right: 10%; height: 100vh; width:50%;">
                        <h2>Dados pessoais</h2>
                        <form action="{{ route('profile.update') }}" method="post" class="form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ Auth::user()->name }}" placeholder="Digite seu nome">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ Auth::user()->email }}" placeholder="Digite seu email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" id="cpf"
                                    class="form-control @error('cpf') is-invalid @enderror" value="{{ Auth::user()->cpf }}"
                                    placeholder="xxx.xxx.xxx-xx">
                                @error('cpf')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" name="celular" id="celular"
                                    class="form-control @error('celular') is-invalid @enderror"
                                    value="{{ Auth::user()->celular }}" placeholder="Digite seu telefone">
                                @error('celular')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button class="btn" style="background-color: #FFB17B;" href="">Editar Perfil</button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
