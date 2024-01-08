@extends('layouts.base')

@section('title', 'Registro de usuário')

@section('head')
    <style>
        body {
            background-image: url('{{ asset('imgs/fundo.jpg') }}');
        }
    </style>
@endsection

@section('content')

    @include('layouts.navbar')

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-10 col-md-8 d-flex flex-column align-items-center justify-content-center ">

                            <div class="d-flex justify-content-center ">

                            </div>

                            <div class="card mb-3 bg-light navbar-light bg-opacity-75" style="height: 110vh;">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h1 class=" text-center ">Cadastro</h1>

                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" id="name" placeholder="Nome completo"
                                                required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label"> E-mail</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" id="email"
                                                placeholder="exemplo@exemplo.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="celular" class="form-label"> Telefone</label>
                                            <input type="tel" name="celular" id="celular"
                                                class="form-control @error('celular') is-invalid @enderror"
                                                value="{{ old('celular') }}" placeholder="Celular"
                                                onkeyup="handlePhone(event)" required placeholder="(xx) x xxxxx-xxxx"
                                                maxlength="15">
                                            @error('celular')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" name="cpf" id="cpf"
                                                class="form-control @error('cpf') is-invalid @enderror"
                                                value="{{ old('cpf') }}" placeholder="000.000.000-00" required
                                                onkeyup="handleCpf(event)" maxlength="14">
                                            @error('cpf')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                            <input type="date" name="data_nascimento"
                                                class="form-control @error('data_nascimento') is-invalid @enderror"
                                                value="{{ old('data_nascimento') }}" id="data_nascimento"
                                                placeholder="Data de nascimento" required>
                                            @error('data_nascimento')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="col-6">
                                            <label for="password" class="form-label">Senha</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                required min="8" placeholder="************">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                required placeholder="************">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
        <label class="form-check-label" for="acceptTerms">Concordo e aceito os termos e condições</div>
      </div>
    </div> --}}

                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn w-50" type="submit" style="background-color: #FFB17B;">Cadastrar</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small p-3"> Tem uma conta? <a
                                                    href="{{ route('login') }}">Conecte-se</a></p>
                                        </div>
                                    </form>
    </main>


    <script src="{{ asset('js/input-masks.js') }}"></script>
@endsection
