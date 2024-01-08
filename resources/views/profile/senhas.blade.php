@extends('layouts.base')

@section('title', 'Minhas senhas reservadas')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemvaqcadastradas')

@section('content')

    @include('layouts.navbar')

    <div class="VaqCadastradas">
        <div class="conteudobarras">
            <h1>MINHAS SENHAS</h1>
            @foreach ($senhas as $senha)
           
            <div class="barra">
                <a href="{{ route('senha.usuario.confirmation', $senha->id) }}">{{ $senha->corrida->park_name }}</a> / {{ $senha->categoria->categoria }} / R${{$senha->valor_total}} / Nº {{ $senha->numero }}
            </div>

            @endforeach

        <button class="h-25 w-25">Próximo</button> 
    </div>

@endsection