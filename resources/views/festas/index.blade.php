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

<<<<<<< HEAD
                    <table>
                        <thead>
                            <th>Nome</th>
                            <th>Local</th>
                            <th>Data de ínicio</th>
                            <th>Horário</th>
                            <th>Ingressos</th>
                            <th>Corrida</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($festas as $festa)
                                <tr>
                                    <td>{{ $festa->nome }}</td>
                                    <td>{{ $festa->local }}</td>
                                    <td>{{ $festa->data_inicio }}</td>
                                    <td>{{ $festa->data_fim }}</td>
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
                                        <a href="{{ route('corrida.show', $festa->corrida->id) }}">{{ $festa->corrida->nome }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('festa.edit', $festa->id) }}">Editar</a></td>
                                    <td>
                                        <a href="{{ route('festa.editInformation', $festa->id) }}">Editar informações</a></td>
                                    <td>
                                        <a href="{{ route('festa.destroy', $festa->id) }}">Remover</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
=======
            <table>
                <thead>
                    <th>Nome</th>
                    <th>Local</th>
                    <th>Data de ínicio</th>
                    <th>Horário</th>
                    <th>Ingressos</th>
                    <th>Corrida</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($festas as $festa)
                        <tr>
                            <td>{{ $festa->nome }}</td>
                            <td>{{ $festa->local }}</td>
                            <td>{{ $festa->data_inicio }}</td>
                            <td>{{ $festa->data_fim }}</td>
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
                                {{-- <a href="{{ route('corrida.show', $festa->corrida->id) }}">{{ $festa->corrida->nome }}</a> --}}
                            </td>
                            <td>
                                <a href="{{ route('festa.edit', $festa->id) }}">Editar</a></td>
                            <td>
                                <a href="{{ route('festa.editInformation', $festa->id) }}">Editar informações</a></td>
                            <td>
                                <a href="{{ route('festa.destroy', $festa->id) }}">Remover</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

>>>>>>> origin/teste
        </div>
    </main>

@endsection