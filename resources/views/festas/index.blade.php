@extends('layouts.base')

@section('title', 'Lista de eventos')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'background')

@section('content')

    @include('layouts.navbar')

    @include('layouts.flashMessage')

    <main>
        <div class="container">
            <div class="VaqCadastradas">
                <div class="conteudobarras">
                    <h1>FESTAS CADASTRADAS</h1>

                    @foreach ($festas as $festa)
                    <div class="barra">
                        Nome: {{ $festa->nome }} - 
                        Local: {{ $festa->endereco }} - 
                        Data: {{ $festa->data_inicio }} - 
                        Horário: {{ $festa->time}} - 
                        Vaquejada: {{ $festa->corrida_id}}
    
                        <div class="links">
                            @php
                                $ingressosExists = App\Http\Controllers\IngressoController::ingressosExists($festa->id);
                            @endphp
                            @if ($ingressosExists)
                                <a href="{{ route('ingresso.create', $festa->id) }}">Atualizar</a>
                            @else
                                <a href="{{ route('ingresso.create', $festa->id) }}">Criar</a>
                            @endif
                            <a href="{{ route('festa.edit', $festa->id) }}">Editar</a>
                            <a href="{{ route('festa.editInformation', $festa->id) }}">Editar informações</a>
                            <a href="{{ route('festa.destroy', $festa->id) }}">Remover</a>
                        </div>
                    </div>
                @endforeach
    
                        <a href="{{ route('festa.create', $festa->id) }}"><button>Adicionar</button></a>

                

    </main>

@endsection