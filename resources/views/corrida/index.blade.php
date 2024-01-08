@extends('layouts.base')

@section('title', 'Lista de vaquejadas')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemvaqcadastradas')

@section('content')

    @include('layouts.navbar')

    @include('layouts.flashMessage')

    <div class="VaqCadastradas">
        <div class="conteudobarras">
            <h1>VAQUEJADAS CADASTRADAS</h1>

            @foreach ($corridas as $corrida)
                <div class="barra">
                    {{ $corrida->nome }}
                    <div class="links">
                        @if ($corrida->festa)
                            <a href="{{ route('festa.destroy', $corrida->festa->id) }}">Remover festa</a>
                        @else
                            <a href="{{ route('festa.create', $corrida->id) }}">Adicionar festa</a>
                        @endif
                        <a href="{{ route('senha.create', $corrida->id) }}">Adicionar senha</a>
                        <a href="{{ route('corrida.editInformation', $corrida->id) }}">Editar informações</a>
                        <a href="{{ route('corrida.edit', $corrida->id) }}">Editar</a>
                        <a href="{{ route('corrida.destroy', $corrida->id) }}">Remover</a>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('corrida.create') }}"><button>Adicionar</button></a>

        </div>

    </div>

@endsection
