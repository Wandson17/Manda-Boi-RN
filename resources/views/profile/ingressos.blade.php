@extends('layouts.base')

@section('title', 'Meus ingressos reservados')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('body-class', 'imagemvaqcadastradas')

@section('content')

    @include('layouts.navbar')

    <div class="VaqCadastradas">
        <div class="conteudobarras">
            <h1>MEUS INGRESSOS</h1>
            @foreach ($ingressos as $ingresso)
                
           
            <div class="barra">
                <a href="{{ route('ingresso.usuario.confirmation', $ingresso->id)}}">{{ $ingresso->festa->nome }}</a> / R${{$ingresso->valor_total}}
            </div>

            @endforeach

        <button class="h-25 w-25">Próximo</button> 
    </div>

@endsection