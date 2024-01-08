@extends('layouts.base')

@section('title', 'Criar senha de corrida')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemvaqcadastradas')

@section('content')

    @include('layouts.navbar')

    <main>

        <form action="{{ route('senha.store') }}" method="post">

            @csrf

            <input type="hidden" name="corrida_id" id="corrida_id" value="{{ $corrida->id }}">

            <div class="categorias">
                <div class="contcat">
                    <h1 class="inf bg-secondary text-light text-center">Informações da Vaquejada</h1>
                    <h3 class="text-secondary fs-5">Categorias</h3>
                    <div class="categoria">
                        <div class="row mb-2">

                            <div class="col-4">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                                    id="categoria">
                                    @php
                                        $categorias = \App\Models\CategoriaSenha::all();
                                    @endphp
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="col-3">
                                <label for="de" class="form-label">De</label>
                                <input type="number" class="form-control @error('de') is-invalid @enderror" name="de"
                                    id="de">
                                @error('de')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label for="ate" class="form-label">Até</label>
                                <input type="number" class="form-control @error('ate') is-invalid @enderror" name="ate"
                                    id="ate">
                                @error('ate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="number" class="form-control @error('valor') is-invalid @enderror"
                                    name="valor" id="valor">
                                @error('valor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-center mx-auto">
                        <button style="background-color: #FFB17B;" class="rounded text-dark p-1 fs-5">Salvar</button>
                    </div>
                </div>
            </div>

            {{-- <select name="categoria" class="@error('categoria') is-invalid @enderror" id="categoria">
                @php
                    $categorias = \App\Models\CategoriaSenha::all();
                @endphp
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach

            </select>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="de">De</label>
            <input type="number" class="@error('de') is-invalid @enderror" name="de" id="de">
            @error('de')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="ate">Até</label>
            <input type="number" class="@error('ate') is-invalid @enderror" name="ate" id="ate">
            @error('ate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="valor">Valor</label>
            <input type="number" class=" @error('valor') is-invalid @enderror" name="valor" id="valor">
            @error('valor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input type="submit" value="Criar"> --}}

        </form>

    </main>

@endsection
