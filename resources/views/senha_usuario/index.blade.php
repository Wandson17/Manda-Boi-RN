@extends('layouts.base')

@section('title', 'Senhas reservadas')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemvaqcadastradas')

@section('content')

    @include('layouts.navbar')

    <div class="VaqCadastradas">
        <div class="conteudobarras">
            <h1>SENHAS RESERVADAS</h1>
            @foreach ($senhas as $senha)
                
           
            <div class="barra">
                {{ $senha->corrida->park_name }} / {{ $senha->categoria->categoria }} / R${{$senha->valor_total}} / Nº {{ $senha->numero }}
                <div class="links">
                    <a href="{{ route('senha.destroy', $senha->id) }}">Cancelar</a>
                </div>
            </div>

            @endforeach

    </div>

@endsection