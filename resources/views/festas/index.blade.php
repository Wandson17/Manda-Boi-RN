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
                <div class="barra">
                    <div class="links">
                        <table>
                            @foreach ($festas as $festa)
                                <tr>
                                    <td>{{ $festa->nome }}</td>
                                    <td>{{ $festa->local }}</td>
                                    <td>{{ $festa->data_inicio }}</td>
                                    <td>{{ $festa->time}}</td>
                                    <td>{{ $festa->corrida_id}}</td>
                                    <td>
                                        @php
                                            $ingressosExists = App\Http\Controllers\IngressoController::ingressosExists($festa->id);
                                        @endphp
                                        @if ($ingressosExists)
                                            <a href="{{ route('ingresso.create', $festa->id) }}">Atualizar</a>
                                        @else
                                            <a href="{{ route('ingresso.create', $festa->id) }}">Criar</a>
                                        @endif
                                    </td>
                                        <td>
                                            <a href="{{ route('festa.edit', $festa->id) }}">Editar</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('festa.editInformation', $festa->id) }}">Editar informações</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('festa.destroy', $festa->id) }}">Remover</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                    </div>
                </div>


                    <a href="{{ route('festa.create', $festa->id) }}"><button>Adicionar</button></a>
    </main>

@endsection