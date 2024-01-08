@extends('layouts.base')

@section('title', 'Ingresso comprado com sucesso!')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .conteudo{
            color: black !important;
        }
    </style>
@endsection

@section('content')

    @include('layouts.navbar')

    <main>

        <div class="container">
            <section class="my-3 conteudo p-5 rounded-2">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Ingresso comprado com sucesso!</h1>

                        <p>ID do ingresso: {{ $ingresso->id }}</p>
                        <p>Valor total: {{ $ingresso->valor_total }}</p>
                        <p>Forma de pagamento: {{ $ingresso->formaPagamento->forma_pagamento }}</p>
                        <p>Status do pagamento: @if ($ingresso->status_pagamento == 1) Confirmado @else Pendente @endif</p>

                    </div>
                </div>
            </section>
        </div>

    </main>

@endsection